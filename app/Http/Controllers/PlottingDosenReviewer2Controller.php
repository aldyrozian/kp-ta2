<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\PendaftaranSeminar;
use App\Models\PenilaianSeminar;
use App\Models\Review;
use App\Models\Reviewer1;
use App\Models\Reviewer2;
use Illuminate\Http\Request;

class PlottingDosenReviewer2Controller extends Controller
{
    public function index(Request $request)
    {
        $list_mahasiswa = \App\Models\PendaftaranSeminar::with([
            "reviewer2" => function ($q) {
                $q->with("dosen");
            },
            "mahasiswa"
        ])->filterR2(request('search'));

        $sortBy = $request->sortBy;
        $sortAsc = $request->sortAsc;
        if ($sortBy) {
            if ($request->sortBy == 'r1') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Reviewer1::select('id')->whereColumn('reviewer1s.id', 'pendaftaran_seminars.r1_id'), $sortAsc);
            } elseif ($request->sortBy == 'r2') {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Reviewer2::select('id')->whereColumn('reviewer2s.id', 'pendaftaran_seminars.r2_id'), $sortAsc);
            } else {
                $list_mahasiswa =  $list_mahasiswa->orderBy(Mahasiswa::select($request->sortBy)->whereColumn('mahasiswas.id', 'pendaftaran_seminars.mahasiswa_id'), $request->sortAsc);
            }
        }

        $list_mahasiswa = $list_mahasiswa->paginate(7)->withQueryString();
        return view(
            'koordinator.plotting-dosen-reviewer2',
            [
                'title' => 'Plotting Dosen Reviewer 2',
                'role' => 'Koordinator',
                'list_mahasiswa' => $list_mahasiswa,
                'sortBy' => $request->sortBy,
                'sortAsc' => $request->sortAsc,
                'search' => $request->search
            ]
        );
    }

    public function show($id)
    {
        
        $pendaftarans = \App\Models\PendaftaranSeminar::get();
        $mahasiswa = \App\Models\PendaftaranSeminar::with('mahasiswa')->find($id);
        $list_dosen = \App\Models\Dosen::with('reviewer2')->paginate(4);
        $list_reviewer2 = Reviewer2::get();
        $list_reviewer1 = Reviewer1::get();
        return view(
            'koordinator.isian-plotting-dosen-reviewer2',
            [
                'title' => 'Pendaftaran TA 2',
                'role' => 'Koordinator',
                'plotting_dosen' => 'Reviewer',
                'mahasiswa' => $mahasiswa,
                'list_r2' => $list_reviewer2,
                'list_r1' => $list_reviewer1,
                'list_dosen' => $list_dosen,
                'pendaftarans' => $pendaftarans
            ]
        );
    }

    public function update(Request $request, $id)
    {

        $mahasiswa_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->mahasiswa_id;

        $r2Value = request('r2');
        $pos_r2 = strpos($r2Value, "(");
        $r2Value = substr($r2Value, 0, $pos_r2 - 1);


        $dosen_id = \App\Models\Dosen::where('name', '=', $r2Value)->get()[0]->id;

        $r2_id = Reviewer2::where('dosen_id', $dosen_id)->get()[0]->id;

        PendaftaranSeminar::where('id', $id)->update([
            'r2_id' =>  $r2_id
        ]);

        $r1_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->r1_id;
        $p1_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p1_id;
        $p2_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p2_id;

        //sada
        $r1Value = request('r1');
        $pos_r1 = strpos($r1Value, "(");
        $r1Value = substr($r1Value, 0, $pos_r1 - 1);


        $dosen_id = \App\Models\Dosen::where('name', '=', $r1Value)->get()[0]->id;

        $r1_id = Reviewer1::where('dosen_id', $dosen_id)->get()[0]->id;

        PendaftaranSeminar::where('id', $id)->update([
            'r1_id' =>  $r1_id
        ]);

        $r2_id = PendaftaranSeminar::where('id', '=', $id)->get()[0]->r1_id;
        $p1_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p1_id;
        $p2_id = Pendaftaran::where('mahasiswa_id', $mahasiswa_id)->get()[0]->p2_id;
        //


        if (PenilaianSeminar::where('mahasiswa_id', $mahasiswa_id)->first() == null) {
            PenilaianSeminar::create([
                'mahasiswa_id' => $mahasiswa_id,
                'pembimbing1_id' => $p1_id,
                'pembimbing2_id' => $p2_id,
                'reviewer1_id' => $r1_id,
                'reviewer2_id' => $r2_id
            ]);
        } else {
            PenilaianSeminar::where('mahasiswa_id', $mahasiswa_id)->update([
                'reviewer2_id' => $r2_id
            ]);
        }

        return redirect('/koordinator/plotting-dosen-reviewer2')->with('success', 'Plotting telah diperbarui!');
    }
}