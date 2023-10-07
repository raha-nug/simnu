<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\MWCNU;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Models\UserCredentials;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller
{
    public function index(){
        $user_group = UserGroup::select('table_user_groups.id','table_user_groups.nama_grup', 'pcnu.nama')
                                ->join('pcnu', 'table_user_groups.id_pcnu', '=', 'pcnu.id')
                                ->get();
        // dd($user_group);
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

    public function getUserGroup($id_user_group)
    {
        $id = getRoute($id_user_group);
        if (!$id)
            return redirect('user_groups');

        $user_group = UserGroup::select('table_user_groups.id', 'table_user_groups.nama_grup', 'pcnu.kota', 'pcnu.nama', 'mwcnu.kecamatan')
                                ->leftjoin('pcnu', 'table_user_groups.id_pcnu', '=', 'pcnu.id')
                                ->leftjoin('mwcnu', 'table_user_groups.id_mwcnu', '=', 'mwcnu.id')
                                ->where('table_user_groups.id', $id)
                                ->first();
        // dd($user_group);
        return $this->addUserGroup($user_group);
    }

    public function addUserGroup($data_user_group=null){
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'kab_kota' => $this->wilayah->getAddress('32'),
            'method' => 'POST',
            'action' => route('process-user-group')
        ];
        if($data_user_group)
            $data['user_group'] = $data_user_group;
            $data['kecamatan'] = $this->wilayah->getAddress($data_user_group->kota ?? "");

        return view('pages.add.add-user-group',$data);
    }

    public function getKecamatan($kode){
        $kecamatan = $this->wilayah->getAddress($kode);
        return response()->json($kecamatan);
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
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $pcnu = PCNU::query()->where('kota', $request->kota)->first();
        if(empty($pcnu)){
            Alert::error('Oops!', 'Pcnu Tidak Ditemukan');
            return redirect()->back();
        }
        // dd($request->kecamatan);
        if($request->kecamatan){
            $mwcnu = MWCNU::query()->where('kecamatan', $request->kecamatan)->first();
            if(empty($mwcnu)){
                Alert::error('Oops!', 'Mwcnu Tidak Ditemukan');
                return redirect()->back();
            }
        }
        $data = $validated->validate();
        $data['id_pcnu'] = $pcnu->id;
        $data['id_mwcnu'] = $mwcnu->id ?? null;
        // dd($data);
        if (isset($request->id)) {
            unset($data['kota']);
            unset($data['kecamatan']);
            $data['id_pcnu'] = $pcnu->id;
            $data['id_mwcnu'] = $mwcnu->id;
            // dd($data);
            $is_updated = UserGroup::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('user-group'));
        }
        $user_group = UserGroup::create($data);
        if(isset($request->nambah)){
            $enable_nambah = true;
        } else {
            $enable_nambah = false;
        }
        if(isset($request->edit)){
            $enable_edit = true;
        } else {
            $enable_edit = false;
        }
        if(isset($request->delete)){
            $enable_hapus = true;
        } else {
            $enable_hapus = false;
        }
        if(isset($request->kelola_user)){
            $enable_user = true;
        } else {
            $enable_user = false;
        }
        $data_credentials = [
            'id_grup' => $user_group->id,
            'can_update' => $enable_edit,
            'can_delete' => $enable_hapus,
            'can_create' => $enable_nambah,
            'can_manage_user' => $enable_user,
        ];
        UserCredentials::create($data_credentials);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('user-group'));
    }

    public function detail(Request $request){
        $limit = $request->page ?? 10;

        if(!isset($request->ug))
            return redirect(route('no-found'));

        $id_ug = $request->ug;
        $id = getRoute($id_ug);
        if (!$id)
            return redirect('user-group');

        $user_group = UserGroup::query()->where('id', $id)
            ->first();
        $data = [
            'title'=> 'Detail User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'user_group' => $user_group
        ];
        return view('pages.detail-user-group',$data);
    }

    public function delete($id_ug)
    {
        $id = getRoute($id_ug);
        $is_deleted = UserGroup::where('id', $id)
            ->delete();

        if ($is_deleted)
        {
            Alert::success('Data Berhasil Dihapus');
            return redirect(route('user-group'));
        }
        else
        {
            Alert::error('Data Gagal Dihapus');
            return redirect(route('user-group'));
        }
    }
}
