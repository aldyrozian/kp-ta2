<?php

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Reviewer2Controller;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\ReviewerP1Controller;
use App\Http\Controllers\HasilReviewController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FormBimbinganController;
use App\Http\Controllers\JadwalSeminarController;
use App\Http\Controllers\RevisiSeminarController;
use App\Http\Controllers\AjuanPembimbing1Controller;
use App\Http\Controllers\AjuanPembimbing2Controller;
use App\Http\Controllers\KunciPendaftaranController;
use App\Http\Controllers\PenilaianSeminarController;
use App\Http\Controllers\ProposalReviewedController;
use App\Http\Controllers\BimbinganMahasiswaController;
use App\Http\Controllers\ListPendaftaranta2Controller;
use App\Http\Controllers\PendaftaranSeminarController;
use App\Http\Controllers\PenilaianSeminarP1Controller;
use App\Http\Controllers\PenilaianSeminarP2Controller;
use App\Http\Controllers\PenilaianSeminarR2Controller;
use App\Http\Controllers\TUPenilaianSeminarController;
use App\Http\Controllers\BimbinganMahasiswa2Controller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\PenilaianSeminarKoorController;
use App\Http\Controllers\TUPendaftaranSeminarController;
use App\Http\Controllers\PlottingDosenReviewerController;
use App\Http\Controllers\PlottingDosenReviewer2Controller;
use App\Http\Controllers\PlottingDosenPembimbingController;
use App\Http\Controllers\ListPendaftaranSeminarta2Controller;
use App\Http\Controllers\TUPendaftaranAdministrasiController;
use App\Http\Controllers\PeriodePendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TEST ==================================================================================

// Route::get('/test', function () {
//     return view('test');
// });
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


// REGISTER ==============================================================================

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// LOGIN ==================================================================================

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store']);

// LOGOUT ==================================================================================

Route::get('/logout', [LoginController::class, 'logout']);

// SESI LOGIN ==================================================================================

