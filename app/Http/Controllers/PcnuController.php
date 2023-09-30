<?php

namespace App\Http\Controllers;

use App\Models\MWCNU;
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
            'list_pcnu' => $pcnu_list
        ];
        
        return view('pages.pcnu', $data);
    }

    public function getPcnu($id_pc)
    {
        $id = getRoute($id_pc);
        if (!$id)
            return redirect('pcnu');

        $pcnu = PCNU::query()->where('id', $id)
            ->first();

        return $this->addPcnu($pcnu);
    }

    public function detailPcnu(Request $request)
    {
        $limit = $request->page ?? 10;

        if(!isset($request->pc))
            return redirect(route('no-found'));

        $id_pc = $request->pc;
        $id = getRoute($id_pc);
        if (!$id)
            return redirect('pcnu');

        $pcnu = PCNU::query()->where('id', $id)
            ->first();
        $mwc_list = MWCNU::getListByPcnu($id, $limit);

        return view('pages.detail-pcnu', [
            'title' => 'Detail PCNU',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'pc_data' => $pcnu,
            'list_mwc' => $mwc_list,
            'kota' => $this->wilayah->getSingleAddress($pcnu->kota ?? '')
        ]);
    }

    public function addPcnu($pc_data=null)
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

        if ($pc_data)
            $data['pc_data'] = $pc_data;

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
            'email' => 'required|email',
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
            'email.required' => 'Email Harus diisi',
            'email.email' => 'Email Tidak valid',
            'kota.required' => 'Kota Harus diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if ($validated->fails()) {
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect(route('pcnu-add'));
        }

        $data = $validated->validate();
        $data['id_pwnu'] = 1;
        $data['provinsi'] = "32";
        if (isset($request->id)) {
            $is_updated = PCNU::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil Disimpan');
            return redirect(route('pcnu'));
        }
        PCNU::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('pcnu'));
    }

    public function deletePcnu($id_pc)
    {
        $id = getRoute($id_pc);
        $is_deleted = PCNU::where('id', $id)
            ->delete();
        
        if ($is_deleted)
        {
            Alert::success('Data Berhasil Dihapus');
            return redirect(route('pcnu'));
        }
        else 
        {
            Alert::error('Data Gagal Dihapus');
            return redirect(route('pcnu'));
        }
    }
}
