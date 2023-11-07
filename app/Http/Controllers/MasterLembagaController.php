<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterLembaga;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MasterLembagaController extends Controller
{
    public function index() {
        $lembaga = MasterLembaga::query()->get();
        $data = [
            'title'=> 'Master Lembaga',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'data_ml' => $lembaga ?? new MasterLembaga
        ];

        return view('pages.master-lembaga', $data);
    }

    public function getMasterLembaga($id_ml){
        $id = getRoute($id_ml);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.master-lembaga');
        }

        $lembaga = MasterLembaga::query()->where('id', $id)->first();
        return $this->addMasterLembaga($lembaga);
    }
    public function addMasterLembaga($data_ml=null){
        $data = [
            'title'=> 'Master Lembaga',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_master_lembaga')
        ];

        if($data_ml)
            $data['data_ml'] = $data_ml;

        return view('pages.add.add-master-lembaga', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_lembaga' => 'required',
        ];

        $message = [
            'nama_lembaga.required' => 'Nama Lembaga Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = MasterLembaga::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('master-lembaga'));
        }
        MasterLembaga::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('master-lembaga'));
    }

    public function detail($id_ml){
        $id = getRoute($id_ml);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $ml = MasterLembaga::query()->where('id', $id)->first();
        $data = [
            'title'=> 'Detail Banom Basis',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'data_ml' => $ml,
        ];
        return view('pages.detail-master-lembaga', $data);
    }

    public function delete($id_ml){
        $id = getRoute($id_ml);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = MasterLembaga::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
