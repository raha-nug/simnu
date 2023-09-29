<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller
{
    public function index(){
        $data = [
            'title'=> 'User Group',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
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
            'nama-group' => 'required',
            'kota' => 'required',
        ];

        $message = [
            'nama-group.required' => 'Nama Group Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }
        $pcnu = PCNU::query()->where('kota', $request->kota)->first() ?? new PCNU;
        $data = $validated->validate();
        $data['id_pcnu'] = $pcnu->id;
        dd($data);
    }
}
