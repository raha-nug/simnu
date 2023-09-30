<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $data = [
            'title'=> 'User',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
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
            'email' => 'required|unique:email, table_users',
            'password' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Password Harus Diisi',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        dd($validated);
        if($validated->fails()){
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }
        $user_group = UserGroup::query()->where('nama_grup', $request->nama)->first();
        if (empty($user_group)){
            Alert::error('Oops', 'User group tidak tersedia');
            return redirect()->back();
        }
        $data = $validated->validate();
        $data['id_group'] = $user_group->id;
        Users::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user'));
    }
}
