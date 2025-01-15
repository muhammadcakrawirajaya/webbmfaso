<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create('id_ID');

        // $jenis_order = ['FALLOUT HI','FALLOUT OLD','UNSC'];

        // for ($i = 1; $i <= 50; $i++) {
        //     $order[] = [
        //         'jenis_order' => $jenis_order[array_rand($jenis_order)],
        //         'order_date' => $faker->dateTimeBetween('-1 year', 'now'),
        //         'order_time' => $faker->dateTimeBetween('-1 year', 'now'),
        //         'latt' => "-7.".rand(40000, 69999),
        //         'long' => "112.".rand(50000, 89999)
        //     ];
        // }

        // Order::insert($order);
    }
}
