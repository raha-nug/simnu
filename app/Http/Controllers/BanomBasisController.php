<?php

namespace App\Http\Controllers;

use App\Models\BanomBasis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BanomBasisController extends Controller
{
    public function index(){
        $banom_basis = BanomBasis::query()->get();
        $data = [
            'title'=> 'Banom Basis',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'banom_basis' => $banom_basis ?? new BanomBasis
        ];

        return view('pages.banom-basis', $data);
    }

    public function getBanomBasis($id_bb){
        $id = getRoute($id_bb);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.banom-basis');
        }

        $banom_basis = BanomBasis::query()->where('id', $id)->first();
        return $this->addBanomBasis($banom_basis);
    }
    public function addBanomBasis($data_bb=null){
        $data = [
            'title'=> 'Banom Basis',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_banom_basis')
        ];

        if($data_bb)
            $data['data_bb'] = $data_bb;

        return view('pages.add.add-banom-basis', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_banom_basis' => 'required',
        ];

        $message = [
            'nama_banom_basis.required' => 'Nama Banom Basis Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = BanomBasis::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('banom-basis'));
        }
        BanomBasis::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('banom-basis'));
    }

    public function detail($id_bb){
        $id = getRoute($id_bb);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $bb = BanomBasis::query()->where('id', $id)->first();
        $data = [
            'title'=> 'Detail Banom Basis',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'data_bb' => $bb,
        ];
        return view('pages.detail-banom-basis', $data);
    }

    public function delete($id_bb){
        $id = getRoute($id_bb);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = BanomBasis::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
