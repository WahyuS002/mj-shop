<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['siteName' => 'MJ Shop'],
            ['siteDescription' => 'Lorem ipsum is dolor sit amet'],
            ['siteLogo' => '{{ SITE_LOGO }}'],
            ['siteIcon' => '{{ SITE_ICON }}'],
            ['contactEmail' => 'mj.shop@gmail.com'],
            ['contactPhoneNumber' => '082281666584'],
            ['storeAddress' => 'Jl. Wr. Supratman, Kel. Kandang Limun 38122 Kota Bengkulu']
        ];

        $settings = [];
        foreach ($data as $key => $value) {
            $item = ['key' => array_key_first($value), 'value' => array_values($value)[0]];
            array_push($settings, $item);
        }

        DB::table('settings')->insertOrIgnore($settings);
    }
}
