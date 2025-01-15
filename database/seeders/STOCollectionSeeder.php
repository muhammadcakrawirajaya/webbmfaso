<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class STOCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // So seed
        $so = [
            ['nama_so' => 'SDA1','nama_telda' => 'SDA'],
            ['nama_so' => 'SDA2','nama_telda' => 'SDA'],
            ['nama_so' => 'PDA','nama_telda' => 'PSN'],
            ['nama_so' => 'MJK','nama_telda' => 'MJK'],
            ['nama_so' => 'JBG','nama_telda' => 'JBG'],
        ];

        // Query so
        DB::table('so')->insert($so);

        // Sto seed
        $sto = [
            ['nama_sto' => 'SDA', 'id_so' => 1, 'nama_tl' => 'AAN'],
            ['nama_sto' => 'SDN', 'id_so' => 1, 'nama_tl' => 'FAIZAL'],
            ['nama_sto' => 'TUN', 'id_so' => 1, 'nama_tl' => 'FAIZAL'],
            ['nama_sto' => 'GDA', 'id_so' => 2, 'nama_tl' => 'NEOKY'],
            ['nama_sto' => 'SPJ', 'id_so' => 2, 'nama_tl' => 'WEDA'],
            ['nama_sto' => 'KRN', 'id_so' => 2, 'nama_tl' => 'WEDA'],
            ['nama_sto' => 'PDA', 'id_so' => 3, 'nama_tl' => 'HUDA'],
            ['nama_sto' => 'PWS', 'id_so' => 3, 'nama_tl' => 'HUDA'],
            ['nama_sto' => 'PGE', 'id_so' => 3, 'nama_tl' => 'HUDA'],
            ['nama_sto' => 'BEJ', 'id_so' => 3, 'nama_tl' => 'HUDA'],
            ['nama_sto' => 'GEM', 'id_so' => 3, 'nama_tl' => 'HUDA'],
            ['nama_sto' => 'MRT', 'id_so' => 4, 'nama_tl' => 'ALFAN'],
            ['nama_sto' => 'MIP', 'id_so' => 4, 'nama_tl' => 'ALFAN'],
            ['nama_sto' => 'DLA', 'id_so' => 4, 'nama_tl' => 'ALFAN'],
            ['nama_sto' => 'PCT', 'id_so' => 4, 'nama_tl' => 'ERNANDO'],
            ['nama_sto' => 'NGI', 'id_so' => 4, 'nama_tl' => 'ERNANDO'],
            ['nama_sto' => 'MJS', 'id_so' => 4, 'nama_tl' => 'ERNANDO'],
            ['nama_sto' => 'JOM', 'id_so' => 5, 'nama_tl' => 'ADAM'],
            ['nama_sto' => 'MOJ', 'id_so' => 5, 'nama_tl' => 'ADAM'],
            ['nama_sto' => 'NRJ', 'id_so' => 5, 'nama_tl' => 'MIFTA'],
            ['nama_sto' => 'POS', 'id_so' => 5, 'nama_tl' => 'MIFTA'],
        ];

        // Query sto
        DB::table('sto')->insert($sto);
    }
}
