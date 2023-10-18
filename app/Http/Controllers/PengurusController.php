<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        if(!isset($request->id_sk)) {
            redirect(route('not-found'));
        }

        $data = [
            'title' => 'Pengurus',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'name' => 'MWC Singaparna',
            'id_sk' => getRoute($request->id_sk)
        ];

        return view('pages.add.wizard', $data);
    }

    public function process(Request $request)
    {
        $rules = [
            'nik' => 'required|regex:/^[0-9]+$/',
            'nama' => 'required|regex:/^[A-Za-z0-9.,\s\n\-]+$/',
            'jabatan' => 'required',
            'id_sk' => 'required',
            'jenis_pengurus' => 'required'
        ];

        $message = [
            'nik.required' => 'Nomor NIK Harus diisi',
            'nik.regex' => 'Nomor NIK tidak benar',
            'nama.required' => 'Nama Harus diisi',
            'nama.regex' => 'Format nama tidak benar',
            'jabatan.required' => 'Jabatan Pengurus kosong',
            'id_sk.required' => 'Surat Sk tidak ditemukan',
            'jenis_pengurus.required' => 'Jenis Pengurus kosong'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            // Alert::error('Oops!', $error);
            return response()->json(['success' => 0, 'msg' => $error, 'token' => csrf_token()]);
        }

        $data = Pengurus::setValue($validated->validate());
        $new_data = Pengurus::create($data);
        return response()->json(['success' => 1, 'msg' => 'Data Berhasil Disimpan', 'data' => $new_data , 'token' => csrf_token()]);
        // Alert::success('Data Berhasil Disimpan');
    }

    public function delete(Request $request)
    {
        if (!isset($request->id)) {
            return response()->json(['success' => 0, 'msg' => 'Data gagal dihapus', 'token' => csrf_token()]);
        }

        $is_deleted = Pengurus::where('id', $request->id)
        ->delete();

        if ($is_deleted) {
            return response()->json(['success' => 1, 'msg' => 'Data Berhasil Dihapus', 'token' => csrf_token()]);
        } else {
            return response()->json(['success' => 0, 'msg' => 'Data gagal dihapus', 'token' => csrf_token()]);
        }
    }

    public function listPengurus(Request $request)
    {
        if (!isset($request->id_sk) || !isset($request->jenis_pengurus)) {
            return response()->json(['success' => 0, 'msg' => 'Not Found']);
        }

        $list = Pengurus::where('id_sk', $request->id_sk)
            ->where('jenis_pengurus', $request->jenis_pengurus)
            ->get();
        
        return response()->json(['success' => 1, 'data' => $list]);
    }

}
