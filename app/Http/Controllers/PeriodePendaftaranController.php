<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeriodePendaftaran;

class PeriodePendaftaranController extends Controller
{
    public function viewperiodependaftaran()
    {

        return view(
        'koordinator.periode_pendaftaran', [
            'title' => 'Periode Pendaftaran',
            'role' => 'Koordinator'
        ]);
    }
    public function storeperiodependaftaran(Request $request)
    {
        $this->validate($request, [
            'tglmulai' => 'required',
            'tglberakhir' => 'required',
        ]);

        $periode = new PeriodePendaftaran;
        $periode->keterangan = $request->keterangan;
        $periode->tanggal_mulai = $request->tglmulai;
        $periode->tanggal_selesai = $request->tglberakhir;
        $periode->save();

        return redirect()->route('viewperiodependaftaran')->with('success', 'Data berhasil ditambahkan');
    }
    public function deleteperiodependaftaran($id)
    {
        $periode = PeriodePendaftaran::find($id);
        $periode->delete();

        return redirect()->route('viewperiodependaftaran')->with('success', 'Data berhasil dihapus');
    }
}
