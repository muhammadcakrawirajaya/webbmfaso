<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karyawan;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inisiasi
        $roles = ['admin', 'team leader'];
        $divisions = ['optima', 'aso', 'psb'];
        $faker = Faker::create('id_ID');
        $users = [];
        $karyawanData = [];
        $usedNumbers = [];
        $settings = [];

        // Super Admin seed
        $users[] = [
            'username' => 'Super Admin',
            'password' => Hash::make('SuperStars'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Random Karyawan seed
        for ($i = 1; $i <= 20; $i++) {
            $username = str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
            $users[] = [
                'username' => $username,
                'password' => Hash::make('12345678'),
                'division' => $divisions[array_rand($divisions)],
                'role' => $roles[array_rand($roles)],
                'remember_token' => Str::random(60)
            ];
        }

        // Ms Rian seed
        $users[] = [
            'username' => '960198',
            'password' => Hash::make('Bismillaah66'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Ms Mukkid seed
        $users[] = [
            'username' => '40850060',
            'password' => Hash::make('Mumu_85okok'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Mb Tiwi seed
        $users[] = [
            'username' => '40900111',
            'password' => Hash::make('Tiw170990'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Ms Soffyan seed
        $users[] = [
            'username' => '40820152',
            'password' => Hash::make('Faulin4ar'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Cakra seed
        $users[] = [
            'username' => 'E41211187',
            'password' => Hash::make('12345678'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Ega seed
        $users[] = [
            'username' => 'E41211200',
            'password' => Hash::make('12345678'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Adit seed
        $users[] = [
            'username' => 'E41211220',
            'password' => Hash::make('12345678'),
            'division' => 'aso',
            'role' => 'admin',
            'remember_token' => Str::random(60)
        ];

        // Query
        User::insert($users);

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

        for ($i = 1; $i <= 28; $i++) {
            $settings[] = [
                'id_user' => $i,
                'bulan' => 1,
                'so' => 1,
                'sto' => 1,
                'telda' => 1,
                'segmen' => 1,
                'uic' => 1,
                'feedback' => 1,
                'status' => 1,
                'search' => 1,
                'export' => 1,
            ];
        }

        // Query
        Setting::insert($settings);
    }
}
