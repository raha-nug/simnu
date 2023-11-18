<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller
{
    public function index(){
        $anggota = Anggota::query()->paginate(10);
        $data = [
            'anggota' => $anggota,
            'title'=> 'Pengurus',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'name'=>'PWNU Jawa Barat'
        ];

        return view('pages.pengurus', $data);
    }

    public function detail(Request $request){
        $id_pengurus = $request->pengurus;
        $id = getRoute($id_pengurus);
        $anggota = Anggota::query()->where('id', $id)->first();
        $pengurus = Pengurus::join('surat_keputusan', 'pengurus.id_sk', '=', 'surat_keputusan.id')
                            ->where('nik', $anggota->nik)
                            ->first();
        $sk_data = SuratKeputusan::query()
        ->selectRaw("
            CASE
                WHEN surat_keputusan.id_pwnu IS NOT NULL THEN pwnu.nama
                WHEN surat_keputusan.id_pcnu IS NOT NULL THEN pcnu.nama
                WHEN surat_keputusan.id_mwcnu IS NOT NULL THEN mwcnu.nama
                WHEN surat_keputusan.id_lembaga IS NOT NULL THEN lembaga.nama
                WHEN surat_keputusan.id_banom IS NOT NULL THEN banom.nama
                ELSE '-'
            END As nama_wilayah_kerja,
            CASE
                WHEN surat_keputusan.id_pwnu IS NOT NULL THEN surat_keputusan.id_pwnu
                WHEN surat_keputusan.id_pcnu IS NOT NULL THEN surat_keputusan.id_pcnu
                WHEN surat_keputusan.id_mwcnu IS NOT NULL THEN surat_keputusan.id_mwcnu
                WHEN surat_keputusan.id_lembaga IS NOT NULL THEN surat_keputusan.id_lembaga
                WHEN surat_keputusan.id_banom IS NOT NULL THEN surat_keputusan.id_banom
                ELSE '-'
            END As id_wilayah_kerja,
            CASE
                WHEN surat_keputusan.id_pwnu IS NOT NULL THEN 'pwnu'
                WHEN surat_keputusan.id_pcnu IS NOT NULL THEN 'pcnu'
                WHEN surat_keputusan.id_mwcnu IS NOT NULL THEN 'mwcnu'
                WHEN surat_keputusan.id_lembaga IS NOT NULL THEN 'lembaga'
                WHEN surat_keputusan.id_banom IS NOT NULL THEN 'banom'
                ELSE '-'
            END As wilayah_kerja,
            surat_keputusan.id
        ")
        ->leftJoin('pwnu','pwnu.id','=','surat_keputusan.id_pwnu')
        ->leftJoin('pcnu','pcnu.id','=','surat_keputusan.id_pcnu')
        ->leftJoin('mwcnu','mwcnu.id','=','surat_keputusan.id_mwcnu')
        ->leftJoin('lembaga','lembaga.id','=','surat_keputusan.id_lembaga')
        ->leftJoin('banom','banom.id','=','surat_keputusan.id_banom')
        ->where('surat_keputusan.id', $pengurus->id_sk)
        ->first();
        $data = [
            'title'=> 'Detail Pengurus',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'name'=>'PWNU Jawa Barat',
            'anggota' => $anggota,
            'sk_data' => $sk_data,
            'pengurus' => $pengurus,
        ];

        return view('pages.detail-pengurus', $data);
    }

    public function getPengurus(Request $request) {
        $id = $request->id;
        $id_anggota = getRoute($id);
        // dd($id_anggota);
        $anggota = Anggota::where('id', $id_anggota)
            ->first();
        if ($anggota)
            return response()->json($anggota,200);
        else
            return response()->json([], 404);
    }

    public function edit(Request $request){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nik' => 'required|sometimes',
            'email' => 'required|sometimes',
            'img' => 'required|max:2048',
            'karta_nu' => 'required|sometimes'
        ];

        $message = [
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'no_telp.required' => 'No Telepone Harus Diisi',
            'nik.required' => 'Nik Harus Diisi',
            // 'nik.unique' => 'Nik Sudah Terdaftar',
            // 'nik.max' => 'Jumlah NIK harus 16 Karakter',
            'email.required' => 'Email Harus Diisi',
            // 'email.unique' => 'Email Sudah Terdaftar',
            'email.email' => 'Format Penulisan Email Salah',
            'img.required' => 'Image Harus Diisi',
            'img.max' => 'Ukuran Gambar Maksimal 2MB',
            'karta_nu.required' => 'KartaNu Harus Diisi',
            // 'karta_nu.unique' => 'KartaNu Sudah Terdaftar'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        // dd($validated);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $data = $validated->validate();
        if($request->file('img')){
            $file_img = $request->file('img');
            $file_img_name = $file_img->getClientOriginalName();
            $file_img_path = Storage::disk('public')->putFileAs($file_img, $file_img_name);
            $data['img'] = $file_img_path;
        }
        // dd($data);
        $id_anggota = $request->id;
        // dd($id_anggota);
        // $id = getRoute($id_anggota);
        Anggota::query()->where('id', $id_anggota)->update($data);
        Alert::success('Data Berhasil DiUpadte');
        return redirect()->back();
    }

    public function delete(Request $request){
        $id = $request->id_anggota;
        $id_anggota = getRoute($id);
        $is_deleted = Anggota::query()->where('id', $id_anggota)->delete();
        if($is_deleted){
            Alert::success('Data Berhasil DiHapus');
            return redirect()->back();
        } else {
            Alert::success('Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
