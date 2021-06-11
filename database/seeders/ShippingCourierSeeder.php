<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingCourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_couriers')->insert([
            ['slug' => 'jne', 'name' => 'Jalur Nugraha Ekakurir (JNE)'],
            ['slug' => 'pos', 'name' => 'POS Indonesia (POS)'],
            ['slug' => 'tiki', 'name' => 'Citra Van Titipan Kilat (TIKI)'],
        ]);
    }
}
