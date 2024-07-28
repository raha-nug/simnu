<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PWNU;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PwnuController extends Controller
{
    public function index(Request $request)
    {
        $pw_detail = PWNU::query()->where('id', 1)->first();
        $sk = SuratKeputusan::query()->where('id_pwnu', $pw_detail->id)->get();
        if($request->ajax()){
            $pengurus = Pengurus::join('surat_keputusan', 'pengurus.id_sk', '=', 'surat_keputusan.id')
                                ->join('PWNU', 'surat_keputusan.id_pwnu', '=', 'PWNU.id')
                                ->join('anggota', 'pengurus.nik', '=', 'anggota.nik')
                                ->where('PWNU.id', $pw_detail->id)
                                ->get();
            return DataTables::of($pengurus)
            ->addIndexColumn()
            ->editColumn('id', function($row) {
                return setRoute(strval($row->id));
            })
            ->editColumn('mulai_jabatan', function($row) {
                Carbon::setlocale('id');
                return Carbon::parse($row->mulai_jabatan)->translatedFormat('d F Y');
            })
            ->editColumn('akhir_jabatan', function($row) {
                Carbon::setlocale('id');
                return Carbon::parse($row->akhir_jabatan)->translatedFormat('d F Y');
            })
            ->make(true);
        }
        $data = [
            'title' => 'PWNU',
            'pw_detail' => $pw_detail,
            'username' => session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'nomor' => $count = 1,
            'sk' => $sk,
            // 'pengurus' => $pengurus ?? new Pengurus,
            'name' => 'PWNU Jawa Barat'
        ];
        return view('pages.pwnu', $data);
    }

    public function getPwnu(Request $request)
    {
        $id_pw = $request->id;
        $id = getRoute($id_pw);
        if (!$id)
            return redirect('pwnu');

        $pcnu = PWNU::query()->where('id', $id)
            ->first();
        return $this->addPwnu($pcnu);
    }

    public function addPwnu($pw_data=null)
    {
        $data = [
            'title' => 'PCNU',
            'username' =>session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'name' => 'PWNU Jawa Barat',
            'method' => 'POST',
            'action' => route('pwnu-process')
        ];

        if ($pw_data)
            $data['pw_data'] = $pw_data;
            $data['provinsi'] = $this->wilayah->getSingleAddress($pw_data->provinsi ?? '');


        return view('pages.edit.edit-pwnu', $data);
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
            'email' => 'required|email',
            'provinsi' => 'required'
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.regex' => 'Penulisan alamat tidak benar',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            'lat.regex' => 'Penulisan Latitude tidak benar',
            'long.regex' => 'Penulisan Longitude tidak benar',
            'website.regex' => 'Penulisan Url website tidak benar',
            'email.required' => 'Email Harus diisi',
            'email.email' => 'Email Tidak valid',
            'provinsi.required' => 'Provinsi Harus diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if (isset($request->id)) {
            $is_updated = PWNU::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('pwnu'));
        }
        PWNU::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('pwnu'));
    }
}