Route::group(['middleware' => 'auth'], function () {

    // SESI MAHASISWA ======================================================================================================

    Route::group(['middleware' => 'role:Mahasiswa'], function () {

        // Pendaftaran Administrasi TA 2

        Route::get('/mahasiswa/pendaftaran-ta-2/edit', [PendaftaranController::class, 'edit']);
        Route::post('/mahasiswa/pendaftaran-ta-2/edit', [PendaftaranController::class, 'update']);
        Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
        Route::get('/mahasiswa/pendaftaran-ta-2/status', [PendaftaranController::class, 'status']);
        Route::get('/mahasiswa/pendaftaran-ta-2/status/syarat', [PendaftaranController::class, 'showSyarat']);
        Route::get('/mahasiswa/pendaftaran-ta-2/status/alasan-tidak-lolos', [PendaftaranController::class, 'showAlasan']);
        Route::get('/mahasiswa/pendaftaran-ta-2-step1', [PendaftaranController::class, 'step1']);
        Route::post('/mahasiswa/pendaftaran-ta-2-step1', [PendaftaranController::class, 'storeStep1']);
        Route::get('/mahasiswa/pendaftaran-ta-2-step2', [PendaftaranController::class, 'step2']);
        Route::post('/mahasiswa/pendaftaran-ta-2-step2', [PendaftaranController::class, 'storeStep2']);
        Route::get('/mahasiswa/pendaftaran-ta-2-step3', [PendaftaranController::class, 'step3']);
        Route::post('/mahasiswa/pendaftaran-ta-2-step3', [PendaftaranController::class, 'storeStep3']);
        Route::get('/mahasiswa/pendaftaran-ta-2-step4', [PendaftaranController::class, 'step4']);
        Route::post('/mahasiswa/pendaftaran-ta-2-step4', [PendaftaranController::class, 'storeStep4']);


        // Download Hasil Review

        Route::get('/mahasiswa/hasil-review', [ProposalReviewedController::class, 'index']);
        Route::get('/mahasiswa/hasil-review/download-proposal-p1-{id}', [HasilReviewController::class, 'downloadProposalReviewedP1']);
        Route::get('/mahasiswa/hasil-review/download-proposal-r1-{id}', [HasilReviewController::class, 'downloadProposalReviewedR1']);


        // Formulir Bimbingan

        Route::resource('/mahasiswa/form-bimbingan', FormBimbinganController::class);
        Route::get('/mahasiswa/form-bimbingan/{x}/edit', [FormBimbinganController::class, 'edit']);
        Route::get('/mahasiswa/form-bimbingan/{x}/downloadbukti', [FormBimbinganController::class, 'downloadbuktibim']);
        Route::get('/mahasiswa/form-bimbingan/{x}/downloadqr', [FormBimbinganController::class, 'downloadqrcode']);
        Route::post('/mahasiswa/form-bimbingan/create', [FormBimbinganController::class, 'store']);


        // Pendaftaran Seminar TA 2

        Route::get('/mahasiswa/pendaftaran-seminar-ta-2/status', [PendaftaranSeminarController::class, 'status']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-2/status/download', [JadwalSeminarController::class, 'downloadJadwalMahasiswa']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-2/status/syarat', [PendaftaranSeminarController::class, 'showSyarat']);
        Route::get('/mahasiswa/pendaftaran-seminar-ta-2/status/alasan-tidak-lolos', [PendaftaranSeminarController::class, 'showAlasan']);
        Route::resource('/mahasiswa/pendaftaran-seminar-ta-2', PendaftaranSeminarController::class);

        // Revisi Seminar
        Route::get('/mahasiswa/revisi-seminar', [RevisiSeminarController::class, 'index']);
        Route::get('/mahasiswa/revisi-seminar/create', [RevisiSeminarController::class, 'create']);
        Route::post('/mahasiswa/revisi-seminar/create', [RevisiSeminarController::class, 'store']);
        Route::post('/mahasiswa/revisi-seminar/update', [RevisiSeminarController::class, 'update']);
        Route::get('/mahasiswa/revisi-seminar/downloadFileR1', [RevisiSeminarController::class, 'downloadFileR1']);
        Route::get('/mahasiswa/revisi-seminar/downloadFileR2', [RevisiSeminarController::class, 'downloadFileR2']);
    });

    // SESI KOORDINATOR =================================================================================================================================

    Route::group(['middleware' => 'role:Koordinator'], function () {
        Route::get('/koordinator', [KoordinatorController::class, 'index']);

        // Kunci Pendaftaran Administrasi dan Seminar
        Route::post('/koordinator/list-pendaftaran-ta-2/lock', [KunciPendaftaranController::class, 'lockAdministrasi'])->name('lockAdministrasi');
        Route::post('/koordinator/list-pendaftaran-ta-2/unlock', [KunciPendaftaranController::class, 'unlockAdministrasi'])->name('unlockAdministrasi');;
        Route::post('/koordinator/list-pendaftaran-seminar-ta-2/lock', [KunciPendaftaranController::class, 'lockSeminar'])->name('lockSeminar');
        Route::post('/koordinator/list-pendaftaran-seminar-ta-2/unlock', [KunciPendaftaranController::class, 'unlockSeminar'])->name('unlockSeminar');;

        // Periode Pendaftaran
        Route::get('/koordinator/periode-pendaftaran', [PeriodePendaftaranController::class, 'viewperiodependaftaran'])->name('viewperiodependaftaran');;
        Route::post('/koordinator/periode-pendaftaran', [PeriodePendaftaranController::class, 'storeperiodependaftaran'])->name('storeperiodependaftaran');;
        Route::get('/koordinator/periode-pendaftaran/delete/{id}', [PeriodePendaftaranController::class, 'deleteperiodependaftaran'])->name('deleteperiodependaftaran');;
        // Pendaftaran Administrasi TA 2

        Route::get('/koordinator/list-pendaftaran-ta-2/exportPdf', [ListPendaftaranta2Controller::class, 'exportPdf'])->name('exportPdf');
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/viewProposal', [ListPendaftaranta2Controller::class, 'viewProposal'])->name('viewProposal');
        Route::resource('/koordinator/list-pendaftaran-ta-2', ListPendaftaranta2Controller::class);
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/downloadTagihanUang', [ListPendaftaranta2Controller::class, 'downloadTagihanUang']);
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/downloadLunasPembayaran', [ListPendaftaranta2Controller::class, 'downloadLunasPembayaran']);
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/downloadBerkasta2', [ListPendaftaranta2Controller::class, 'downloadBerkasta2']);
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/downloadKhs', [ListPendaftaranta2Controller::class, 'downloadKhs']);
        Route::get('/koordinator/list-pendaftaran-ta-2/{id}/{kelolosan}', [ListPendaftaranta2Controller::class, 'keterangan']);
        Route::post('/koordinator/list-pendaftaran-ta-2/{id}', [ListPendaftaranta2Controller::class, 'edit_keterangan_kelolosan']);


        // Plotting Dosen Pembimbing, Reviewer, Penguji

        Route::resource('/koordinator/plotting-dosen-pembimbing', PlottingDosenPembimbingController::class);
        Route::resource('/koordinator/plotting-dosen-reviewer', PlottingDosenReviewerController::class);
        Route::resource('/koordinator/plotting-dosen-reviewer2', PlottingDosenReviewer2Controller::class);


        // Review Proposal

        Route::get('/koordinator/hasil-review-proposal/rilis-{id}', [HasilReviewController::class, 'rilis']);
        Route::post('/koordinator/hasil-review-proposal/rilis', [HasilReviewController::class, 'rilisBeberapa']);
        Route::resource('/koordinator/hasil-review-proposal', HasilReviewController::class);
        Route::get('/koordinator/hasil-review-proposal/{id}/downloadProposalReviewedP1', [HasilReviewController::class, 'downloadProposalReviewedP1']);
        Route::get('/koordinator/hasil-review-proposal/{id}/downloadProposalReviewedR1', [HasilReviewController::class, 'downloadProposalReviewedR1']);


        // Pendaftaran Seminar TA 2

        Route::resource('/koordinator/list-pendaftaran-seminar-ta-2', ListPendaftaranSeminarta2Controller::class);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-2/{id}/downloadTagihanUang', [ListPendaftaranSeminarta2Controller::class, 'downloadTagihanUang']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-2/{id}/downloadLunasPembayaran', [ListPendaftaranSeminarta2Controller::class, 'downloadLunasPembayaran']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-2/{id}/downloadBerkasta2', [ListPendaftaranSeminarta2Controller::class, 'downloadBerkasta2']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-2/{id}/downloadKhs', [ListPendaftaranSeminarta2Controller::class, 'downloadKhs']);
        Route::get('/koordinator/list-pendaftaran-seminar-ta-2/{id}/{kelolosan}', [ListPendaftaranSeminarta2Controller::class, 'keterangan']);
        Route::post('/koordinator/list-pendaftaran-seminar-ta-2/{id}', [ListPendaftaranSeminarta2Controller::class, 'edit_keterangan_kelolosan']);


        // Unggah Jadwal Seminar

        Route::get('/koordinator/jadwal-seminar', [JadwalSeminarController::class, 'index']);
        Route::post('/koordinator/jadwal-seminar', [JadwalSeminarController::class, 'store']);
        Route::post('/koordinator/jadwal-seminar/update', [JadwalSeminarController::class, 'update']);
        Route::get('/koordinator/jadwal-seminar/mahasiswa', [JadwalSeminarController::class, 'downloadJadwalMahasiswa']);
        Route::get('/koordinator/jadwal-seminar/dosen', [JadwalSeminarController::class, 'downloadJadwalDosen']);

        // Rilis Berkas Penelitian Mahasiswa
        Route::get('/koordinator/penilaian-seminar/rilis-{id}', [PenilaianSeminarKoorController::class, 'setRilis']);
        Route::get('/koordinator/penilaian-seminar/reset-{id}', [PenilaianSeminarKoorController::class, 'resetRilis']);
        Route::post('/koordinator/penilaian-seminar/rilis', [PenilaianSeminarKoorController::class, 'setRilisBeberapa']);
        Route::resource('/koordinator/penilaian-seminar', PenilaianSeminarKoorController::class);
    });

    // SESI DOSEN =====================================================================================================================================================

    Route::group(['middleware' => 'role:Dosen'], function () {
        Route::get('/dosen', function () {
            return view('dosen.index1', [
                'title' => 'Home',
                'role' => 'Dosen'
            ]);
        });
        Route::get('/dosen/downloadJadwalSeminar', [JadwalSeminarController::class, 'downloadJadwalDosen']);
        Route::get('/dosen/bimbingan',[dosencontroller::class,'']);

        // Reviewer 1

        Route::get('/dosen/reviewer-1', [ReviewerController::class, 'index']);
        Route::get('/dosen/reviewer-1/review-proposal', [ReviewerController::class, 'showReviewProposal']);
        Route::get('/dosen/reviewer-1/review-proposal/downloadBerkasta2-{id}', [ListPendaftaranta2Controller::class, 'downloadBerkasta2']);
        Route::get('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'showFormReview']);
        Route::post('/dosen/reviewer-1/review-proposal/formReview-{id}', [ReviewerController::class, 'createFormReview']);
        Route::resource('dosen/reviewer-1/penilaian-seminar', PenilaianSeminarController::class);
        Route::post('/dosen/reviewer-1/penilaian-seminar/{id}/edit', [PenilaianSeminarController::class, 'update']);
        Route::get('/dosen/reviewer-1/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarController::class, 'downloadFile']);
        Route::get('/dosen/reviewer-1/penilaian-seminar/{id}/downloadFinalProposal', [ListPendaftaranSeminarta2Controller::class, 'downloadBerkasta2']);


        // Reviewer 2

        Route::get('/dosen/reviewer-2', [Reviewer2Controller::class, 'index']);
        Route::resource('/dosen/reviewer-2/penilaian-seminar', PenilaianSeminarR2Controller::class);
        Route::post('/dosen/reviewer-2/penilaian-seminar/{id}/edit', [PenilaianSeminarR2Controller::class, 'update']);
        Route::get('/dosen/reviewer-2/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarR2Controller::class, 'downloadFile']);
        Route::get('/dosen/reviewer-2/penilaian-seminar/{id}/downloadFinalProposal', [ListPendaftaranSeminarta2Controller::class, 'downloadBerkasta2']);


        // Pembimbing 1

        Route::get('/dosen/pembimbing-1', function () {
            if (auth()->user()->pembimbing1) {
                return view('dosen.pembimbing.index', ['title' => 'Home', 'role' => 'Pembimbing 1']);
            } else {
                return redirect()->back()->with('gagal', 'Maaf, anda tidak terdaftar sebagai Pembimbing 1');
            }
        });

        Route::get('/dosen/pembimbing-1/review-proposal', [ReviewerP1Controller::class, 'index'])->name('review-p1-index');
        Route::get('/dosen/pembimbing-1/review-proposal/downloadBerkasta2-{id}', [ListPendaftaranta2Controller::class, 'downloadBerkasta2'])->name('download-berkas-p1');
        Route::get('/dosen/pembimbing-1/review-proposal/formReview-{id}', [ReviewerP1Controller::class, 'showFormReview'])->name('form-review-p1');
        Route::post('/dosen/pembimbing-1/review-proposal/formReview-{id}', [ReviewerP1Controller::class, 'createFormReview'])->name('create-form-review-p1');
        Route::get('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswaController::class, 'showDetailBimbingan']);
        Route::get('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/{x}/downloadqrcode', [FormBimbinganController::class, 'downloadqrcode']);
        Route::get('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/{x}/downloadbukti', [FormBimbinganController::class, 'downloadbuktibim']);
        Route::post('/dosen/pembimbing-1/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswaController::class, 'setPersetujuanBimbingan']);
        Route::resource('/dosen/pembimbing-1/form-bimbingan', BimbinganMahasiswaController::class);
        Route::resource('dosen/pembimbing-1/penilaian-seminar', PenilaianSeminarP1Controller::class);
        Route::post('/dosen/pembimbing-1/penilaian-seminar/{id}/edit', [PenilaianSeminarP1Controller::class, 'update']);
        Route::get('/dosen/pembimbing-1/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarP1Controller::class, 'downloadFile']);
        Route::get('/dosen/pembimbing-1/ajuan-pembimbing-1/setuju-{id}-{dosen}', [AjuanPembimbing1Controller::class, 'setuju']);
        Route::get('/dosen/pembimbing-1/ajuan-pembimbing-1/tolak-{id}-{dosen}', [AjuanPembimbing1Controller::class, 'tolak']);
        Route::get('/dosen/pembimbing-1/ajuan-pembimbing-1/reset-{id}-{dosen}', [AjuanPembimbing1Controller::class, 'reset']);
        Route::resource('/dosen/pembimbing-1/ajuan-pembimbing-1', AjuanPembimbing1Controller::class);
        Route::post('/dosen/pembimbing-1/ajuan-pembimbing-1/{id}-{ajuanBimbingan}', [AjuanPembimbing1Controller::class, 'update']);
        Route::get('dosen/pembimbing-1/ajuan-pembimbing/{ajuan_pembimbing_1}/downloadBerkasta2', [AjuanPembimbing1Controller::class, 'downloadBerkasta2'])->name('ajuan-pembimbing.downloadBerkasta2');
        Route::get('dosen/pembimbing-1/ajuan-pembimbing/{ajuan_pembimbing_1}/downloadKHS', [AjuanPembimbing1Controller::class, 'downloadKHS'])->name('ajuan-pembimbing.downloadKHS');


        // Pembimbing 2

        Route::get('/dosen/pembimbing-2', function () {
            return view('dosen.pembimbing.index', ['title' => 'Home', 'role' => 'Pembimbing 2']);
        });
        Route::get('/dosen/pembimbing-2/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswa2Controller::class, 'showDetailBimbingan']);
        Route::post('/dosen/pembimbing-2/form-bimbingan/{mahasiswa_id}/bimbingan-{x}', [BimbinganMahasiswa2Controller::class, 'setPersetujuanBimbingan']);
        Route::resource('/dosen/pembimbing-2/form-bimbingan', BimbinganMahasiswa2Controller::class);
        Route::resource('dosen/pembimbing-2/penilaian-seminar', PenilaianSeminarP2Controller::class);
        Route::post('/dosen/pembimbing-2/penilaian-seminar/{id}/edit', [PenilaianSeminarP2Controller::class, 'update']);
        Route::get('/dosen/pembimbing-2/penilaian-seminar/{id}/downloadFile', [PenilaianSeminarP2Controller::class, 'downloadFile']);
        Route::resource('/dosen/pembimbing-2/ajuan-pembimbing-2', AjuanPembimbing2Controller::class);
        Route::post('/dosen/pembimbing-2/ajuan-pembimbing-2/{id}-{ajuanBimbingan}', [AjuanPembimbing2Controller::class, 'update']);
        Route::get('dosen/pembimbing-2/ajuan-pembimbing/{ajuan_pembimbing_2}/downloadBerkasta2', [AjuanPembimbing2Controller::class, 'downloadBerkasta2'])->name('ajuan-pembimbing.downloadBerkasta2');
        Route::get('dosen/pembimbing-2/ajuan-pembimbing/{ajuan_pembimbing_2}/downloadKHS', [AjuanPembimbing2Controller::class, 'downloadKHS'])->name('ajuan-pembimbing.downloadKHS');
    });

    // SESI UT ==========================================================================================

    Route::group(['middleware' => 'role:TU'], function () {
        Route::get('/tu', function () {
            return view('tu.index', [
                'title' => 'Dashboard',
                'role' => 'Tata Usaha'
            ]);
        });
        Route::get('/tu/pendaftaran-administrasi/{id}/downloadTagihanUang', [TUPendaftaranAdministrasiController::class, 'downloadTagihanUang']);
        Route::get('/tu/pendaftaran-administrasi/{id}/downloadLunasPembayaran', [TUPendaftaranAdministrasiController::class, 'downloadLunasPembayaran']);
        Route::get('/tu/pendaftaran-administrasi/{id}/downloadBerkasta2', [TUPendaftaranAdministrasiController::class, 'downloadBerkasta2']);
        Route::get('/tu/pendaftaran-administrasi/{id}/downloadKhs', [TUPendaftaranAdministrasiController::class, 'downloadKhs']);
        Route::resource('/tu/pendaftaran-administrasi', TUPendaftaranAdministrasiController::class);
        Route::get('/tu/pendaftaran-administrasi/{id}/{kelolosan}', [TUPendaftaranAdministrasiController::class, 'keterangan']);
        Route::post('/tu/pendaftaran-administrasi/{id}', [TUPendaftaranAdministrasiController::class, 'edit_keterangan_kelolosan']);

        Route::resource('/tu/pendaftaran-seminar', TUPendaftaranSeminarController::class);
        Route::get('/tu/pendaftaran-seminar/{id}/downloadTagihanUang', [TUPendaftaranSeminarController::class, 'downloadTagihanUang']);
        Route::get('/tu/pendaftaran-seminar/{id}/downloadLunasPembayaran', [TUPendaftaranSeminarController::class, 'downloadLunasPembayaran']);
        Route::get('/tu/pendaftaran-seminar/{id}/downloadBerkasta2', [TUPendaftaranSeminarController::class, 'downloadBerkasta2']);
        Route::get('/tu/pendaftaran-seminar/{id}/downloadKhs', [TUPendaftaranSeminarController::class, 'downloadKhs']);
        Route::get('/tu/pendaftaran-seminar/{id}/{kelolosan}', [TUPendaftaranSeminarController::class, 'keterangan']);
        Route::post('/tu/pendaftaran-seminar/{id}', [TUPendaftaranSeminarController::class, 'edit_keterangan_kelolosan']);

        Route::resource('/tu/penilaian-seminar', TUPenilaianSeminarController::class);
        Route::post('/tu/penilaian-seminar/{id}/rilis', [TUPenilaianSeminarController::class, 'setRilis']);
    });

    // SESI ADMIN =======================================================================================

    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/admin', function () {
            return view('admin.index', [
                'title' => 'Dashboard Admin',
                'role' => 'Admin'
            ]);
        });
        Route::post('admin/kelola-user/delete', [KelolaUserController::class, 'deleteUsers']);
        Route::get('admin/kelola-user/delete-{id}', [KelolaUserController::class, 'destroy']);
        Route::resource('admin/kelola-user', KelolaUserController::class);
    });
});