<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bali',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bangka Belitung',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Banten',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Bengkulu',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'DI Yogyakarta',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'DKI Jakarta',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Gorontalo',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jambi',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Jawa Barat',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Jawa Tengah',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Jawa Timur',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Kalimantan Barat',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Kalimantan Selatan',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Kalimantan Tengah',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Kalimantan Timur',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Kalimantan Utara',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Kepulauan Riau',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Lampung',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Maluku',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Maluku Utara',
            ),
            20 => 
            array (
                'id' => 21,
            'name' => 'Nanggroe Aceh Darussalam (NAD)',
            ),
            21 => 
            array (
                'id' => 22,
            'name' => 'Nusa Tenggara Barat (NTB)',
            ),
            22 => 
            array (
                'id' => 23,
            'name' => 'Nusa Tenggara Timur (NTT)',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Papua',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Papua Barat',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Riau',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Sulawesi Barat',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Sulawesi Selatan',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Sulawesi Tengah',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Sulawesi Tenggara',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Sulawesi Utara',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Sumatera Barat',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Sumatera Selatan',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Sumatera Utara',
            ),
        ));
        
        
    }
}