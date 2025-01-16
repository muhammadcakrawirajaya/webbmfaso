<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $divisions = ['optima','aso','psb'];
        $users = [];

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
    }
}
