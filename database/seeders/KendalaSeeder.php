<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // UIC kendala seed
        $kendala = [
            ['uic' => 'TIANG'],
            ['uic' => 'MTC'],
            ['uic' => 'PT2'],
            ['uic' => 'PT3B'],
            ['uic' => 'PT3'],
            ['uic' => 'PIT'],
        ];

        // Query uic kendala
        DB::table('uic_kendala')->insert($kendala);

        // Status kendala seed
        $status_kendala = [
            ['status_kendala' => 'RETURN PT1'],
            ['status_kendala' => 'BUTUH IZIN (BGES)'],
            ['status_kendala' => 'NEED FU CUST (BGES)'],
            ['status_kendala' => 'SALDO ONDESK'],
            ['status_kendala' => 'SALDO AANWIJZING'],
            ['status_kendala' => 'WAITING ED APPROVAL'],
            ['status_kendala' => 'SALDO LAPANGAN'],
            ['status_kendala' => 'SIAP PT1'],
            ['status_kendala' => 'PS'],
            ['status_kendala' => 'DROP'],
        ];

        // Query status kendala
        DB::table('status_kendala')->insert($status_kendala);

        // Feedback pic seed
        $jenis_kendala = [
            // TIANG
            ['id_uic' => 1, 'feedback_pic' => 'NEED JUMLAH TIANG', 'id_status_kendala' => '1'],
            ['id_uic' => 1, 'feedback_pic' => 'BUTUH IZIN', 'id_status_kendala' => '2'],
            ['id_uic' => 1, 'feedback_pic' => 'IZIN OK, SURVEY MITRA', 'id_status_kendala' => '7'],
            ['id_uic' => 1, 'feedback_pic' => 'PROGRESS INSTALL TIANG', 'id_status_kendala' => '7'],
            ['id_uic' => 1, 'feedback_pic' => 'SOLUSI DONE, NEED FU CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 1, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 1, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 1, 'feedback_pic' => 'BATAL PASANG/IZIN NOK', 'id_status_kendala' => '10'],
            ['id_uic' => 1, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
            // MTC
            ['id_uic' => 2, 'feedback_pic' => 'NEED EVIDENCE', 'id_status_kendala' => '1'],
            ['id_uic' => 2, 'feedback_pic' => 'BUTUH IZIN', 'id_status_kendala' => '2'],
            ['id_uic' => 2, 'feedback_pic' => 'ORDER REPAIR', 'id_status_kendala' => '7'],
            ['id_uic' => 2, 'feedback_pic' => 'WAITING ED APPROVAL', 'id_status_kendala' => '6'],
            ['id_uic' => 2, 'feedback_pic' => 'OGP REPAIR', 'id_status_kendala' => '7'],
            ['id_uic' => 2, 'feedback_pic' => 'SOLUSI DONE, NEED FU CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 2, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 2, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 2, 'feedback_pic' => 'BATAL PASANG', 'id_status_kendala' => '10'],
            ['id_uic' => 2, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
            //PT2
            ['id_uic' => 3, 'feedback_pic' => 'NEED TAGGING PELANGGAN + VALINS ID', 'id_status_kendala' => '1'],
            ['id_uic' => 3, 'feedback_pic' => 'BUTUH IZIN', 'id_status_kendala' => '2'],
            ['id_uic' => 3, 'feedback_pic' => 'CEK MANCORE', 'id_status_kendala' => '4'],
            ['id_uic' => 3, 'feedback_pic' => 'SURVEY MITRA', 'id_status_kendala' => '5'],
            ['id_uic' => 3, 'feedback_pic' => 'REDESIGN', 'id_status_kendala' => '4'],
            ['id_uic' => 3, 'feedback_pic' => 'NEED FU CUST + INPUT GD CB', 'id_status_kendala' => '3'],
            ['id_uic' => 3, 'feedback_pic' => 'WAITING ED APPROVAL', 'id_status_kendala' => '6'],
            ['id_uic' => 3, 'feedback_pic' => 'PROGRESS DEPLOY', 'id_status_kendala' => '7'],
            ['id_uic' => 3, 'feedback_pic' => 'ODP READY/ ODP BELUM GO LIVE', 'id_status_kendala' => '4'],
            ['id_uic' => 3, 'feedback_pic' => 'SOLUSI DONE, NEED FU CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 3, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 3, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 3, 'feedback_pic' => 'BATAL PASANG/DROP DESAIN', 'id_status_kendala' => '10'],
            ['id_uic' => 3, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
            //PT3B
            ['id_uic' => 4, 'feedback_pic' => 'NEED TAGGING PELANGGAN', 'id_status_kendala' => '1'],
            ['id_uic' => 4, 'feedback_pic' => 'BUTUH IZIN', 'id_status_kendala' => '2'],
            ['id_uic' => 4, 'feedback_pic' => 'CEK MANCORE', 'id_status_kendala' => '4'],
            ['id_uic' => 4, 'feedback_pic' => 'SURVEY MITRA', 'id_status_kendala' => '5'],
            ['id_uic' => 4, 'feedback_pic' => 'REDESIGN', 'id_status_kendala' => '4'],
            ['id_uic' => 4, 'feedback_pic' => 'NEED FU CUST + INPUT GD CB', 'id_status_kendala' => '3'],
            ['id_uic' => 4, 'feedback_pic' => 'WAITING ED APPROVAL', 'id_status_kendala' => '6'],
            ['id_uic' => 4, 'feedback_pic' => 'PROGRESS DEPLOY', 'id_status_kendala' => '7'],
            ['id_uic' => 4, 'feedback_pic' => 'ODP READY/ ODP BELUM GO LIVE', 'id_status_kendala' => '4'],
            ['id_uic' => 4, 'feedback_pic' => 'SOLUSI DONE, NEED FU CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 4, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 4, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 4, 'feedback_pic' => 'BATAL PASANG/DROP DESAIN', 'id_status_kendala' => '10'],
            ['id_uic' => 4, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
            //PT3
            ['id_uic' => 5, 'feedback_pic' => 'NEED TAGGING PELANGGAN', 'id_status_kendala' => '1'],
            ['id_uic' => 5, 'feedback_pic' => 'BUTUH IZIN', 'id_status_kendala' => '2'],
            ['id_uic' => 5, 'feedback_pic' => 'CEK MANCORE', 'id_status_kendala' => '4'],
            ['id_uic' => 5, 'feedback_pic' => 'SURVEY MITRA', 'id_status_kendala' => '5'],
            ['id_uic' => 5, 'feedback_pic' => 'REDESIGN', 'id_status_kendala' => '4'],
            ['id_uic' => 5, 'feedback_pic' => 'NEED FU CUST + INPUT GD CB', 'id_status_kendala' => '3'],
            ['id_uic' => 5, 'feedback_pic' => 'WAITING ED APPROVAL', 'id_status_kendala' => '6'],
            ['id_uic' => 5, 'feedback_pic' => 'PROGRESS DEPLOY', 'id_status_kendala' => '7'],
            ['id_uic' => 5, 'feedback_pic' => 'ODP READY/ ODP BELUM GO LIVE', 'id_status_kendala' => '4'],
            ['id_uic' => 5, 'feedback_pic' => 'SOLUSI DONE, NEED FU CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 5, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 5, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 5, 'feedback_pic' => 'BATAL PASANG/DROP DESAIN', 'id_status_kendala' => '10'],
            ['id_uic' => 5, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
            //PIT
            ['id_uic' => 6, 'feedback_pic' => 'NEED EVIDENCE', 'id_status_kendala' => '1'],
            ['id_uic' => 6, 'feedback_pic' => 'BUTUH IZIN/ NEED FU DEVELOPER', 'id_status_kendala' => '2'],
            ['id_uic' => 6, 'feedback_pic' => 'RAB NOK, NEED TAMBAH CUST', 'id_status_kendala' => '3'],
            ['id_uic' => 6, 'feedback_pic' => 'ORDER REPAIR', 'id_status_kendala' => '7'],
            ['id_uic' => 6, 'feedback_pic' => 'OGP REPAIR', 'id_status_kendala' => '7'],
            ['id_uic' => 6, 'feedback_pic' => 'SOLUSI DONE, NEED FU FMC', 'id_status_kendala' => '3'],
            ['id_uic' => 6, 'feedback_pic' => 'OGP PT1', 'id_status_kendala' => '8'],
            ['id_uic' => 6, 'feedback_pic' => 'CLOSED PS', 'id_status_kendala' => '9'],
            ['id_uic' => 6, 'feedback_pic' => 'BATAL PASANG/DROP', 'id_status_kendala' => '10'],
            ['id_uic' => 6, 'feedback_pic' => 'DUPLICATED DATA', 'id_status_kendala' => '10'],
        ];

        // Query feedback pic
        DB::table('feedback_pic')->insert($jenis_kendala);
    }
}
