<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index(){
        $jp = Jabatan::query()->get();
        $data = [
            'title'=> 'Jabatan',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'jp' => $jp ?? new Jabatan
        ];

        return view('pages.jabatan', $data);
    }

    public function getJabatan($id_j){
        $id = getRoute($id_j);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.jabatan');
        }

        $jabatan = Jabatan::query()->where('id', $id)->first();
        return $this->addJabatan($jabatan);
    }
    public function addJabatan($data_j=null){
        $data = [
            'title'=> 'Jabatan',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_jabatan')
        ];

        if($data_j)
            $data['data_j'] = $data_j;

        return view('pages.add.add-jabatan', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_jabatan' => 'required',
            'tipe' => 'required',
        ];

        $message = [
            'nama_jabatan.required' => 'Nama Jabatan Pengurus Harus Diisi',
            'tipe.required' => 'Tipe Jabatan Pengurus Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = Jabatan::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('jabatan'));
        }
        Jabatan::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('jabatan'));
    }

    public function detail($id_j){
        $id = getRoute($id_j);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $jp = Jabatan::query()->where('id', $id)->first();
        $data = [
            'title'=> 'Detail User Group',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'data_j' => $jp,
        ];
        return view('pages.detail-jabatan', $data);
    }

    public function delete($id_j){
        $id = getRoute($id_j);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = Jabatan::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
