<?php

namespace App\Http\Controllers;

use App\Models\BanomBasis;
use App\Models\MasterBanom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MasterBanomController extends Controller
{
    public function index() {
        $master_banom = MasterBanom::query()->get();
        $data = [
            'title'=> 'Master Banom',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'master_banom'=>$master_banom ?? new MasterBanom
        ];

        return view('pages.master-banom', $data);
    }

    public function getMasterBanom($id_mb){
        $id = getRoute($id_mb);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.master-banom');
        }

        $master_banom = MasterBanom::select('master_banom.id', 'banom_basis.nama_banom_basis', 'master_banom.nama_banom')
                                    ->leftjoin('banom_basis', 'master_banom.id_banom_basis', '=' , 'banom_basis.id')
                                    ->where('master_banom.id', $id)
                                    ->first();
        return $this->addMasterBanom($master_banom);
    }
    public function addMasterBanom($data_mb=null){
        $banomBasis = BanomBasis::query()->get();
        $data = [
            'title'=> 'Master Banom',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'banom_basis' => $banomBasis,
            'method'=>'POST',
            'action' => route('process_mater_banom')
        ];

        if($data_mb)
            $data['data_mb'] = $data_mb;

        return view('pages.add.add-master-banom', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_banom' => 'required',
        ];

        $message = [
            'nama_banom.required' => 'Nama Master Banom Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $banom_basis = BanomBasis::query()->where('nama_banom_basis', $request->nama_banom_basis)->first();
        $data = $validated->validate();
        $data['id_banom_basis'] = $banom_basis->id;
        if(isset($request->id)){
            $is_updated = MasterBanom::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('master-banom'));
        }
        MasterBanom::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('master-banom'));
    }

    public function detail($id_mb){
        $id = getRoute($id_mb);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $mb = MasterBanom::query()->where('id', $id)->first();
        $data = [
            'title'=> 'Detail Master Banom',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'data_mb' => $mb,
        ];
        return view('pages.detail-banom', $data);
    }

    public function delete($id_mb){
        $id = getRoute($id_mb);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = MasterBanom::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
