<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\PWNU;
use App\Models\Banom;
use App\Models\MWCNU;
use App\Models\BanomBasis;
use App\Models\MasterBanom;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BanomController extends Controller
{
    public function index(Request $request)
    {
        $id_banom = $request->banom;
        $id = getRoute($id_banom);
        if (!$id)
            return redirect('dashboard');

        $banom = Banom::query()
            ->where('id', $id)
            ->first();
        if ($banom)
        {
            if ($banom->id_pwnu)
            {
                $wilayah_kerja['url'] = route('pwnu');
                $wilayah_kerja['nama'] = "PWNU Jawa Barat";
            }
            elseif($banom->id_pcnu)
            {
                $pc = PCNU::where('id', $banom->id_pcnu)->first();
                $wilayah_kerja['url'] = route('pcnu-detail')."?pc=".setRoute($banom->id_pcnu);
                $wilayah_kerja['nama'] = $pc->nama;

            }
            elseif ($banom->id_mwcnu)
            {
                $mwc = MWCNU::where('id', $banom->id_mwcnu)->first();
                $wilayah_kerja['url'] = route('mwcnu') . "?mwc=" . setRoute($banom->id_mwcnu);
                $wilayah_kerja['nama'] = $mwc->nama;
            }
        }
        $sk = SuratKeputusan::query()->where('id_banom', $id)->get();
        return view('pages.detail-banom', [
            'title' => 'Detail Banom',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'banom_data' => $banom,
            'wilayah_kerja' => $wilayah_kerja,
            'sk' => $sk,
            'number' => $number = 1
        ]);
    }

    public function addBanom(Request $request)
    {
        if (!isset($request->banom)) {
            if (isset($request->pw))
                return $this->addBanomPwnu($request->pw);
            elseif (isset($request->pc))
                return $this->addBanomPcnu($request->pc);
            elseif (isset($request->mwc))
                return $this->addBanomMwcnu($request->mwc);
            else
                return redirect('not-found');
        }
        else
        {
            $id_banom = $request->banom;
            $id = getRoute($id_banom);
            if (!$id)
            return redirect('dashboard');

            $lembaga_data = Banom::query()->where('id', $id)
            ->first();

            $data = [
                'title' => 'Banom',
                'username' => 'John Doe',
                'from' => 'Singaparna',
                'name' => 'MWC Singaparna',
                'master_banom' => MasterBanom::get(),
                'banom_base' => BanomBasis::get(),
                'kota' => $this->wilayah->getAddress('32'),
                'lembaga_data' => $lembaga_data,
                'method' => 'POST',
                'action' => route('lembaga-process')
            ];

            return view('pages.add.add-banom', $data);
        }
    }

    public function process(Request $request)
    {
        $rules = [
            'nama' => 'required',
            // 'alamat' => 'required|regex:/^[A-Za-z0-9.,\s\n\-]+$/',
            // 'telp' => 'sometimes|nullable|regex:/^[0-9]+$/',
            'id_pwnu' => 'sometimes|nullable',
            'id_pcnu' => 'sometimes|nullable',
            'id_mwcnu' => 'sometimes|nullable',
            // 'master_banom_id' => 'required',
            // 'master_banom_basis_id' => 'required',
            // 'kota' => 'required',
            // 'kecamatan' => 'required',
            // 'desa' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            // 'master_banom_id.required' => 'Banom tidak ditemukan',
            // 'master_banom_basis_id.required' => 'Banom Basis tidak ditemukan',
            // 'alamat.regex' => 'Penulisan alamat tidak benar',
            // 'provinsi.required' => 'Provinsi Harus diisi',
            // 'kota.required' => 'Kota Harus diisi',
            // 'kecamatan.required' => 'Kecamatan Harus diisi',
            // 'desa.required' => 'Desa Harus diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if (isset($request->id)) {
            $is_updated = Banom::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('mwcnu') . "?mwc=" . setRoute($request->id_mwcnu));
        }
        $new_data = Banom::create($data);
        // dd($new_data);
        Alert::success('Data Berhasil Disimpan');
        return $this->checkRoute($new_data);
    }

    public function deleteBanom(Request $request)
    {

        if (!isset($request->banom)) {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }

        $id_banom = $request->banom;
        $id = getRoute($id_banom);
        $route_data = Banom::getReferenceData($id);
        $is_deleted = Banom::where('id', $id)
            ->delete();

        if ($is_deleted) {
            Alert::success('Data Berhasil Dihapus');
            $this->checkRoute($route_data);
        } else {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }
    }

    public function getBanomlist(Request $request)
    {
        $limit = $request->length ?? 10;
        $start = $request->start ?? 0;
        $options = [
            'id_pwnu' => $request->pw,
            'id_pcnu' => $request->pc,
            'id_mwcnu' => $request->mwc,
            'search' => $request->search['value']
        ];
        $banom_list = Banom::getBanomlist($limit, $start, $options);

        return response()->json((object)[
            'success' => 1,
            'data' => mapSetRoute($banom_list)
        ]);
    }

    private function addBanomPwnu($pwnu_id)
    {
        $id = getRoute($pwnu_id);
        if (!$id)
            return redirect('dashboard');


        $pwnu_data = PWNU::select(['id','provinsi', 'nama'])->where('id',$id)->first();

        $data = [
            'title' => 'Banom',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_banom' => MasterBanom::get(),
            'master_banom_basis' => BanomBasis::get(),
            'kota' => $this->wilayah->getAddress('32'),
            'pwnu_data' => $pwnu_data,
            'method' => 'POST',
            'action' => route('Banom-process')
        ];

        return view('pages.add.add-banom', $data);
    }
    private function addBanomPcnu($pcnu_id)
    {
        $id = getRoute($pcnu_id);
        if (!$id)
            return redirect('dashboard');

            $pcnu_data = PCNU::select(['id','kota', 'nama'])->where('id', $id)->first();

        $data = [
            'title' => 'Banom',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_banom' => MasterBanom::get(),
            'master_banom_basis' => BanomBasis::get(),
            'kota' => $this->wilayah->getAddress('32'),
            'pcnu_data' => $pcnu_data,
            'method' => 'POST',
            'action' => route('Banom-process')
        ];

        // dd($data);
        return view('pages.add.add-banom', $data);
    }
    private function addBanomMwcnu($mwcnu_id)
    {
        $id = getRoute($mwcnu_id);
        if (!$id)
            return redirect('dashboard');


        $mwcnu_data = MWCNU::getRowData($id);

        $data = [
            'title' => 'Banom',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_banom' => MasterBanom::get(),
            'master_banom_basis' => BanomBasis::get(),
            'kecamatan' => $this->wilayah->getAddress($mwcnu_data->kota),
            'mwcnu_data' => $mwcnu_data,
            'method' => 'POST',
            'action' => route('Banom-process')
        ];

        return view('pages.add.add-banom', $data);
    }

    private function checkRoute($data)
    {
        switch ($data) {
            case !empty($data->id_pwnu):
                return redirect(route('pwnu'));
            case !empty($data->id_pcnu):
                return redirect(route('pcnu-detail') . "?pc=" . setRoute($data->id_pcnu));
            case !empty($data->id_mwcnu):
                return redirect(route('mwcnu') . "?mwc=" . setRoute($data->id_mwcnu));
            default:
                return redirect(route('no-found'));
        }
    }
}
