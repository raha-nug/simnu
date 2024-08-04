<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $user = Users::select('table_users.id', 'table_users.nama', 'table_users.email','table_user_groups.nama_grup')
                        ->join('table_user_groups', 'table_users.id_grup', '=', 'table_user_groups.id')
                        ->get();
        $data = [
            'count' => 1,
            'title'=> 'User',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'user' => $user
        ];
        return view('pages.user', $data);
    }

    public function getUser($id_user){
        $id = getRoute($id_user);
        if (!$id)
            return redirect('user');
        $user = Users::query()->where('id', $id)->first();
        return $this->addUser($user);
    }

    public function addUser($data_user=null){
        $user_group = UserGroup::query()->get();
        $data = [
            'title'=> 'User Group',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'user_group'=>$user_group,
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|unique:users,password',
            'user_group' => 'required',
            'no_telp' => 'nullable',
            'foto' => 'nullable|max:2048',
        ];

        $message = [
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.unique' => 'Password Sudah Terdaftar',
            'email.email' => 'Format Penulisan Email Salah',
            'password.required' => 'Password Harus Diisi',
            'user_group.required' => 'User Groups Harus Diisi',
            'foto.max' => 'Foto Harus Berukuran 2MB'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $user_group = UserGroup::query()->where('nama_grup', $request->user_group)->first();
        if (empty($user_group)){
            Alert::error('Oops', 'User group tidak tersedia');
            return redirect()->back();
        }
        $data = $validated->validate();
        $data['id_grup'] = $user_group->id;
        if (isset($request->id)) {
            unset($data['user_group']);
            $data['id_grup'] = $user_group->id;
            if($request->file('foto')){
                $file_img = $request->file('foto');
                $file_img_name = $file_img->getClientOriginalName();
                $file_img_path = Storage::disk('public')->putFileAs($file_img, $file_img_name);
                $data['foto'] = $file_img_path;
            }
            dd($data);
            $is_updated = Users::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('pcnu'));
        }
        Users::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user'));
    }

    public function detail(Request $request){
        $limit = $request->page ?? 10;

        if(!isset($request->u))
            return redirect(route('no-found'));

        $id_u = $request->u;
        $id = getRoute($id_u);
        if (!$id)
            return redirect('user');

        $user = Users::select('table_users.nama', 'table_users.email', 'table_users.password', 'table_user_groups.nama_grup')
                        ->join('table_user_groups', 'table_users.id_grup', '=', 'table_user_groups.id')
                        ->where('table_users.id', $id)
                        ->first();
        $data = [
            'title'=> 'Detail User Group',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
            'user' => $user
        ];
        return view('pages.detail-user',$data);
    }

    public function delete($id_user){
        $id = getRoute($id_user);
        $is_deleted = Users::where('id', $id)
            ->delete();
        if($is_deleted){
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Gagal Dihapus Dihapus');
            return redirect()->back();
        }
    }

    public function editProfile(Request $request){
        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_telp' => 'nullable',
            'foto' => 'nullable|max:2048',
        ];

        $message = [
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Sudah Terdaftar',
            'email.email' => 'Format Penulisan Email Salah',
            'foto.max' => 'Foto Harus Berukuran 2MB'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if (isset($request->id)) {
            if($request->file('foto')){
                $file_img = $request->file('foto');
                $file_img_name = $file_img->getClientOriginalName();
                $file_img_path = Storage::disk('public')->putFileAs($file_img, $file_img_name);
                $data['foto'] = $file_img_path;
            }
            $is_updated = Users::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            session()->put('foto', $data['foto']);
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('profile') . '?id_user=' . setRoute($request->id));
        }
        Alert::error('Id Tidak Ditemukan');
        return redirect()->back();
    }

    public function editPassword(Request $request){
        $rules = [
            'password' => 'required|unique:users,password|confirmed',
            'current_password' => 'required'
        ];

        $message = [
            'current_password.required' => 'Password Sebelumnya Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.unique' => 'Password Sudah Terdaftar',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $data = $validated->validate();
        $users = Users::query()->where('id', $request->id)->first();
        if(!Hash::check($request->current_password, $users->password)){
            Alert::error('Oops!','Password Lama Salah');
            return redirect()->back();
        }
        if (isset($request->id)) {
            $data['password'] = Hash::make($request->password);
            $is_updated = Users::where('id', $request->id)->update(['password' => $data['password']]);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('profile') . '?id_user=' . setRoute($request->id));
        }
        Alert::error('Id Tidak Ditemukan');
        return redirect()->back();

    }

    public function Myprofile(Request $request){
        $id = getRoute($request->id_user);
        $profile = Users::query()->select(['*'])->where('id', $id)->first();
        $data = [
            'profile' => $profile,
            'title'=> 'Profile Saya',
            'username'=>session()->get('nama_user'),
            'from'=>'Jawa Barat',
        ];
        return view('pages.detail-profile', $data);
    }
}
