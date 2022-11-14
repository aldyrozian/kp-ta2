<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jabfung;
use App\Models\Mahasiswa;
use App\Models\Reviewer1;
use App\Models\Reviewer2;
use App\Models\Koordinator;
use App\Models\Pembimbing1;
use App\Models\Pembimbing2;
use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Mahasiswa::factory(5)->create();
        // Pendaftaran::factory(5)->create();
        // User::factory(50)->create();

        Role::create([
            'name' => 'Mahasiswa',
            'redirect_to' => '/mahasiswa',
        ]);
        Role::create([
            'name' => 'Koordinator',
            'redirect_to' => '/koordinator',
        ]);
        Role::create([
            'name' => 'Dosen',
            'redirect_to' => '/dosen',
        ]);
        Role::create([
            'name' => 'Admin',
            'redirect_to' => '/admin',
        ]);
        Role::create([
            'name' => 'TU',
            'redirect_to' => '/tu',
        ]);

        //pembimbing
        \App\Models\Dosen::factory()->create([
            'id' => '1',
            'user_id' => '1',
            'jabfung_id' => '3',
            'nid' => '412175878',
            'name' => 'Agus Komarudin, S.Kom., M.T.',
            'kode' => 'AGK',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '2',
            'user_id' => '2',
            'jabfung_id' => '3',
            'nid' => '412180078',
            'name' =>  'Asep Id Hadiana, S.Si., M.Kom.',
            'kode' => 'AIH',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '3',
            'user_id' => '3',
            'jabfung_id' => '3',
            'nid' => '412116459',
            'name' => 'Dra. Ade Kania Ningsih, M.Stat.',
            'kode' => 'ADK',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '4',
            'user_id' => '4',
            'jabfung_id' => '4',
            'nid' => '412111056',
            'name' => 'Dr. Eddie Krishna Putra, Drs., M.T.',
            'kode' => 'EKP',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '5',
            'user_id' => '5',
            'jabfung_id' => '4',
            'nid' => '412127670',
            'name' => 'Dr. Esmeralda C. Djamal, S.T., M.T.',
            'kode' => 'ECD',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '6',
            'user_id' => '6',
            'jabfung_id' => '1',
            'nid' => '412105388',
            'name' => 'Edvin Ramadhan, S.Kom., M.T.',
            'kode' => 'ERN',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '7',
            'user_id' => '7',
            'jabfung_id' => '1',
            'nid' => '412100992',
            'name' => 'Fatan Kasyidi, S.Kom., M.T.',
            'kode' => 'FKI',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '8',
            'user_id' => '8',
            'jabfung_id' => '2',
            'nid' => '412185888',
            'name' => 'Fajri Rakhmat Umbara, S.T., M.T.',
            'kode' => 'FRU',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '9',
            'user_id' => '9',
            'jabfung_id' => '2',
            'nid' => '412167079',
            'name' => 'Faiza Renaldi, S.T., M.Sc.',
            'kode' => 'FZR',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '10',
            'user_id' => '10',
            'jabfung_id' => '3',
            'nid' => '412157175',
            'name' => 'Gunawan Abdillah, S.Si., M.Cs.',
            'kode' => 'GNA',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '11',
            'user_id' => '11',
            'jabfung_id' => '2',
            'nid' => '412198688',
            'name' => 'Herdi Ashaury, S.Kom., M.T.',
            'kode' => 'HAY',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '12',
            'user_id' => '12',
            'jabfung_id' => '1',
            'nid' => '412196490',
            'name' => 'Irma Santikarama, S.Kom., M.T.',
            'kode' => 'ISR',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '13',
            'user_id' => '13',
            'jabfung_id' => '1',
            'nid' => '412100879',
            'name' => 'Melina, S.Si., M.Si.',
            'kode' => 'MLA',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '14',
            'user_id' => '14',
            'jabfung_id' => '2',
            'nid' => '412190585',
            'name' => 'Puspita Nurul Sabrina, S.Kom., M.T.',
            'kode' => 'PNS',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '15',
            'user_id' => '15',
            'jabfung_id' => '2',
            'nid' => '412182990',
            'name' => 'Ridwan Ilyas, S.Kom., M.T.',
            'kode' => 'RDI',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '16',
            'user_id' => '16',
            'jabfung_id' => '2',
            'nid' => '412174182',
            'name' => 'Rezki Yuniarti, S.Si., M.T.',
            'kode' => 'RZK',
            'kbk' => 'AIG',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '17',
            'user_id' => '17',
            'jabfung_id' => '3',
            'nid' => '412103969',
            'name' => 'Sigit Anggoro, S.T., M.T.',
            'kode' => 'SGO',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '18',
            'user_id' => '18',
            'jabfung_id' => '3',
            'nid' => '412176273',
            'name' => 'Wina Witanti, S.T., M.T.',
            'kode' => 'WNI',
            'kbk' => 'DSE',

        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '19',
            'user_id' => '19',
            'jabfung_id' => '3',
            'nid' => '412166969',
            'name' => 'Tacbir Hendro Pudjiantoro, S.Si., M.T.',
            'kode' => 'THP',
            'kbk' => 'DSE',


        ]);
        \App\Models\Dosen::factory()->create([
            'id' => '20',
            'user_id' => '20',
            'jabfung_id' => '3',
            'nid' => '412166863',
            'name' => 'Yulison Herry Christanto, S.T., M.T.',
            'kode' => 'YHC',
            'kbk' => 'DSE',

        ]);
        //jabfung
        \App\Models\Jabfung::factory()->create([
            'id' => '1',
            'name' => 'non jabfung',
        ]);
        \App\Models\Jabfung::factory()->create([
            'id' => '2',
            'name' => 'Asisten Ahli',
        ]);
        \App\Models\Jabfung::factory()->create([
            'id' => '3',
            'name' => 'Lektor',
        ]);
        \App\Models\Jabfung::factory()->create([
            'id' => '4',
            'name' => 'Lektor Kepala',
        ]);
        \App\Models\Jabfung::factory()->create([
            'id' => '5',
            'name' => 'Guru Besar',
        ]);
        //pembimbing 1
        \App\Models\Pembimbing1::factory()->create([
            'id' => '1',
            'dosen_id' => '1',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '2',
            'dosen_id' => '2',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '3',
            'dosen_id' => '3',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '4',
            'dosen_id' => '4',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '5',
            'dosen_id' => '5',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '6',
            'dosen_id' => '6',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '7',
            'dosen_id' => '7',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '8',
            'dosen_id' => '8',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '9',
            'dosen_id' => '9',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '10',
            'dosen_id' => '10',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '11',
            'dosen_id' => '11',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '12',
            'dosen_id' => '12',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '13',
            'dosen_id' => '13',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '14',
            'dosen_id' => '14',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '15',
            'dosen_id' => '15',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '16',
            'dosen_id' => '16',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '17',
            'dosen_id' => '17',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '18',
            'dosen_id' => '18',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '19',
            'dosen_id' => '19',
        ]);
        \App\Models\Pembimbing1::factory()->create([
            'id' => '20',
            'dosen_id' => '20',
        ]);

        //pembimbing 2
        \App\Models\Pembimbing2::factory()->create([
            'id' => '1',
            'dosen_id' => '1',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '2',
            'dosen_id' => '2',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '3',
            'dosen_id' => '3',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '4',
            'dosen_id' => '4',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '5',
            'dosen_id' => '5',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '6',
            'dosen_id' => '6',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '7',
            'dosen_id' => '7',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '8',
            'dosen_id' => '8',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '9',
            'dosen_id' => '9',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '10',
            'dosen_id' => '10',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '11',
            'dosen_id' => '11',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '12',
            'dosen_id' => '12',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '13',
            'dosen_id' => '13',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '14',
            'dosen_id' => '14',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '15',
            'dosen_id' => '15',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '16',
            'dosen_id' => '16',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '17',
            'dosen_id' => '17',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '18',
            'dosen_id' => '18',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '19',
            'dosen_id' => '19',
        ]);
        \App\Models\Pembimbing2::factory()->create([
            'id' => '20',
            'dosen_id' => '20',
        ]);
    }
}