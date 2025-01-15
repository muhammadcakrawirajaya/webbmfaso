<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KaryawanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inisiasi
        $faker = Faker::create('id_ID');
        $karyawanData = [];
        $usedNumbers = [];

        // Super Admin seed
        $karyawanData[] = [
            'id_user' => 1,
            'nama' => 'Super Create Admin',
            'telegram' => '@SuperAdmin',
            'foto' => ''
        ];

        // Random Karywan seed
        for ($i = 2; $i <= 21; $i++) {
            do {
                $randomNumber = rand(1, 20);
            } while (in_array($randomNumber, $usedNumbers));

            $usedNumbers[] = $randomNumber;

            $karyawanData[] = [
                'id_user' => $i,
                'nama' => $faker->name,
                'telegram' => '@tele.gram' . $i,
                'foto' => 'karyawan/' . $randomNumber . '.png'
            ];
        }

        // Ms Rian seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Rian Gilang',
            'telegram' => '@riangilang',
            'foto' => ''
        ];

        // Ms Mukkid seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Rochmad Mukit',
            'telegram' => '@mu_kit',
            'foto' => ''
        ];

        // Mb Tiwi seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Dwiana Arum Pratiwi',
            'telegram' => '@dwianaarumpratiwi',
            'foto' => ''
        ];

        // Ms Soffyan seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Sofyan',
            'telegram' => '@msofyanh_WIBRO_SDA',
            'foto' => ''
        ];

        // Cakra seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Muhammad Cakra Wirajaya',
            'telegram' => '@wirajayacakra',
            'foto' => ''
        ];

        // Ega seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Ega Syahrul Ramadhanto',
            'telegram' => '@Ega_syahrul',
            'foto' => 'karyawan/Am2ygSm8DaRgUIzTP6xDj2SCuESxc3OA0Rw2nKby.png'
        ];

        // Adit seed
        $karyawanData[] = [
            'id_user' => $i++,
            'nama' => 'Yunan Aditya Primawardana',
            'telegram' => '@Joynnnnn',
            'foto' => ''
        ];

        // Query
        Karyawan::insert($karyawanData);
    }
}
