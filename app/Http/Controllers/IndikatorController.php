<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class IndikatorController extends Controller
{
    public function index(){
        $indikator = Indikator::query()->get();
        $data = [
            'title'=> 'Indikator',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'indikator' => $indikator ?? new Indikator
        ];

        return view('pages.indikator', $data);
    }

    public function getIndikator($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.indikator');
        }

        $indikator = Indikator::query()->where('id', $id)->first();
        return $this->addIndikator($indikator);
    }
    public function addIndikator($data_i=null){
        $data = [
            'title'=> 'Indikator',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_indikator')
        ];

        if($data_i)
            $data['data_i'] = $data_i;

        return view('pages.add.add_indikator', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_indikator' => 'required',
        ];

        $message = [
            'nama_indikator.required' => 'Nama Indikator Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = Indikator::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('indikator'));
        }
        Indikator::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('indikator'));
    }

    public function detail($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $bb = Indikator::query()->where('id', $id)->first();
        $data = [
            'title'=> 'Detail Banom Basis',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'data_i' => $bb,
        ];
        return view('pages.detail-indikator', $data);
    }

    public function delete($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = Indikator::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
