<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insert([
            ['id' => 1, 'name' => 'Berhasil'],
            ['id' => 2, 'name' => 'Menunggu Konfirmasi'],
            ['id' => 3, 'name' => 'Gagal'],
        ]);
    }
}
