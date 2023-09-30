<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $user = Users::join('table_user_groups', 'table_users.id_grup', '=', 'table_user_groups.id')
                        ->get();
        $data = [
            'title'=> 'User',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user' => $user
        ];
        return view('pages.user', $data);
    }

    public function addUser(){
        $user_group = UserGroup::query()->get();
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user_group' => $user_group,
            'method' => 'POST',
            'action' => route('process-user')
        ];
        return view('pages.add.add-user',$data);
    }

    public function process(Request $request){
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_group' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            // 'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Password Harus Diisi',
            'user_groups.required' => 'User Groups Harus Diisi',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }
        $user_group = UserGroup::query()->where('nama_grup', $request->user_group)->first();
        if (empty($user_group)){
            Alert::error('Oops', 'User group tidak tersedia');
            return redirect()->back();
        }
        $password = Hash::make($request->input('password'));
        $data = $validated->validate();
        $data['password'] = $password;
        $data['id_grup'] = $user_group->id;
        Users::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user'));
    }

    public function delete($id_user){
        $user_group = Users::query()->where('id', $id_user)->delete();
        if($user_group > 0){
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Gagal Dihapus Dihapus');
            return redirect()->back();
        }
    }
}
