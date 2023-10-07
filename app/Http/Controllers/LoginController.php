<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function Login(Request $request){
        if($request->method() == "GET"){
            return view('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $users = Users::query()->where('email', $email)->first();
        // dd($users);
        if(empty($users)){
            Alert::error('Email Tidak Ditemukan');
            return redirect()->back();
        }

        if(!Hash::check($password, $users->password)){
            Alert::error('Oops!','Password Salah');
            return redirect()->back();
        }
        $credentials = UserGroup::select('table_user_group.id', 'table_user_groups.nama_grup', 'table_credentials.id',
                                         'table_credentials.id_grup', 'table_credentials.can_create', 'table_credentials.can_update',
                                         'table_credentials.can_delete', 'table_credentials.can_manage_user')
                                ->leftjoin('table_credentials', 'table_user_groups.id', '=', 'table_credentials.id_grup')
                                ->where('table_user_groups.id', $users->id_grup)
                                ->first();
        if(!session()->isStarted())
            session()->start();
            session()->put('logged','yes',true);
            session()->put('id_users',$users->id);
            session()->put('id_credentials', $credentials->id);
        Alert::success('Login Berhasil');
        return redirect()->route('dashboard');
    }

    public function logout(){
        session()->flush();
        return redirect();
    }
}
