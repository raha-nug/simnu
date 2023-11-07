<?php

namespace App\Http\Controllers;

use App\Models\AnakRanting;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AnakRantingController extends Controller
{
    public function index(Request $request)
    {
        $id_anak_ranting = $request->anakranting;
        $id = getRoute($id_anak_ranting);
        if (!$id)
            return redirect('dashboard');

        $anak_ranting = AnakRanting::query()
            ->select(['anak_ranting.id', 'anak_ranting.nama', 'anak_ranting.alamat', 'anak_ranting.id_ranting'])
            ->where('anak_ranting.id', $id)
            ->leftJoin('ranting', 'id_ranting', '=', 'ranting.id')
            ->first();
        dd($anak_ranting);

        return view('pages.detail-anak-ranting', [
            'title' => 'Detail Anak Ranting NU',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'anak_ranting_data' => $anak_ranting
        ]);
    }

    public function addAnakRanting(Request $request)
    {
        if (!isset($request->anakranting)) {
            // ambil data pc jika tambah mwc baru
            if (!isset($request->ranting))
                return redirect(route('not-found'));

            $id_ranting = $request->ranting;
            $id = getRoute($id_ranting);
            if (!$id)
                return redirect('dashboard');


            $ranting_data = Ranting::getRowData($id);

            $data = [
                'title' => 'Anak Ranting',
                'username' => session()->get('nama_user'),
                'from' => 'Singaparna',
                'name' => 'MWC Singaparna',
                'ranting_data' => $ranting_data,
                'method' => 'POST',
                'action' => route('anak-ranting-process')
            ];

            return view('pages.add.add-anak-ranting', $data);
        }

        $id_anak_ranting = $request->anakranting;
        $id = getRoute($id_anak_ranting);
        if (!$id)
            return redirect('dashboard');

        $anak_ranting = AnakRanting::query()->where('id', $id)
            ->first();

        $data = [
            'title' => 'MWCNU',
            'username' => session()->get('nama_user'),
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'anak_ranting_data' => $anak_ranting,
            'method' => 'POST',
            'action' => route('anak-ranting-process')
        ];

        return view('pages.add.add-anak-ranting', $data);
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
            'id_ranting' => 'required'
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
            'id_ranting.required' => 'Ranting tidak ditemukan'
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
            $is_updated = AnakRanting::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('ranting') . "?ranting=" . setRoute($request->id_ranting));
        }
        AnakRanting::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('ranting') . "?ranting=" . setRoute($request->id_ranting));
    }

    public function deleteAnakRanting(Request $request)
    {

        if (!isset($request->anakranting)) {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }

        $id_anak_ranting = $request->anakranting;
        $id = getRoute($id_anak_ranting);
        $ranting = AnakRanting::where('id', $id)->firts();
        $is_deleted = AnakRanting::where('id', $id)
            ->delete();

        if ($is_deleted) {
            Alert::success('Data Berhasil Dihapus');
            return redirect(route('ranting') . "?ranting=" . setRoute($ranting->id_ranting));
        } else {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
