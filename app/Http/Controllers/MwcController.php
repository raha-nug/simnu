<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\MWCNU;
use App\Models\Ranting;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MwcController extends Controller
{
    public function index(Request $request)
    {
        $id_mwc = $request->mwc;
        $id = getRoute($id_mwc);
        if (!$id)
            return redirect('dashboard');

        $mwcnu = MWCNU::query()
            ->select(['mwcnu.id', 'mwcnu.nama', 'mwcnu.alamat','id_pcnu', 'mwcnu.telp', 'mwcnu.email', 'mwcnu.website','kecamatan', 'pcnu.nama as pc_nama'])
            ->leftJoin('pcnu', 'id_pcnu', '=', 'pcnu.id')
            ->where('mwcnu.id', $id)
            ->first();

        $pengurus = Pengurus::join('surat_keputusan', 'pengurus.id_sk', '=', 'surat_keputusan.id')
            ->join('MWCNU', 'surat_keputusan.id_mwcnu', '=', 'MWCNU.id')
            ->join('anggota', 'pengurus.nik', '=', 'anggota.nik')
            ->where('MWCNU.id', $id)
            ->get();

        return view( 'pages.detail-mwc', [
            'title' => 'Detail MWC NU',
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'sk' => $sk ?? new SuratKeputusan,
            'nomor' => $count = 1,
            'kota' => $this->wilayah->getSingleAddress($mwcnu->kota ?? ''),
            'kecamatan' => $this->wilayah->getSingleAddress($mwcnu->kecamatan ?? ''),
            'mwc_data' => $mwcnu,
            'pengurus' => $pengurus ?? new Pengurus
        ]);
    }

    public function addMwcnu(Request $request)
    {
        if (!isset($request->mwc))
        {
            // ambil data pc jika tambah mwc baru
            if (!isset($request->pc))
                return redirect(route('not-found'));

            $id_pc = $request->pc;
            $id = getRoute($id_pc);
            if (!$id)
                return redirect('dashboard');

            $pc_data = PCNU::getRowData($id);

            $data = [
                'title' => 'MWCNU',
                'username' => session()->get('nama_user'),
                'from' => 'Singaparna',
                'name' => 'MWC Singaparna',
                'kecamatan' => $this->wilayah->getAddress($pc_data->kota),
                'pc_data' => $pc_data,
                'method' => 'POST',
                'action' => route('mwcnu-process')
            ];

            return view('pages.add.add-mwc', $data);
        }

        $id_mwc = $request->mwc;
        $id = getRoute($id_mwc);
        if (!$id)
            return redirect('dashboard');

        $mwcnu = MWCNU::query()->where('id', $id)
        ->first();

        $data = [
            'title' => 'MWCNU',
            'username' => session()->get('nama_user'),
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'kecamatan' => $this->wilayah->getAddress($mwcnu->kota),
            'mwc_data' => $mwcnu,
            'method' => 'POST',
            'action' => route('mwcnu-process')
        ];

        return view('pages.add.add-mwc', $data);
    }

    public function process(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required|regex:/^[A-Za-z0-9.,\s\n\-]+$/',
            'telp' => 'sometimes|nullable|regex:/^[0-9]+$/',
            'lat' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            'long' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            'website' => 'sometimes|nullable|regex:/^[A-Za-z0-9.,\s\n\/:\-]+$/',
            'email' => 'sometimes|nullable|email',
            'kota' => 'required',
            'kecamatan' => 'required',
            'id_pcnu' => 'required'
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.regex' => 'Penulisan alamat tidak benar',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            'lat.regex' => 'Penulisan Latitude tidak benar',
            'long.regex' => 'Penulisan Longitude tidak benar',
            'website.regex' => 'Penulisan Url website tidak benar',
            'email.email' => 'Email Tidak valid',
            'kota.required' => 'Kota Harus diisi',
            'kecamatan.required' => 'Kecamatan Harus diisi',
            'id_pcnu.required' => 'PCNU tidak ditemukan'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back(400);
        }

        $data = $validated->validate();
        $data['provinsi'] = "32";
        if (isset($request->id)) {
            $is_updated = MWCNU::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('pcnu-detail') . "?pc=" . setRoute($request->id_pcnu));
        }
        MWCNU::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('pcnu-detail') . "?pc=" . setRoute($request->id_pcnu));
    }

    public function deleteMwcnu(Request $request)
    {

        if(!isset($request->mwc))
        {
            Alert::error('Data Gagal Dihapus');
            return redirect()->back();
        }

        $id_mwc = $request->mwc;
        $id = getRoute($id_mwc);
        $is_deleted = MWCNU::where('id', $id)
            ->delete();

        if ($is_deleted) {
            Alert::success('Data Berhasil Dihapus');
            return redirect(route('mwcnu')."?mwc=". $id_mwc);
        } else {
            Alert::error('Data Gagal Dihapus');
            return redirect(route('pcnu'));
        }
    }

    public function getRantingByMwc(Request $request)
    {   
        if($request->ajax())
        {
            return Ranting::getListByMwcnu($request->mwc);
        }
    }
}
