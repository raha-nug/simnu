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
        $user = Users::select('table_users.id', 'table_users.nama', 'table_users.email','table_user_groups.nama_grup')
                        ->join('table_user_groups', 'table_users.id_grup', '=', 'table_user_groups.id')
                        ->get();
        $data = [
            'title'=> 'User',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user' => $user
        ];
        return view('pages.user', $data);
    }

    public function getUser($id_user){
        $id = getRoute($id_user);
        if (!$id)
            return redirect('user');
        $user = Users::select('table_users.id', 'table_users.nama', 'table_users.email', 'table_users.password', 'table_user_groups.nama_grup')
                    ->join('table_user_groups', 'table_users.id_grup', '=', 'table_user_groups.id')
                    ->where('table_users.id', $id_user)
                    ->get();
        return $this->addUser($user);
    }

    public function addUser($data_user=null){
        $user_group = UserGroup::query()->get();
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user_group' => $user_group,
            'method' => 'POST',
            'action' => route('process-user')
        ];
        if($data_user)
            $data['data_user'] = $data_user;
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
        if (isset($request->id)) {
            $password = Hash::make($request->input('password'));
            $data['password'] = $password;
            $data['id_grup'] = $user_group->id;
            $is_updated = Users::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('pcnu'));
        }
        Users::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user'));
    }

    public function delete($id_user){
        // $id = getRoute($id_user);
        $is_deleted = Users::where('id', $id_user)
            ->delete();
        if($is_deleted){
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Gagal Dihapus Dihapus');
            return redirect()->back();
        }
    }
}
