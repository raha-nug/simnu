<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\MasterLembaga;
use App\Models\MWCNU;
use App\Models\PCNU;
use App\Models\PWNU;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LembagaController extends Controller
{
    public function index(Request $request)
    {
        $id_lembaga = $request->lembaga;
        $id = getRoute($id_lembaga);
        if (!$id)
            return redirect('dashboard');

        $lembaga = Lembaga::query()
            ->where('id', $id)
            ->first();

        return view('pages.detail-lembaga', [
            'title' => 'Detail Lembaga',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'lembaga_data' => $lembaga
        ]);
    }

    public function addLembaga(Request $request)
    {
        if (!isset($request->lembaga)) {
            if (isset($request->pw))
                return $this->addLembagaPwnu($request->pw);
            elseif (isset($request->pc))
                return $this->addLembagaPcnu($request->pc);
            elseif (isset($request->mwc))
                return $this->addLembagaMwcnu($request->mwc);
            else
                return redirect('not-found');
        }
        else
        {
            $id_lembaga = $request->lembaga;
            $id = getRoute($id_lembaga);
            if (!$id)
            return redirect('dashboard');

            $lembaga_data = Lembaga::query()->where('id', $id)
            ->first();

            $data = [
                'title' => 'Lembaga',
                'username' => 'John Doe',
                'from' => 'Singaparna',
                'name' => 'MWC Singaparna',
                'master_data' => MasterLembaga::get(),
                'kota' => $this->wilayah->getAddress('32'),
                'lembaga_data' => $lembaga_data,
                'method' => 'POST',
                'action' => route('lembaga-process')
            ];

            return view('pages.add.add-lembaga', $data);
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
            'master_id' => 'required',
            // 'kota' => 'required',
            // 'kecamatan' => 'required',
            // 'desa' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            'master_id.required' => 'Lembaga tidak ditemukan',
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
            $is_updated = Lembaga::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('mwcnu') . "?mwc=" . setRoute($request->id_mwcnu));
        }
        $new_data = Lembaga::create($data);
        Alert::success('Data Berhasil Disimpan');
        $this->checkRoute($new_data);
    }

    public function deleteLembaga(Request $request)
    {

        if (!isset($request->lembaga)) {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }

        $id_lembaga = $request->lembaga;
        $id = getRoute($id_lembaga);
        $route_data = Lembaga::getReferenceData($id);
        $is_deleted = Lembaga::where('id', $id)
            ->delete();

        if ($is_deleted) {
            Alert::success('Data Berhasil Dihapus');
            $this->checkRoute($route_data);
        } else {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }
    }

    public function getLembagalist(Request $request)
    {
        $limit = $request->length ?? 10;
        $start = $request->start ?? 0;
        $options = [
            'id_pwnu' => $request->pw,
            'id_pcnu' => $request->pc,
            'id_mwcnu' => $request->mwc,
            'search' => $request->search['value']
        ];
        $lembaga_list = Lembaga::getLembagalist($limit, $start, $options);

        return response()->json((object)[
            'success' => 1,
            'data' => mapSetRoute($lembaga_list)
        ]);
    }

    private function addLembagaPwnu($pwnu_id)
    {
        $id = getRoute($pwnu_id);
        if (!$id)
            return redirect('dashboard');


        $pwnu_data = PWNU::select(['id','provinsi'])->where('id',$id)->first();

        $data = [
            'title' => 'Lembaga',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_data' => MasterLembaga::get(),
            'kota' => $this->wilayah->getAddress('32'),
            'pwnu_data' => $pwnu_data,
            'method' => 'POST',
            'action' => route('ranting-process')
        ];

        return view('pages.add.add-lembaga', $data);
    }
    private function addLembagaPcnu($pcnu_id)
    {
        $id = getRoute($pcnu_id);
        if (!$id)
            return redirect('dashboard');

            $pcnu_data = PCNU::select(['id','kota'])->where('id', $id)->first();

        $data = [
            'title' => 'Lembaga',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_data' => MasterLembaga::get(),
            'kota' => $this->wilayah->getAddress('32'),
            'pcnu_data' => $pcnu_data,
            'method' => 'POST',
            'action' => route('lembaga-process')
        ];

        // dd($data);
        return view('pages.add.add-lembaga', $data);
    }
    private function addLembagaMwcnu($mwcnu_id)
    {
        $id = getRoute($mwcnu_id);
        if (!$id)
            return redirect('dashboard');


        $mwcnu_data = MWCNU::getRowData($id);

        $data = [
            'title' => 'Lembaga',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'master_data' => MasterLembaga::get(),
            'kecamatan' => $this->wilayah->getAddress($mwcnu_data->kota),
            'mwcnu_data' => $mwcnu_data,
            'method' => 'POST',
            'action' => route('ranting-process')
        ];

        return view('pages.add.add-lembaga', $data);
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
