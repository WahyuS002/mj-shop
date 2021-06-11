<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            ['bank_name' => 'Bank Rakyat Indonesia (BRI)', 'owner_name' => 'Martin Mulyo Syahidin', 'account_number' => '123-456-789-0'],
            ['bank_name' => 'Bank Negara Indonesia (BNI)', 'owner_name' => 'Jessy Mandasari', 'account_number' => '123-45-6'],
        ]);
    }
}
