<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\MWCNU;
use App\Models\Indikator;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\RelasiIndikator;
use App\Models\UraianIndikator;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class IndikatorController extends Controller
{
    public function index(){
        $indikator = Indikator::query()->get();
        $data = [
            'title'=> 'Indikator',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'indikator' => $indikator ?? new Indikator
        ];

        return view('pages.indikator', $data);
    }

    public function getIndikator($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.indikator');
        }

        $indikator = Indikator::query()->where('id', $id)->first();
        return $this->addIndikator($indikator);
    }

    public function getUraian($id_ui){
        $id = getRoute($id_ui);
        if(!$id){
            Alert::error('Oops', 'Data Tidak Ditemukan');
            return view('pages.detail-indikator');
        }

        $uraian = UraianIndikator::query()->where('id', $id)->first();
        return $this->addUraian($uraian);
    }

    public function addUraian(Request $request, $data_ui=null){
        $id = $request->indikator;
        $id_indikator = getRoute($id);

        $data_indikator = Indikator::select(['id','nama_indikator'])->where('id', $id_indikator)->first();

        $data = [
            'title'=> 'Uraian Indikator',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'data_ui' => $data_indikator,
            'method'=>'POST',
            'action' => route('process_uraian')
        ];

        if($data_ui)
            $data['data_ui'] = $data_ui;

        return view('pages.add.add_uraian_indikator', $data);
    }

    public function addIndikator($data_i=null){
        $data = [
            'title'=> 'Indikator',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'method'=>'POST',
            'action' => route('process_indikator')
        ];

        if($data_i)
            $data['data_i'] = $data_i;

        return view('pages.add.add_indikator', $data);
    }

    public function process(Request $request){
        $rules = [
            'nama_indikator' => 'required',
            'tingkat_indikator' => 'required',
        ];

        $message = [
            'nama_indikator.required' => 'Nama Indikator Harus Diisi',
            'tingkat_indikator.required' => 'Tingkat Indikator Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = Indikator::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('indikator'));
        }
        Indikator::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('indikator'));
    }

    public function processUraian(Request $request){
        $rules = [
            'nama_uraian' => 'required',
            'id_indikator' => 'sometimes|nullable',
        ];

        $message = [
            'nama_uraian.required' => 'Nama Indikator Harus Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }

        $data = $validated->validate();
        if(isset($request->id)){
            $is_updated = UraianIndikator::query()->where('id', $request->id)->update($data);
            if(!$is_updated){
                Alert::error('Oops', 'Data Gagal Diupdate');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('indikator'));
        }
        UraianIndikator::create($data);
        Alert::success('Data Berhasil Disimpan');
        return redirect(route('indikator'));
    }

    public function detail($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $bb = Indikator::query()->where('id', $id)->first();
        $uraian = UraianIndikator::query()->where('id_indikator',$bb->id)->get();
        $data = [
            'title'=> 'Detail Banom Basis',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'data_i' => $bb,
            'data_uraian' => $uraian
        ];
        return view('pages.detail-indikator', $data);
    }

    public function delete($id_i){
        $id = getRoute($id_i);
        if(!$id){
            Alert::error('Oops', 'Sepertinya Ada Yang Salah');
            return redirect()->back();
        }

        $deleted = Indikator::query()->where('id', $id)->delete();
        if(!$deleted){
            Alert::error('Oops', 'Data Gagal Dihapus');
            return redirect()->back();
        } else {
            Alert::success('Data Berhasil Dihapus');
            return redirect()->back();
        }
    }

    // add review PCNU
    public function addReviewPcnu(Request $request){
        $id = $request->pcnu;
        $id_pc = getRoute($id);

        $id_relasi_indikator = RelasiIndikator::query()->where('id_pcnu', $id_pc)->first();
        $pcnu = PCNU::query()->where('id', $id_pc)->first() ?? new PCNU;

        $indikator = Indikator::get()->where('tingkat_indikator','PCNU')->toArray();
        $list = Arr::map($indikator, function(array $value){
            $uraian = ['nama_indikator' => $value['nama_indikator'], 'id' => $value['id']];
            $uraian['uraian_indikator'] =  UraianIndikator::where('id_indikator', $value['id'])->get();
            return collect($uraian);
        });
        $data = [
            'pcnu_data' => $pcnu ?? new PCNU,
            'title'=> 'PCNU',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'name'=>'PWNU Jawa Barat',
            'list' => $list,
            'relasi_indikator' => $id_relasi_indikator,
            'method' => 'POST',
            'action' => route('process-review'),
        ];

        return view('pages.add.add-review-pcnu', $data);
    }

    // add review mwcnu
    public function addReviewMwcnu(Request $request){
        $id = $request->mwc;
        $id_mwc = getRoute($id);

        $id_relasi_indikator = RelasiIndikator::query()->where('id_mwcnu', $id_mwc)->first();
        $mwcnu = MWCNU::query()->where('id', $id_mwc)->first();

        $indikator = Indikator::get()->where('tingkat_indikator','MWCNU')->toArray();
        $list = Arr::map($indikator, function(array $value){
            $uraian = ['nama_indikator' => $value['nama_indikator'], 'id' => $value['id']];
            $uraian['uraian_indikator'] =  UraianIndikator::where('id_indikator', $value['id'])->get();
            return collect($uraian);
        });
        $data = [
            'mwc_data' => $mwcnu,
            'title'=> 'MWCNU',
            'username'=>'John Doe',
            'from'=>'Jawa Barat',
            'name'=>'PWNU Jawa Barat',
            'list' => $list,
            'relasi_indikator' => $id_relasi_indikator,
            'method' => 'POST',
            'action' => route('process-review'),
        ];

        return view('pages.add.add-review-mwc', $data);
    }

    public function processReview(Request $request){
        $rules = [
            'id_pwnu' => 'sometimes|nullable',
            'id_pcnu' => 'sometimes|nullable',
            'id_mwcnu' => 'sometimes|nullable',
            'nilai' => 'sometimes|nullable',
        ];

        $message = [
            // 'id_pwnu.required' => 'Id Pwnu Harus Diisi',
            'id_pcnu.required' => 'Id Pcnu Harus Diisi',
            'id_mwcnu.required' => 'Id Mwcnu Harus Diisi',
            // 'nilai.required' => 'Nilai Haris Diisi'
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $data = $validated->validate();
        if(isset($request->id)){
            $verifikasiAda = $request->input('verifikasiAda');
            $verifikasiTidakAda = $request->input('verifikasiTidakAda');
            $validasiKurang = $request->input('validasiKurang');
            $validasiCukup = $request->input('validasiCukup');
            $validasiBaik = $request->input('validasiBaik');
            if($verifikasiAda){
                $ada = count($verifikasiAda);
            }
            if($verifikasiTidakAda){
                $tidakAda = count($verifikasiTidakAda);
                $data['nilai_baik'] = 0;
                $data['nilai_cukup'] = 0;
                $data['nilai_kurang'] = 0;
            }
            if($validasiBaik){
                $baik = count($validasiBaik);
                $data['nilai_baik'] = $baik;
            }
            if($validasiCukup){
                $cukup = count($validasiCukup);
                $data['nilai_cukup'] = $cukup;
            }
            if($validasiKurang){
                $kurang = count($validasiKurang);
                $data['nilai_kurang'] = $kurang;
            }
            $is_updated = RelasiIndikator::query()->where('id', $request->id)->update($data);
            if (!$is_updated)
            {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back(400);
            }
            Alert::success('Reaview Berhasil DiUpdate');
            return redirect(route('pcnu'));
        }
        $verifikasiAda = $request->input('verifikasiAda');
        $verifikasiTidakAda = $request->input('verifikasiTidakAda');
        $validasiKurang = $request->input('validasiKurang');
        $validasiCukup = $request->input('validasiCukup');
        $validasiBaik = $request->input('validasiBaik');
        if($verifikasiAda){
            $ada = count($verifikasiAda);
        }
        if($verifikasiTidakAda){
            $tidakAda = count($verifikasiTidakAda);
            $data['nilai_baik'] = 0;
            $data['nilai_cukup'] = 0;
            $data['nilai_kurang'] = 0;
        }
        if($validasiBaik){
            $baik = count($validasiBaik);
            $data['nilai_baik'] = $baik;
        }
        if($validasiCukup){
            $cukup = count($validasiCukup);
            $data['nilai_cukup'] = $cukup;
        }
        if($validasiKurang){
            $kurang = count($validasiKurang);
            $data['nilai_kurang'] = $kurang;
        }
        Alert::success('Review Berhasl Disimpan');
        $new_data = RelasiIndikator::create($data);
        return $this->checkRoute($new_data);
    }

    private function checkRoute($data)
    {
        switch ($data) {
            case !empty($data->id_pwnu):
                return redirect(route('pwnu'));
            case !empty($data->id_pcnu):
                return redirect(route('pcnu-detail') . "?pc=" . setRoute($data->id_pcnu));
            case !empty($data->id_mwcnu):
                return redirect(route('mwcnu') . "?mwc=" . setRoute($data->id_mwcnu));
            default:
                return redirect(route('no-found'));
        }
    }
}
