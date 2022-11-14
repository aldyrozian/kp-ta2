<?php

namespace App\Http\Controllers;

use App\Models\KunciPendaftaran;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Review;
use App\Models\Dosen;
use App\Models\Pembimbing1;
use App\Models\Pembimbing2;

class PendaftaranController extends Controller
{
    public function step1()
    {
        if (isset(auth()->user()->pendaftaran->p1)) {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2/status');
        } else {
            if (KunciPendaftaran::first()->administrasi == 1) {
                return redirect()->intended('/mahasiswa')->with('gagal', 'Maaf, pendaftaran sudah ditutup!');
            }
            $formBimbingan = auth()->user()->mahasiswa->bimbingan;
            $list_p1 = \App\Models\Pembimbing1::with('dosen')->get();
            $list_p2 = \App\Models\Dosen::all();
            $pendaftaran = auth()->user()->pendaftaran;
            return view('mahasiswa.pendaftaran-ta-1-step1', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'seminar' => '',
                'list_p1' => $list_p1,
                'list_p2' => $list_p2,
                'pendaftaran' => $pendaftaran,
                'formBimbingan' => $formBimbingan
            ]);
        }
    }

    public function storeStep1(Request $request)
    {
        if (!isset(auth()->user()->pendaftaran)) {
            $pendaftaran = Pendaftaran::create([
                'mahasiswa_id' => auth()->user()->mahasiswa->id,
                'phone_number' => request('phone_number'),
                'peminatan' => request('peminatan'),
                'angkatan' => request('angkatan')
            ]);
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2-step2');
        } else {
            $mahasiswa_id = auth()->user()->pendaftaran->mahasiswa_id;
            $pendaftaran = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->update([
                'mahasiswa_id' => auth()->user()->mahasiswa->id,
                'phone_number' => request('phone_number'),
                'peminatan' => request('peminatan'),
                'angkatan' => request('angkatan')
            ]);
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2-step2');
        }
    }

    public function step2()
    {
        if (isset(auth()->user()->pendaftaran->alt4_p2)) {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2/status');
        } else {
            $pendaftaran = auth()->user()->pendaftaran;
            $angka_mutus = ['A', 'AB', 'B', 'BC', 'C', 'D', 'E', 'Belum Diambil'];
            $status_matkuls = ['Sudah Selesai', 'Sedang Diambil', 'Belum Diambil'];
            $list_p1 = \App\Models\Pembimbing1::with('dosen')->get();
            $list_p2 = \App\Models\Dosen::all();
            $formBimbingan = auth()->user()->mahasiswa->bimbingan;
            return view('mahasiswa.pendaftaran-ta-1-step2', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'seminar' => '',
                'list_p1' => $list_p1,
                'list_p2' => $list_p2,
                'angka_mutus' => $angka_mutus,
                'formBimbingan' => $formBimbingan,                
                'status_matkuls' => $status_matkuls,
                'pendaftaran' => $pendaftaran
            ]);
        }
    }

    public function storeStep2(Request $request)
    {
        $file = request()->validate([
            'khs' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('khs')) {
            $file['khs'] = request()->file('khs')->store('khs');
        } else $file['khs'] = null;
        $mahasiswa_id = auth()->user()->mahasiswa->id;
        $pendaftaran = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->update([
            'ipk' => request('ipk'),
            'jumlah_sks' => request('jumlah_sks'),
            'jumlah_teori_d' => request('jumlah_teori_d'),
            'jumlah_prak_d' => request('jumlah_prak_d'),
            'jumlah_e' => request('jumlah_e'),
            'algo' => request('algo'),
            'strukdat' => request('strukdat'),
            'basdat' => request('basdat'),
            'rpl' => request('rpl'),
            'metpen' => request('metpen'),
            'pemweb' => request('pemweb'),
            'prak_pemweb' => request('prak_pemweb'),
            'po1' => request('po1'),
            'prak_po1' => request('prak_po1'),
            'appl' => request('appl'),
            'khs' => $file['khs']
        ]);

        return redirect()->intended('/mahasiswa/pendaftaran-ta-2-step3');
    }

    public function step3()
    {
        if (isset(auth()->user()->pendaftaran->alt4_p2)) {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2/status');
        } else {
            $pendaftaran = auth()->user()->pendaftaran;
            $list_p1 = \App\Models\Pembimbing1::with('dosen')->get();
            $list_p2 = \App\Models\Dosen::all();
            $formBimbingan = auth()->user()->mahasiswa->bimbingan;
            return view('mahasiswa.pendaftaran-ta-1-step3', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Lorom Name',
                'role' => 'Mahasiswa',
                'seminar' => '',
                'list_p1' => $list_p1,
                'list_p2' => $list_p2,
                'formBimbingan' => $formBimbingan,
                'pendaftaran' => $pendaftaran
            ]);
        }
    }

    public function storeStep3(Request $request)
    {
        $file = request()->validate([
            'berkas_ta1' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
            'tagihan_uang' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
            'lunas_pembayaran' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);

        if (request()->file('berkas_ta1')) {
            $file['berkas_ta1'] = request()->file('berkas_ta1')->store('berkas_ta1');
        } else $file['berkas_ta1'] = null;
        if (request()->file('tagihan_uang')) {
            $file['tagihan_uang'] = request()->file('tagihan_uang')->store('tagihan_uang');
        } else $file['tagihan_uang'] = null;
        if (request()->file('lunas_pembayaran')) {
            $file['lunas_pembayaran'] = request()->file('lunas_pembayaran')->store('lunas_pembayaran');
        } else $file['lunas_pembayaran'] = null;

        $mahasiswa_id = auth()->user()->mahasiswa->id;
        $pendaftaran = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->update([
            'judul_ta1' => request('judul_ta1'),
            'berkas_ta1' => $file['berkas_ta1'],
            'tagihan_uang' => $file['tagihan_uang'],
            'lunas_pembayaran' => $file['lunas_pembayaran'],
        ]);

        return redirect()->intended('/mahasiswa/pendaftaran-ta-2-step4');
    }

    public function step4()
    {
        if (isset(auth()->user()->pendaftaran->alt4_p2)) {
            return redirect()->intended('/mahasiswa/pendaftaran-ta-2/status');
        } else {
            $kbk = auth()->user()->pendaftaran->peminatan;
            $list_p1 = \App\Models\Pembimbing1::with('dosen')->whereHas('dosen', function ($query) use ($kbk) {
                return $query->where('kbk', $kbk);
            })->get();
            $list_p2 = \App\Models\Dosen::all();
            $formBimbingan = auth()->user()->mahasiswa->bimbingan;
            return view('mahasiswa.pendaftaran-ta-1-step4', [
                'title' => 'Pendaftaran TA 1',
                'name' => 'Lorem Name',
                'role' => 'Mahasiswa',
                'seminar' => '',
                'list_p1' => $list_p1,
                'formBimbingan' => $formBimbingan,
                'list_p2' => $list_p2
            ]);
        }
    }

    public function storeStep4(Request $request)
    {
        //awas -----------------------------------------------------
        $p1Value = request('p1');
        $p2Value = request('p2');

        $pos_p1 = strpos($p1Value, "(");
        $pos_p2 = strpos($p2Value, "(");

        $p1Value = substr($p1Value, 0, $pos_p1 - 1);
        $p2Value = substr($p2Value, 0, $pos_p2 - 1);

        $dosen_id = Dosen::where('name', '=', $p1Value)->get()[0]->id;
        $dosen2_id = Dosen::where('name', '=', $p2Value)->get()[0]->id;


        $p1_id = Pembimbing1::where('dosen_id', $dosen_id)->get()[0]->id;
        $p2_id = Pembimbing2::where('dosen_id', $dosen2_id)->get()[0]->id;

        //----
        $u1Value = request('u1');
        $u2Value = request('u2');

        $pos_u1 = strpos($u1Value, "(");
        $pos_u2 = strpos($u2Value,
            "("
        );

        $u1Value = substr($p1Value,
            0,
            $pos_u1 - 1
        );
        $u2Value = substr($u2Value, 0, $pos_u2 - 1);

        $dosen_id = Dosen::where('name', '=', $u1Value)->get()[0]->id;
        $dosen2_id = Dosen::where('name', '=', $u2Value)->get()[0]->id;


        $u1_id = Pembimbing1::where('dosen_id', $dosen_id)->get()[0]->id;
        $u2_id = Pembimbing2::where('dosen_id', $dosen2_id)->get()[0]->id;
        //---
        //-----------
        $mahasiswa_id = auth()->user()->mahasiswa->id;
        Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->update([
            'p1' => request('p1'),
            'p2' => request('p2'),
            'p1_id' => $p1_id,
            'p2_id' => $p2_id,
            's_p1' => $p1_id,
            's_p2' => $p2_id,
            'u1' => request('u1'),
            'u2' => request('u2'),
            's_u1' => $u1_id,
            's_u2' => $u2_id,
            
        ]);

        $pendaftaran_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->first()->id;

        Review::create([
            'mahasiswa_id' => auth()->user()->mahasiswa->id,
            'pendaftaran_id' => $pendaftaran_id
        ]);



        return redirect()->intended('/mahasiswa/pendaftaran-ta-2/status');
    }


    public function status()
    {
        $formBimbingan = auth()->user()->mahasiswa->bimbingan;

        return view('mahasiswa.status-pendaftaran-ta-1', [
            'title' => 'Status Pendaftaran TA 1',
            'name' => 'Lorem Name',
            'role' => 'Mahasiswa',
            'formBimbingan' => $formBimbingan,
            'status' => auth()->user()->pendaftaran->status
        ]);
    }

    public function showSyarat()
    {
        return view('mahasiswa.syarat-pendaftaran-ta-1', [
            'title' => 'Status Pendaftaran TA 1',
            'role' => 'Mahasiswa',
            'syarat' => auth()->user()->pendaftaran->keterangan_status
        ]);
    }

    public function showAlasan()
    {
        return view('mahasiswa.syarat-pendaftaran-ta-1', [
            'title' => 'Status Pendaftaran TA 1',
            'role' => 'Mahasiswa',
            'syarat' => auth()->user()->pendaftaran->keterangan_status
        ]);
    }
}

