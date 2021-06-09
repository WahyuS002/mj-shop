<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            ['name' => 'Belum Dibayar'],
            ['name' => 'Sedang Diproses'],
            ['name' => 'Dalam Pengiriman'],
            ['name' => 'Selesai'],
            ['name' => 'Dibatalkan']
        ]);
    }
}
