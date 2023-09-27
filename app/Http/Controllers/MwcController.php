<?php

namespace App\Http\Controllers;

use App\Models\MWCNU;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MwcController extends Controller
{
    public function index(){
        $mwc = MWCNU::query()->where('id_pcnu')->get();
        $data = [
            'mwcnu' => $mwc
        ];
        return view($data);
    }

    public function detailmwc($id_mwcnu){
        $mwc = MWCNU::query()->where('id',$id_mwcnu)->first();
        $data = [
            'mwc' => $mwc
        ];
        return view('',$data);
    }

    public function addMwc(Request $request){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'No Handphone Harus Diisi',
            'provinsi.required' => 'Provinsi Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
            'kecamatan.required' => 'Kecamatan Harus Diisi',
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $data = $validated->validate();
        $data['id_pcnu'] = 1;
        MWCNU::query()->create($data);
        Alert::success('Data Berhasil Ditambahkan');
        return redirect();
    }

    public function updateMwc(Request $request, $id_mwcnu){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'telp.required' => 'No Handphone Harus Diisi',
            'provinsi.required' => 'Provinsi Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
            'kecamatan.required' => 'Kecamatan Harus Diisi',
        ];

        $validated = Validator::make($request->all(),$rules,$message);
        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $data = $validated->validate();
        $data['id_pcnu'] = 1;
        MWCNU::query()->where('id', $id_mwcnu)->update($data);
        Alert::success('Data Berhasil Diupdate');
    }

    public function deleteMwc($id_mwcnu){
        $mwcnu = MWC::query()->where('id',$id_mwcnu)->first();
        $deleted = $mwcnu->delete();
        if($deleted > 0){
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Gagal Dihapus Dihapus');
            return redirect()->back();
        }
    }
}
