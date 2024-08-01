<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PCNU;
use App\Models\Banom;
use App\Models\MWCNU;
use App\Models\Lembaga;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PcnuController extends Controller
{
    public function index(Request $request)
    {

        if(session()->get('hak_akses_pcnu') || session()->get('hak_akses_mwcnu') || session()->get('hak_akses_rantingnu'))
        {
            $auth = new LoginController();
            return $auth->getCredential(session()->get('id_users'));
        }

        $pcnu_list = PCNU::getData();
        $data = [
            'title' => 'PCNU',
            'username' =>session()->get('nama_user'),
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
        if(!isset($request->pc))
            return redirect(route('not-found'));

        $id_pc = $request->pc;
        $id = getRoute($id_pc);
        if (!$id)
            return redirect('pcnu');

        $pcnu = PCNU::query()->where('id', $id)
        ->first();
        $jml_lembaga = Lembaga::query()->where('id_pcnu', $id)->count();
        $jml_banom = Banom::query()->where('id_pcnu', $id)->count();
        $jml_pengurus = Pengurus::query()->leftJoin('surat_keputusan','surat_keputusan.id', 'pengurus.id_sk')
                                         ->leftJoin('pcnu','pcnu.id','surat_keputusan.id_pcnu')
                                         ->where('pcnu.id',$id)
                                         ->count();
        $pcnu = PCNU::detailPcnu($id);

        if($request->ajax()){
            $pengurus = Pengurus::query()
                        ->select(['anggota.id as id','anggota.nama as nama', 'pengurus.jenis_pengurus as pengurus','pengurus.jabatan as jabatan', 'mulai_jabatan', 'akhir_jabatan'])
                        ->join('surat_keputusan', 'pengurus.id_sk', '=', 'surat_keputusan.id')
                        ->join('pcnu', 'surat_keputusan.id_pcnu', '=', 'pcnu.id')
                        ->join('anggota', 'pengurus.id_anggota', '=', 'anggota.id')
                        ->where('pcnu.id', $id)
                        ->where('tanggal_berakhir', '>', date('Y-m-d'))
                        ->groupBy(['id','nama','pengurus','jabatan','mulai_jabatan','akhir_jabatan'])
                        ->get();
                        
            return DataTables::of($pengurus)
            ->addIndexColumn()
            ->editColumn('id', function($row) {
                return setRoute(strval($row->id));
            })
            ->editColumn('mulai_jabatan', function($row) {
                Carbon::setlocale('id');
                return Carbon::parse($row->mulai_jabatan)->translatedFormat('d F Y');
            })
            ->editColumn('akhir_jabatan', function($row) {
                Carbon::setlocale('id');
                return Carbon::parse($row->akhir_jabatan)->translatedFormat('d F Y');
            })
            ->make(true);
        }

        return view('pages.detail-pcnu', [
            'title' => 'Detail PCNU',
            'username' =>session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'pc_data' => $pcnu,
            'jml_lembaga' => $jml_lembaga,
            'jml_banom' => $jml_banom,
            'jml_pengurus' => $jml_pengurus,
            'nomor' => $count = 1,
            'list_mwc' => collect([]),
            'kota' => $this->wilayah->getSingleAddress($pcnu->kota ?? ''),
            'sk' => $sk ?? new SuratKeputusan,
            // 'pengurus' => $pengurus ?? new Pengurus
        ]);
    }

    public function getmwcByPcnu(Request $request)
    {
        if($request->ajax()){
            return MWCNU::getListByPcnu($request->pc);
        }
    }

    public function addPcnu($pc_data=null)
    {
        $data = [
            'title' => 'PCNU',
            'username' =>session()->get('nama_user'),
            'from' => 'Jawa Barat',
            'name' => 'PCNU Jawa Barat',
            'kab_kota' => $this->wilayah->getAddress('32'),
            'method' => 'POST',
            'action' => route('pcnu-process'),
            'halaman' => "Tambah PCNU"
        ];

        if ($pc_data)
        {
            $data['pc_data'] = $pc_data;
            $data['halaman'] = "Edit PCNU";
        }

        return view('pages.add.add-pcnu', $data);
    }

    public function process(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required|regex:/^[^<>]*$/',
            'telp' => 'nullable|regex:/^[0-9]+$/',
            'lat' => 'nullable|regex:/^[0-9.\-]+$/',
            'long' => 'nullable|regex:/^[0-9.\-]+$/',
            'website' => 'nullable|regex:/^[^<>]*$/',
            'email' => 'required|email',
            'kota' => 'required',
            'foto_pengurus' => 'nullable|max:2048',
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
            'kota.required' => 'Kota Harus diisi',
            'foto_pengurus.max' => 'Ukuran Foto Harus 2MB'
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
            if($request->file('foto_pengurus')){
                $file_img = $request->file('foto_pengurus');
                $file_img_name = $file_img->getClientOriginalName();
                $file_img_path = Storage::disk('public')->putFileAs($file_img, $file_img_name);
                $data['foto_pengurus'] = $file_img_path;
            }
            $is_updated = PCNU::where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Data Berhasil DiUpdate');
            return redirect(route('pcnu-detail') . "?page=10&pc=" . setRoute($request->id));
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