// public function storeStep1(Request $request)
//     {
//         $file = request()->validate([
//             'berkas_ta1' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
//             'tagihan_uang' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx',
//             'lunas_pembayaran' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx',
//             'khs' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
//         ]);

//         if (request()->file('berkas_ta1')) {
//             $file['berkas_ta1'] = request()->file('berkas_ta1')->store('berkas_ta1');
//         } else $file['berkas_ta1'] = null;
//         if (request()->file('tagihan_uang')) {
//             $file['tagihan_uang'] = request()->file('tagihan_uang')->store('tagihan_uang');
//         } else $file['tagihan_uang'] = null;
//         if (request()->file('lunas_pembayaran')) {
//             $file['lunas_pembayaran'] = request()->file('lunas_pembayaran')->store('lunas_pembayaran');
//         } else $file['lunas_pembayaran'] = null;
//         if (request()->file('khs')) {
//             $file['khs'] = request()->file('khs')->store('khs');
//         } else $file['khs'] = null;

//         $pendaftaran = Pendaftaran::create([
//             'mahasiswa_id' => auth()->user()->mahasiswa->id,
//             'tempat_lahir' => request('tempat_lahir'),
//             'tanggal_lahir' => request('tanggal_lahir'),
//             'gender' => request('gender'),
//             'phone_number' => request('phone_number'),
//             'address' => request('address'),
//             'peminatan' => request('peminatan'),
//             'angkatan' => request('angkatan'),
//             'ipk' => request('ipk'),
//             'jumlah_sks' => request('jumlah_sks'),
//             'jumlah_teori_d' => request('jumlah_teori_d'),
//             'jumlah_prak_d' => request('jumlah_prak_d'),
//             'jumlah_e' => request('jumlah_e'),
//             'algo' => request('algo'),
//             'strukdat' => request('strukdat'),
//             'basdat' => request('basdat'),
//             'rpl' => request('rpl'),
//             'metpen' => request('metpen'),
//             'pemweb' => request('pemweb'),
//             'prak_pemweb' => request('prak_pemweb'),
//             'po1' => request('po1'),
//             'prak_po1' => request('prak_po1'),
//             'appl' => request('appl'),
//             'judul_ta1' => request('judul_ta1'),
//             'berkas_ta1' => $file['berkas_ta1'],
//             'tagihan_uang' => $file['tagihan_uang'],
//             'lunas_pembayaran' => $file['lunas_pembayaran'],
//             'khs' => $file['khs'],
//             'alt1_p1' => request('alt1_p1'),
//             'alt1_p2' => request('alt1_p2'),
//             'alt2_p1' => request('alt2_p1'),
//             'alt2_p2' => request('alt2_p2'),
//             'alt3_p1' => request('alt3_p1'),
//             'alt3_p2' => request('alt3_p2'),
//             'alt4_p1' => request('alt4_p1'),
//             'alt4_p2' => request('alt4_p2'),
//             'status' => '',
//         ]);

//         Review::create([
//             'mahasiswa_id' => auth()->user()->mahasiswa->id,
//             'pendaftaran_id' => $pendaftaran->id
//         ]);

//         return redirect()->intended('/mahasiswa/pendaftaran-ta-1/status');
//     }