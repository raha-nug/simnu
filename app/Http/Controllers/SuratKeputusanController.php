<?php

namespace App\Http\Controllers;

use App\Models\PCNU;
use App\Models\PWNU;
use App\Models\Banom;
use App\Models\MWCNU;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use App\Models\SuratKeputusan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SuratKeputusanController extends Controller
{
    public function add_sk(Request $request){
        if(!isset($request->sk)){
            if($request->pw){
                if(!isset($request->pw)){
                    return redirect(route('not-found'));
                }
                $id_pw = $request->pw;
                $id = getRoute($id_pw);

                if(!$id)
                    return redirect()->route('not-found');

                $pw_data = PWNU::query()->where('id', $id)->first();
            }

            if($request->pc){
                if(!isset($request->pc)){
                    return redirect(route('not-found'));
                }
                $id_pc = $request->pc;
                $id = getRoute($id_pc);

                if(!$id)
                    return redirect(route('dashboard'));

                $pc_data = PCNU::getRowData($id);
            }

            if($request->mwc){
                if(!isset($request->mwc)){
                    return redirect(route('not-found'));
                }
                $id_mwc = $request->mwc;
                $id = getRoute($id_mwc);

                if(!$id)
                    return redirect()->route('not-found');

                $mwc_data = MWCNU::getRowData($id);
            }

            if($request->banom){
                if(!isset($request->banom)){
                    return redirect(route('not-found'));
                }
                $id_banom = $request->banom;
                $id = getRoute($id_banom);

                if(!$id)
                    return redirect()->route('not-found');

                $banom_data = Banom::getRowData($id);
            }

            if($request->lembaga){
                if(!isset($request->lembaga)){
                    return redirect(route('not-found'));
                }
                $id_lembaga = $request->lembaga;
                $id = getRoute($id_lembaga);

                if(!$id)
                    return redirect()->route('not-found');

                $lembaga_data = Lembaga::getRowData($id);
            }

            $data = [
                'title' => 'Tambah Surat Keputusan',
                'username' => 'John Doe',
                'from' => 'Jawa Barat',
                'pw_data' => $pw_data ?? new PWNU,
                'pc_data' => $pc_data ?? new PCNU,
                'mwc_data' => $mwc_data ?? new MWCNU,
                'banom_data' => $banom_data ?? new Banom,
                'lembaga_data' => $lembaga_data ?? new Lembaga,
                'method' => 'POST',
                'action' => route('sk_process')
            ];

            return view('pages.add.add-sk', $data);
        }

        $id_sk = $request->sk;
        $id = getRoute($id_sk);

        $sk = SuratKeputusan::query()->where('id', $id)->first();

        $data = [
            'title' => 'Update Surat Keputusan',
            'username' => 'John Doe',
            'from' => 'Jawa Barat',
            'sk' => $sk,
            'mwc_data' => $mwc_data ?? new MWCNU,
            'method' => 'POST',
            'action' => route('sk_process')
        ];

        return view('pages.add.add-sk', $data);
    }

    public function process(Request $request){
        $rules = [
            'no_dokumen' => 'required|unique:surat_keputusan,no_dokumen',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'file_sk' => 'required',
        ];

        $message = [
            'no_dokumen.required' => 'Nomor Dokumen Harus Diisi',
            'no_dokumen.unique' => 'Nomor Dokumen Sudah Terdaftar',
            'tanggal_mulai.required' => 'Tanggal Mulai Harus Diisi',
            'tanggal_berakhir.required' => 'Tanggal Berakhir Harus Diisi',
            'file_sk.required' => 'File SK Harus diisi',
        ];

        $validated = Validator::make($request->all(), $rules, $message);
        if($validated->fails()){
            $error = implode(", ", array_map('implode', array_values($validated->errors()->messages())));
            Alert::error('Oops!', $error);
            return redirect()->back();
        }
        $data = $validated->validate();
        if($request->file('file_sk')){
            $sk = $request->file('file_sk');
            $file_name = $sk->getClientOriginalName();
            $file_path = Storage::disk('public')->putFileAs($sk, $file_name);
            $data['file_sk'] = $file_path;
        }
        if($request->id_pwnu){
            $data['id_pwnu'] = $request->id_pwnu;
        } else {
            $data['id_pwnu'] = null;
        }

        if($request->id_pcnu) {
            $data['id_pcnu'] = $request->id_pcnu;
        } else {
            $data['id_pcnu'] = null;
        }

        if($request->id_mwcnu) {
            $data['id_mwcnu'] = $request->id_mwcnu;
        } else {
            $data['id_mwcnu'] = null;
        }

        if($request->id_lembaga) {
            $data['id_lembaga'] = $request->id_lembaga;
        } else {
            $data['id_lembaga'] = null;
        }

        if($request->id_banom) {
            $data['id_banom'] = $request->id_banom;
        } else {
            $data['id_banom'] = null;
        }
        if (isset($request->id)) {
            $is_updated = SuratKeputusan::where('id', $request->id)->update($data);
            if (!$is_updated) {
                Alert::error('Oops! , Gagal melakukan update');
                return redirect()->back();
            }
            Alert::success('Data Berhasil Diupdate');
            return redirect(route('pcnu-detail') . "?sk=" . setRoute($request->id));
        }
        $new_data = SuratKeputusan::create($data);
        Alert::success("Data Berhasil Disimpan");
        return $this->checkRoute($new_data);
    }

    public function getSklist(Request $request)
    {
        $limit = $request->length ?? 10;
        $start = $request->start ?? 0;
        $options = [
            'id_pwnu' => $request->pw,
            'id_pcnu' => $request->pc,
            'id_mwcnu' => $request->mwc,
            'id_lembaga' => $request->lembaga,
            'id_banom' => $request->banom,
            'search' => $request->search['value']
        ];

        $sk_list = SuratKeputusan::getSklist($limit, $start, $options);
        // dd($sk_list);
        return response()->json((object)[
            'success' => 1,
            'data' => mapSetRoute($sk_list)
        ]);
    }

    public function detail(Request $request){
        $id_sk = $request->sk;
        $id = getRoute($id_sk);
        $sk_detail = SuratKeputusan::query()->where('id', $id)->first();
        $data = [
            'title' => 'Detail Surat Keputusan',
            'username' => 'John Doe',
            'from' => 'Singaparna',
            'sk' => $sk_detail
        ];
        return view('pages.detail-sk', $data);
    }

    public function download(Request $request){
        $id = $request->sk;
        $id_sk = getRoute($id);
        $sk = SuratKeputusan::query()->where('id', $id_sk)->first();

        $data = [
            'sk' => $sk
        ];
        $pdf = Pdf::loadView('components.sk', $data);
        return $pdf->stream('surat_keputusan');
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
            case !empty($data->id_lembaga):
                return redirect(route('lembaga') . "?lembaga=" . setRoute($data->id_lembaga));
            case !empty($data->id_banom):
                return redirect(route('Banom') . "?banom=" . setRoute($data->id_banom));
            default:
                return redirect(route('no-found'));
        }
    }
}
