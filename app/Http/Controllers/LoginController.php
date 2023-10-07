<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserGroup;
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
        $credentials = UserGroup::join('table_user_credentials', 'table_user_groups.id', '=', 'table_user_credentials.id_grup')
                                ->where('table_user_groups.id', $users->id_grup)
                                ->first();
        // dd($credentials);
        $HakAkses = $this->checkAkses($credentials);
        if(!session()->isStarted())
            session()->start();
            session()->put('logged','yes',true);
            session()->put('id_users',$users->id);
            session()->put('hak_akses', $HakAkses['hak_akses']);
            session()->put('can_create', $credentials->can_create);
            session()->put('can_update', $credentials->can_update);
            session()->put('can_delete', $credentials->can_delete);
            session()->put('can_manage_user', $credentials->can_manage_user);
        Alert::success('Login Berhasil');
        return redirect()->route('dashboard');
    }

    public function logout(){
        session()->flush();
        return redirect();
    }

    private function checkAkses($credentials) {
        if($credentials->id_pwnu){
            return ['hak_akses' => $credentials->id_pwnu, 'url' => route('dashboard')];
        } elseif($credentials->id_pcnu) {
            return ['hak_akses' => $credentials->id_pcnu, 'url' => route('pcnu-detail') . 'page=10&pc=' . setRoute($credentials->id_pcnu)];
        } elseif ($credentials->id_mwcnu) {
            return ['hak_akses' => $credentials->id_mwcnu, 'url' => route('mwc-list-bypcnu') . 'page=10&mwc=' . setRoute($credentials->id_mwcnu)];
        } elseif ($credentials->id_rantingnu) {
            return ['hak_akses' => $credentials->id_rantingnu, 'url' => route('ranting-list-bymwc'). 'page=10&ranting' . setRoute($credentials->id_rantingnu)];
        } else {
            return redirect(route('dashboard'));
        }
    }
}
