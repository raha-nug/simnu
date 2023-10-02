<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPengurus;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class JenisPengurusController extends Controller
{
    public function index(){
        $jp = JenisPengurus::query()->get();
        $data = [
            'title'=> 'Jenis Pengurus',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'jp' => $jp ?? new JenisPengurus
        ];

        return view('pages.jenis-pengurus', $data);
    }

    public function getJenisPengurus($id_jp){
        $id = getRoute($id_jp);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.jenis-pengurus');
        }

        $jenis_pengurus = JenisPengurus::query()->where('id', $id)->first();
        return $this->addJenisPengurus($jenis_pengurus);
    }
    public function addJenisPengurus($data_jp=null){
        $data = [
            'title'=> 'Jenis Pengurus',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_jenis_pengurus')
        ];

        if($data_jp)
            $data['data_jp'] = $data_jp;

        return view('pages.add.add-jenis-pengurus', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_jp' => 'required',
        ];

        $message = [
            'nama_jp.required' => 'Nama Jenis Pengurus Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = JenisPengurus::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return view(route('jenis_pengurus'));
        }
        JenisPengurus::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('jenis_pengurus'));
    }

    public function detail($id_jp){
        $id = getRoute($id_jp);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $jp = JenisPengurus::query()->where('id', $id_jp)->first();
        $data = [
            'title'=> 'Detail User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'data_jp' => $jp,
        ];
        return view('pages.detail-jenis-pengurus', $data);
    }

    public function delete($id_jp){
        $id = getRoute($id_jp);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = JenisPengurus::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
