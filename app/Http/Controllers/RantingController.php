<?php

namespace App\Http\Controllers;

use App\Models\AnakRanting;
use App\Models\MWCNU;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RantingController extends Controller
{
    public function index(Request $request)
    {
        $id_ranting = $request->ranting;
        $id = getRoute($id_ranting);
        if (!$id)
            return redirect('dashboard');

        $ranting = Ranting::query()
            ->select(['ranting.id','ranting.nama','ranting.alamat','mwcnu.nama as mwc_nama', 'id_mwcnu', 'ranting.kecamatan'])
            ->leftJoin('mwcnu','id_mwcnu','=','mwcnu.id')
            ->where('ranting.id', $id)
            ->first();

        return view('pages.detail-ranting', [
            'title' => 'Detail Ranting NU',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'kecamatan' => $this->wilayah->getSingleAddress($ranting->kecamatan ?? ''),
            'ranting_data' => $ranting
        ]);
    }

    public function addRanting(Request $request)
    {
        if (!isset($request->ranting)) {
            // ambil data pc jika tambah mwc baru
            if (!isset($request->mwc))
                return redirect(route('not-found'));

            $id_mwc = $request->mwc;
            $id = getRoute($id_mwc);
            if (!$id)
                return redirect('dashboard');


                $mwc_data = MWCNU::getRowData($id);

            $data = [
                'title' => 'Ranting',
                'username' => session()->get('nama_user'),
                'from' => 'Singaparna',
                'name' => 'MWC Singaparna',
                'desa' => $this->wilayah->getAddress($mwc_data->kecamatan),
                'mwc_data' => $mwc_data,
                'method' => 'POST',
                'action' => route('ranting-process')
            ];

            return view('pages.add.add-ranting', $data);
        }

        $id_ranting = $request->ranting;
        $id = getRoute($id_ranting);
        if (!$id)
            return redirect('dashboard');

        $ranting = Ranting::query()->where('id', $id)
            ->first();

        $data = [
            'title' => 'MWCNU',
            'username' => session()->get('nama_user'),
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'desa' => $this->wilayah->getAddress($ranting->kecamatan),
            'ranting_data' => $ranting,
            'method' => 'POST',
            'action' => route('ranting-process')
        ];

        return view('pages.add.add-ranting', $data);
    }

    public function process(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required|regex:/^[A-Za-z0-9.,\s\n\-]+$/',
            'telp' => 'sometimes|nullable|regex:/^[0-9]+$/',
            // 'lat' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            // 'long' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            // 'website' => 'sometimes|nullable|regex:/^[A-Za-z0-9.,\s\n\/:\-]+$/',
            // 'email' => 'sometimes|nullable|email',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'id_mwcnu' => 'required'
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.regex' => 'Penulisan alamat tidak benar',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            // 'lat.regex' => 'Penulisan Latitude tidak benar',
            // 'long.regex' => 'Penulisan Longitude tidak benar',
            // 'website.regex' => 'Penulisan Url website tidak benar',
            // 'email.email' => 'Email Tidak valid',
            'kota.required' => 'Kota Harus diisi',
            'kecamatan.required' => 'Kecamatan Harus diisi',
            'desa.required' => 'Desa Harus diisi',
            'id_mwcnu.required' => 'MWCNU tidak ditemukan'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        $data['provinsi'] = "32";
        if (isset($request->id)) {
            $is_updated = Ranting::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('mwcnu') . "?mwc=" . setRoute($request->id_mwcnu));
        }
        Ranting::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('mwcnu') . "?mwc=" . setRoute($request->id_mwcnu));
    }

    public function deleteRanting(Request $request)
    {

        if (!isset($request->ranting)) {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }

        $id_ranting = $request->ranting;
        $id = getRoute($id_ranting);
        $is_deleted = Ranting::where('id', $id)
            ->delete();

        if ($is_deleted) {
            Alert::success('Data Berhasil Dihapus');
            return redirect(route('ranting') . "?ranting=" . $id_ranting);
        } else {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }
    }

    public function getAnakByRanting(Request $request)
    {
        $limit = $request->length ?? 10;
        $start = $request->start ?? 0;

        if (!isset($request->ranting)) {
            return response()->json((object)[
                'success' => 0,
                'data' => collect([])
            ]);
        }

        $id = $request->ranting;
        if (!$id) {
            return response()->json((object)[
                'success' => 0,
                'data' => collect([])
            ]);
        }

        $ranting_list = AnakRanting::getListByRanting($id, $limit, $start, $request->search['value']);
        // dd(mapSetRoute($ranting_list));
        return response()->json((object)[
            'success' => 1,
            'data' => mapSetRoute($ranting_list)
        ]);;
    }
}
