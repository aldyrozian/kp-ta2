<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ListBimbingan;
use App\Models\Review;
use Illuminate\Http\Request;

class FormBimbinganController extends Controller
{
    public function index()
    {
        
        $bimbingans = \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get();
        return view(
            'mahasiswa.form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Lorem',
                'role' => 'Mahasiswa',
                'bimbingans' => $bimbingans
            ]
        );
    }

    public function create()
    {
        
        return view(
            'mahasiswa.isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Lorem',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => null
            ]
        );
    }

    public function store(Request $request)
    {
        $file = request()->validate([
            'berkas_bim' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx',
            'qrcode' => 'file|max:5120|mimes:jpg,jpeg,png,doc,docx,pdf,ppt,pptx'
        ]);
        if (request()->file('berkas_bim')) {
            $file['berkas_bim'] = request()->file('berkas_bim')->store('berkas_bim');
        } else $file['berkas_bim'] = null;

        if (request()->file('qrcode')) {
            $file['qrcode'] = request()->file('qrcode')->store('qrcode');
        } else $file['qrcode'] = null;

        $is_p1 = self::isP1($request->is_p1);
        ListBimbingan::with('bimbingan')->create([
            'bimbingan_id' => auth()->user()->bimbingan->id,
            'waktu' => $request->tanggal_waktu,
            'berkas_bukti' => $file['berkas_bim'],
            'pokok_materi' => $request->pokok_materi,
            'qrcode' => $file['qrcode'],
            'is_p1' => $is_p1
        ]);
        return redirect('/mahasiswa/form-bimbingan')->with('success', 'Form bimbimgan baru telah ditambahkan!');
    }

    public function isP1($name)
    {
        return ($name == auth()->user()->bimbingan->pembimbing1->dosen->name);
    }

    public function show($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.detail-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing
            ]
        );
    }

    public function edit($x)
    {
        $bimbingan = \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1];
        if ($bimbingan->is_p1) {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing1->dosen->name;
        } else {
            $nama_pembimbing = auth()->user()->bimbingan->pembimbing2->dosen->name;
        }
        return view(
            'mahasiswa.edit-isian-form-bimbingan',
            [
                'title' => 'Form Bimbingan',
                'name' => 'Fahmi Yusron Fiddin',
                'role' => 'Mahasiswa',
                'bimbingan_ke' => $x,
                'bimbingan' => $bimbingan,
                'nama_pembimbing' => $nama_pembimbing
            ]
        );
    }

    public function update(Request $request, $x)
    {
        $is_p1 = self::isP1($request->is_p1);
        \App\Models\ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
            $query->where('id', auth()->user()->bimbingan->id);
        })->get()[$x - 1]->update([
            'waktu' => $request->tanggal_waktu,
            'pokok_materi' => $request->pokok_materi,
            'pembahasan' => $request->pembahasan_bimbingan,
            'is_p1' => $is_p1,
            'setuju' => null
        ]);
        return redirect('/mahasiswa/form-bimbingan/' . $x)->with('success', 'Form bimbimgan telah diperbarui!');
    }

    // public function downloadbuktibim($berkas_bukti)
    // {
    //     $data = Pendaftaran::with('mahasiswa')->where('id', $id)->first();
    //     $data = ListBimbingan::with('bimbingan')->where('id', $id)->first();
    //     $filepath = public_path("storage/{$data->berkas_bim}");
    //     return response()->download($filepath);
    // }
    // public function downloadqrcode($x)
    // {
    //     $data = ListBimbingan::with('bimbingan')->oldest()->whereHas('bimbingan', function ($query) {
    //         $query->where('id', auth()->user()->bimbingan->id);
    //     })->get()[$x - 1];
    //     $filepath = public_path("storage/{$data->qrcode}");
    //     return response()->download($filepath);
    // }
    public function downloadbuktibim($id)
    {
        if (ListBimbingan::first() != null) {
            $data = ListBimbingan::with('mahasiswa')->where('id', $id)->first();
            $filepath = public_path("storage/{$data->berkas_bukti}");
            return response()->download($filepath);
        } else {
            return redirect()->back()->with('gagal', 'Maaf, Jadwal Seminar TA 2 belum tersedia!');
        }
    }
    public function downloadqrcode($id)
    {
        if (ListBimbingan::first() != null) {
            $data = ListBimbingan::with('mahasiswa')->where('id', $id)->first();
            $filepath = public_path("storage/{$data->qrcode}");
            return response()->download($filepath);
        } else {
            return redirect()->back()->with('gagal', 'Maaf, Jadwal Seminar TA 2 belum tersedia!');
        }
    }
}