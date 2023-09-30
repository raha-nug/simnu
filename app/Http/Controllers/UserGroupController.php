<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller
{
    public function index(){
        $user_group = PCNU::select('id_pcnu', 'nama', 'nama_grup')
                            ->join('table_user_groups', 'pcnu.id', '=', 'table_user_groups.id_pcnu')
                            ->get();
        if(empty($user_group)){
            Alert::error('Oops', 'Data User Group Tidak Tersedia');
            return redirect()->back();
        }
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user_group' => $user_group
        ];
        return view('pages.user-group',$data);
    }

    public function addUserGroup(){
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'kab_kota' => $this->wilayah->getAddress('32'),
            'method' => 'POST',
            'action' => route('process-user-group')
        ];
        return view('pages.add.add-user-group',$data);
    }

    public function process(Request $request){
        $rules = [
            'nama_grup' => 'required',
            'kota' => 'required',
        ];

        $message = [
            'nama_grup.required' => 'Nama Group Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }
        $pcnu = PCNU::query()->where('kota', $request->kota)->first();
        if(empty($pcnu)){
            Alert::error('Oops!', 'Pcnu Tidak Ditemukan');
            return redirect()->back();
        }
        $data = $validated->validate();
        $data['id_pcnu'] = $pcnu->id;
        UserGroup::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user-group'));
    }
}
