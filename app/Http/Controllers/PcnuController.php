<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PcnuController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->page ?? 10;
        $pcnu_list = PCNU::getData($limit);
        $data = [
            'title' => 'PCNU',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'name' => 'PCNU Jawa Barat',
            'dataTable' => $pcnu_list
        ];

        return view('pages.pcnu', $data);
    }

    public function addPcnu()
    {

        $data = [
            'title' => 'PCNU',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'name' => 'PCNU Jawa Barat',
            'kab_kota' => $this->wilayah->getAddress('32'),
            'method' => 'POST',
            'action' => route('pcnu-process')
        ];

        return view('pages.add.add-pcnu', $data);
    }

    public function process(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required|regex:/^[A-Za-z0-9.,\s\n\-]+$/',
            'telp' => 'sometimes|nullable|regex:/^[0-9]+$/',
            'lat' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            'long' => 'sometimes|nullable|regex:/^[0-9.\-]+$/',
            'website' => 'sometimes|nullable|regex:/^[A-Za-z0-9.,\s\n\/:\-]+$/',
            'kota' => 'required'
        ];

        $message = [
            'nama.required' => 'Nama Harus diisi',
            'alamat.required' => 'Alamat Harus diisi',
            'alamat.regex' => 'Penulisan alamat tidak benar',
            'telp.regex' => 'Penulisan No Telepon tidak benar',
            'lat.regex' => 'Penulisan Latitude tidak benar',
            'long.regex' => 'Penulisan Longitude tidak benar',
            'website.regex' => 'Penulisan Url website tidak benar',
            'kota.required' => 'Kota Harus diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            Alert::error('Oops!', $validated->errors()->messages());
            dd($validated->errors()->messages());
            return redirect()->back();
        }

        $data = $validated->validate();
        $data['id_pwnu'] = 1;
        $data['provinsi'] = "32";
        if (isset($request->id)) {
            dd($data);
        }
        PCNU::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('pcnu'));
    }
}
