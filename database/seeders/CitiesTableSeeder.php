<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Barat',
                'postal_code' => '23681',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Barat Daya',
                'postal_code' => '23764',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Besar',
                'postal_code' => '23951',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Jaya',
                'postal_code' => '23654',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Selatan',
                'postal_code' => '23719',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Singkil',
                'postal_code' => '24785',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tamiang',
                'postal_code' => '24476',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tengah',
                'postal_code' => '24511',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tenggara',
                'postal_code' => '24611',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Timur',
                'postal_code' => '24454',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Aceh Utara',
                'postal_code' => '24382',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Agam',
                'postal_code' => '26411',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Alor',
                'postal_code' => '85811',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => 19,
                'type' => 'Kota',
                'name' => 'Ambon',
                'postal_code' => '97222',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Asahan',
                'postal_code' => '21214',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Asmat',
                'postal_code' => '99777',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Badung',
                'postal_code' => '80351',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Balangan',
                'postal_code' => '71611',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => 15,
                'type' => 'Kota',
                'name' => 'Balikpapan',
                'postal_code' => '76111',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => 21,
                'type' => 'Kota',
                'name' => 'Banda Aceh',
                'postal_code' => '23238',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => 18,
                'type' => 'Kota',
                'name' => 'Bandar Lampung',
                'postal_code' => '35139',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Bandung',
                'postal_code' => '40311',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Bandung',
                'postal_code' => '40111',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Bandung Barat',
                'postal_code' => '40721',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Banggai',
                'postal_code' => '94711',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Banggai Kepulauan',
                'postal_code' => '94881',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Bangka',
                'postal_code' => '33212',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Bangka Barat',
                'postal_code' => '33315',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Bangka Selatan',
                'postal_code' => '33719',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Bangka Tengah',
                'postal_code' => '33613',
            ),
            30 => 
            array (
                'id' => 31,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Bangkalan',
                'postal_code' => '69118',
            ),
            31 => 
            array (
                'id' => 32,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Bangli',
                'postal_code' => '80619',
            ),
            32 => 
            array (
                'id' => 33,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Banjar',
                'postal_code' => '70619',
            ),
            33 => 
            array (
                'id' => 34,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Banjar',
                'postal_code' => '46311',
            ),
            34 => 
            array (
                'id' => 35,
                'province_id' => 13,
                'type' => 'Kota',
                'name' => 'Banjarbaru',
                'postal_code' => '70712',
            ),
            35 => 
            array (
                'id' => 36,
                'province_id' => 13,
                'type' => 'Kota',
                'name' => 'Banjarmasin',
                'postal_code' => '70117',
            ),
            36 => 
            array (
                'id' => 37,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Banjarnegara',
                'postal_code' => '53419',
            ),
            37 => 
            array (
                'id' => 38,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Bantaeng',
                'postal_code' => '92411',
            ),
            38 => 
            array (
                'id' => 39,
                'province_id' => 5,
                'type' => 'Kabupaten',
                'name' => 'Bantul',
                'postal_code' => '55715',
            ),
            39 => 
            array (
                'id' => 40,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Banyuasin',
                'postal_code' => '30911',
            ),
            40 => 
            array (
                'id' => 41,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Banyumas',
                'postal_code' => '53114',
            ),
            41 => 
            array (
                'id' => 42,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Banyuwangi',
                'postal_code' => '68416',
            ),
            42 => 
            array (
                'id' => 43,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Barito Kuala',
                'postal_code' => '70511',
            ),
            43 => 
            array (
                'id' => 44,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Barito Selatan',
                'postal_code' => '73711',
            ),
            44 => 
            array (
                'id' => 45,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Barito Timur',
                'postal_code' => '73671',
            ),
            45 => 
            array (
                'id' => 46,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Barito Utara',
                'postal_code' => '73881',
            ),
            46 => 
            array (
                'id' => 47,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Barru',
                'postal_code' => '90719',
            ),
            47 => 
            array (
                'id' => 48,
                'province_id' => 17,
                'type' => 'Kota',
                'name' => 'Batam',
                'postal_code' => '29413',
            ),
            48 => 
            array (
                'id' => 49,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Batang',
                'postal_code' => '51211',
            ),
            49 => 
            array (
                'id' => 50,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Batang Hari',
                'postal_code' => '36613',
            ),
            50 => 
            array (
                'id' => 51,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Batu',
                'postal_code' => '65311',
            ),
            51 => 
            array (
                'id' => 52,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Batu Bara',
                'postal_code' => '21655',
            ),
            52 => 
            array (
                'id' => 53,
                'province_id' => 30,
                'type' => 'Kota',
                'name' => 'Bau-Bau',
                'postal_code' => '93719',
            ),
            53 => 
            array (
                'id' => 54,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Bekasi',
                'postal_code' => '17837',
            ),
            54 => 
            array (
                'id' => 55,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Bekasi',
                'postal_code' => '17121',
            ),
            55 => 
            array (
                'id' => 56,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Belitung',
                'postal_code' => '33419',
            ),
            56 => 
            array (
                'id' => 57,
                'province_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Belitung Timur',
                'postal_code' => '33519',
            ),
            57 => 
            array (
                'id' => 58,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Belu',
                'postal_code' => '85711',
            ),
            58 => 
            array (
                'id' => 59,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Bener Meriah',
                'postal_code' => '24581',
            ),
            59 => 
            array (
                'id' => 60,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Bengkalis',
                'postal_code' => '28719',
            ),
            60 => 
            array (
                'id' => 61,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Bengkayang',
                'postal_code' => '79213',
            ),
            61 => 
            array (
                'id' => 62,
                'province_id' => 4,
                'type' => 'Kota',
                'name' => 'Bengkulu',
                'postal_code' => '38229',
            ),
            62 => 
            array (
                'id' => 63,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Selatan',
                'postal_code' => '38519',
            ),
            63 => 
            array (
                'id' => 64,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Tengah',
                'postal_code' => '38319',
            ),
            64 => 
            array (
                'id' => 65,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Utara',
                'postal_code' => '38619',
            ),
            65 => 
            array (
                'id' => 66,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Berau',
                'postal_code' => '77311',
            ),
            66 => 
            array (
                'id' => 67,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Biak Numfor',
                'postal_code' => '98119',
            ),
            67 => 
            array (
                'id' => 68,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Bima',
                'postal_code' => '84171',
            ),
            68 => 
            array (
                'id' => 69,
                'province_id' => 22,
                'type' => 'Kota',
                'name' => 'Bima',
                'postal_code' => '84139',
            ),
            69 => 
            array (
                'id' => 70,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Binjai',
                'postal_code' => '20712',
            ),
            70 => 
            array (
                'id' => 71,
                'province_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Bintan',
                'postal_code' => '29135',
            ),
            71 => 
            array (
                'id' => 72,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Bireuen',
                'postal_code' => '24219',
            ),
            72 => 
            array (
                'id' => 73,
                'province_id' => 31,
                'type' => 'Kota',
                'name' => 'Bitung',
                'postal_code' => '95512',
            ),
            73 => 
            array (
                'id' => 74,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Blitar',
                'postal_code' => '66171',
            ),
            74 => 
            array (
                'id' => 75,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Blitar',
                'postal_code' => '66124',
            ),
            75 => 
            array (
                'id' => 76,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Blora',
                'postal_code' => '58219',
            ),
            76 => 
            array (
                'id' => 77,
                'province_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Boalemo',
                'postal_code' => '96319',
            ),
            77 => 
            array (
                'id' => 78,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Bogor',
                'postal_code' => '16911',
            ),
            78 => 
            array (
                'id' => 79,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Bogor',
                'postal_code' => '16119',
            ),
            79 => 
            array (
                'id' => 80,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Bojonegoro',
                'postal_code' => '62119',
            ),
            80 => 
            array (
                'id' => 81,
                'province_id' => 31,
                'type' => 'Kabupaten',
            'name' => 'Bolaang Mongondow (Bolmong)',
                'postal_code' => '95755',
            ),
            81 => 
            array (
                'id' => 82,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Selatan',
                'postal_code' => '95774',
            ),
            82 => 
            array (
                'id' => 83,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Timur',
                'postal_code' => '95783',
            ),
            83 => 
            array (
                'id' => 84,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Utara',
                'postal_code' => '95765',
            ),
            84 => 
            array (
                'id' => 85,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Bombana',
                'postal_code' => '93771',
            ),
            85 => 
            array (
                'id' => 86,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Bondowoso',
                'postal_code' => '68219',
            ),
            86 => 
            array (
                'id' => 87,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Bone',
                'postal_code' => '92713',
            ),
            87 => 
            array (
                'id' => 88,
                'province_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Bone Bolango',
                'postal_code' => '96511',
            ),
            88 => 
            array (
                'id' => 89,
                'province_id' => 15,
                'type' => 'Kota',
                'name' => 'Bontang',
                'postal_code' => '75313',
            ),
            89 => 
            array (
                'id' => 90,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Boven Digoel',
                'postal_code' => '99662',
            ),
            90 => 
            array (
                'id' => 91,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Boyolali',
                'postal_code' => '57312',
            ),
            91 => 
            array (
                'id' => 92,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Brebes',
                'postal_code' => '52212',
            ),
            92 => 
            array (
                'id' => 93,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Bukittinggi',
                'postal_code' => '26115',
            ),
            93 => 
            array (
                'id' => 94,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Buleleng',
                'postal_code' => '81111',
            ),
            94 => 
            array (
                'id' => 95,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Bulukumba',
                'postal_code' => '92511',
            ),
            95 => 
            array (
                'id' => 96,
                'province_id' => 16,
                'type' => 'Kabupaten',
            'name' => 'Bulungan (Bulongan)',
                'postal_code' => '77211',
            ),
            96 => 
            array (
                'id' => 97,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Bungo',
                'postal_code' => '37216',
            ),
            97 => 
            array (
                'id' => 98,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Buol',
                'postal_code' => '94564',
            ),
            98 => 
            array (
                'id' => 99,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Buru',
                'postal_code' => '97371',
            ),
            99 => 
            array (
                'id' => 100,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Buru Selatan',
                'postal_code' => '97351',
            ),
            100 => 
            array (
                'id' => 101,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Buton',
                'postal_code' => '93754',
            ),
            101 => 
            array (
                'id' => 102,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Buton Utara',
                'postal_code' => '93745',
            ),
            102 => 
            array (
                'id' => 103,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Ciamis',
                'postal_code' => '46211',
            ),
            103 => 
            array (
                'id' => 104,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Cianjur',
                'postal_code' => '43217',
            ),
            104 => 
            array (
                'id' => 105,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Cilacap',
                'postal_code' => '53211',
            ),
            105 => 
            array (
                'id' => 106,
                'province_id' => 3,
                'type' => 'Kota',
                'name' => 'Cilegon',
                'postal_code' => '42417',
            ),
            106 => 
            array (
                'id' => 107,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Cimahi',
                'postal_code' => '40512',
            ),
            107 => 
            array (
                'id' => 108,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Cirebon',
                'postal_code' => '45611',
            ),
            108 => 
            array (
                'id' => 109,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Cirebon',
                'postal_code' => '45116',
            ),
            109 => 
            array (
                'id' => 110,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Dairi',
                'postal_code' => '22211',
            ),
            110 => 
            array (
                'id' => 111,
                'province_id' => 24,
                'type' => 'Kabupaten',
            'name' => 'Deiyai (Deliyai)',
                'postal_code' => '98784',
            ),
            111 => 
            array (
                'id' => 112,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Deli Serdang',
                'postal_code' => '20511',
            ),
            112 => 
            array (
                'id' => 113,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Demak',
                'postal_code' => '59519',
            ),
            113 => 
            array (
                'id' => 114,
                'province_id' => 1,
                'type' => 'Kota',
                'name' => 'Denpasar',
                'postal_code' => '80227',
            ),
            114 => 
            array (
                'id' => 115,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Depok',
                'postal_code' => '16416',
            ),
            115 => 
            array (
                'id' => 116,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Dharmasraya',
                'postal_code' => '27612',
            ),
            116 => 
            array (
                'id' => 117,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Dogiyai',
                'postal_code' => '98866',
            ),
            117 => 
            array (
                'id' => 118,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Dompu',
                'postal_code' => '84217',
            ),
            118 => 
            array (
                'id' => 119,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Donggala',
                'postal_code' => '94341',
            ),
            119 => 
            array (
                'id' => 120,
                'province_id' => 26,
                'type' => 'Kota',
                'name' => 'Dumai',
                'postal_code' => '28811',
            ),
            120 => 
            array (
                'id' => 121,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Empat Lawang',
                'postal_code' => '31811',
            ),
            121 => 
            array (
                'id' => 122,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Ende',
                'postal_code' => '86351',
            ),
            122 => 
            array (
                'id' => 123,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Enrekang',
                'postal_code' => '91719',
            ),
            123 => 
            array (
                'id' => 124,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Fakfak',
                'postal_code' => '98651',
            ),
            124 => 
            array (
                'id' => 125,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Flores Timur',
                'postal_code' => '86213',
            ),
            125 => 
            array (
                'id' => 126,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Garut',
                'postal_code' => '44126',
            ),
            126 => 
            array (
                'id' => 127,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Gayo Lues',
                'postal_code' => '24653',
            ),
            127 => 
            array (
                'id' => 128,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Gianyar',
                'postal_code' => '80519',
            ),
            128 => 
            array (
                'id' => 129,
                'province_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Gorontalo',
                'postal_code' => '96218',
            ),
            129 => 
            array (
                'id' => 130,
                'province_id' => 7,
                'type' => 'Kota',
                'name' => 'Gorontalo',
                'postal_code' => '96115',
            ),
            130 => 
            array (
                'id' => 131,
                'province_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Gorontalo Utara',
                'postal_code' => '96611',
            ),
            131 => 
            array (
                'id' => 132,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Gowa',
                'postal_code' => '92111',
            ),
            132 => 
            array (
                'id' => 133,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Gresik',
                'postal_code' => '61115',
            ),
            133 => 
            array (
                'id' => 134,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Grobogan',
                'postal_code' => '58111',
            ),
            134 => 
            array (
                'id' => 135,
                'province_id' => 5,
                'type' => 'Kabupaten',
                'name' => 'Gunung Kidul',
                'postal_code' => '55812',
            ),
            135 => 
            array (
                'id' => 136,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Gunung Mas',
                'postal_code' => '74511',
            ),
            136 => 
            array (
                'id' => 137,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Gunungsitoli',
                'postal_code' => '22813',
            ),
            137 => 
            array (
                'id' => 138,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Barat',
                'postal_code' => '97757',
            ),
            138 => 
            array (
                'id' => 139,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Selatan',
                'postal_code' => '97911',
            ),
            139 => 
            array (
                'id' => 140,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Tengah',
                'postal_code' => '97853',
            ),
            140 => 
            array (
                'id' => 141,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Timur',
                'postal_code' => '97862',
            ),
            141 => 
            array (
                'id' => 142,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Utara',
                'postal_code' => '97762',
            ),
            142 => 
            array (
                'id' => 143,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Selatan',
                'postal_code' => '71212',
            ),
            143 => 
            array (
                'id' => 144,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Tengah',
                'postal_code' => '71313',
            ),
            144 => 
            array (
                'id' => 145,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Utara',
                'postal_code' => '71419',
            ),
            145 => 
            array (
                'id' => 146,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Humbang Hasundutan',
                'postal_code' => '22457',
            ),
            146 => 
            array (
                'id' => 147,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Indragiri Hilir',
                'postal_code' => '29212',
            ),
            147 => 
            array (
                'id' => 148,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Indragiri Hulu',
                'postal_code' => '29319',
            ),
            148 => 
            array (
                'id' => 149,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Indramayu',
                'postal_code' => '45214',
            ),
            149 => 
            array (
                'id' => 150,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Intan Jaya',
                'postal_code' => '98771',
            ),
            150 => 
            array (
                'id' => 151,
                'province_id' => 6,
                'type' => 'Kota',
                'name' => 'Jakarta Barat',
                'postal_code' => '11220',
            ),
            151 => 
            array (
                'id' => 152,
                'province_id' => 6,
                'type' => 'Kota',
                'name' => 'Jakarta Pusat',
                'postal_code' => '10540',
            ),
            152 => 
            array (
                'id' => 153,
                'province_id' => 6,
                'type' => 'Kota',
                'name' => 'Jakarta Selatan',
                'postal_code' => '12230',
            ),
            153 => 
            array (
                'id' => 154,
                'province_id' => 6,
                'type' => 'Kota',
                'name' => 'Jakarta Timur',
                'postal_code' => '13330',
            ),
            154 => 
            array (
                'id' => 155,
                'province_id' => 6,
                'type' => 'Kota',
                'name' => 'Jakarta Utara',
                'postal_code' => '14140',
            ),
            155 => 
            array (
                'id' => 156,
                'province_id' => 8,
                'type' => 'Kota',
                'name' => 'Jambi',
                'postal_code' => '36111',
            ),
            156 => 
            array (
                'id' => 157,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Jayapura',
                'postal_code' => '99352',
            ),
            157 => 
            array (
                'id' => 158,
                'province_id' => 24,
                'type' => 'Kota',
                'name' => 'Jayapura',
                'postal_code' => '99114',
            ),
            158 => 
            array (
                'id' => 159,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Jayawijaya',
                'postal_code' => '99511',
            ),
            159 => 
            array (
                'id' => 160,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Jember',
                'postal_code' => '68113',
            ),
            160 => 
            array (
                'id' => 161,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Jembrana',
                'postal_code' => '82251',
            ),
            161 => 
            array (
                'id' => 162,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Jeneponto',
                'postal_code' => '92319',
            ),
            162 => 
            array (
                'id' => 163,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Jepara',
                'postal_code' => '59419',
            ),
            163 => 
            array (
                'id' => 164,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Jombang',
                'postal_code' => '61415',
            ),
            164 => 
            array (
                'id' => 165,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Kaimana',
                'postal_code' => '98671',
            ),
            165 => 
            array (
                'id' => 166,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Kampar',
                'postal_code' => '28411',
            ),
            166 => 
            array (
                'id' => 167,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Kapuas',
                'postal_code' => '73583',
            ),
            167 => 
            array (
                'id' => 168,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Kapuas Hulu',
                'postal_code' => '78719',
            ),
            168 => 
            array (
                'id' => 169,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Karanganyar',
                'postal_code' => '57718',
            ),
            169 => 
            array (
                'id' => 170,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Karangasem',
                'postal_code' => '80819',
            ),
            170 => 
            array (
                'id' => 171,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Karawang',
                'postal_code' => '41311',
            ),
            171 => 
            array (
                'id' => 172,
                'province_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Karimun',
                'postal_code' => '29611',
            ),
            172 => 
            array (
                'id' => 173,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Karo',
                'postal_code' => '22119',
            ),
            173 => 
            array (
                'id' => 174,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Katingan',
                'postal_code' => '74411',
            ),
            174 => 
            array (
                'id' => 175,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Kaur',
                'postal_code' => '38911',
            ),
            175 => 
            array (
                'id' => 176,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Kayong Utara',
                'postal_code' => '78852',
            ),
            176 => 
            array (
                'id' => 177,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Kebumen',
                'postal_code' => '54319',
            ),
            177 => 
            array (
                'id' => 178,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Kediri',
                'postal_code' => '64184',
            ),
            178 => 
            array (
                'id' => 179,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Kediri',
                'postal_code' => '64125',
            ),
            179 => 
            array (
                'id' => 180,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Keerom',
                'postal_code' => '99461',
            ),
            180 => 
            array (
                'id' => 181,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Kendal',
                'postal_code' => '51314',
            ),
            181 => 
            array (
                'id' => 182,
                'province_id' => 30,
                'type' => 'Kota',
                'name' => 'Kendari',
                'postal_code' => '93126',
            ),
            182 => 
            array (
                'id' => 183,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Kepahiang',
                'postal_code' => '39319',
            ),
            183 => 
            array (
                'id' => 184,
                'province_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Anambas',
                'postal_code' => '29991',
            ),
            184 => 
            array (
                'id' => 185,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Aru',
                'postal_code' => '97681',
            ),
            185 => 
            array (
                'id' => 186,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Mentawai',
                'postal_code' => '25771',
            ),
            186 => 
            array (
                'id' => 187,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Meranti',
                'postal_code' => '28791',
            ),
            187 => 
            array (
                'id' => 188,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Sangihe',
                'postal_code' => '95819',
            ),
            188 => 
            array (
                'id' => 189,
                'province_id' => 6,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Seribu',
                'postal_code' => '14550',
            ),
            189 => 
            array (
                'id' => 190,
                'province_id' => 31,
                'type' => 'Kabupaten',
            'name' => 'Kepulauan Siau Tagulandang Biaro (Sitaro)',
                'postal_code' => '95862',
            ),
            190 => 
            array (
                'id' => 191,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Sula',
                'postal_code' => '97995',
            ),
            191 => 
            array (
                'id' => 192,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Talaud',
                'postal_code' => '95885',
            ),
            192 => 
            array (
                'id' => 193,
                'province_id' => 24,
                'type' => 'Kabupaten',
            'name' => 'Kepulauan Yapen (Yapen Waropen)',
                'postal_code' => '98211',
            ),
            193 => 
            array (
                'id' => 194,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Kerinci',
                'postal_code' => '37167',
            ),
            194 => 
            array (
                'id' => 195,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Ketapang',
                'postal_code' => '78874',
            ),
            195 => 
            array (
                'id' => 196,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Klaten',
                'postal_code' => '57411',
            ),
            196 => 
            array (
                'id' => 197,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Klungkung',
                'postal_code' => '80719',
            ),
            197 => 
            array (
                'id' => 198,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Kolaka',
                'postal_code' => '93511',
            ),
            198 => 
            array (
                'id' => 199,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Kolaka Utara',
                'postal_code' => '93911',
            ),
            199 => 
            array (
                'id' => 200,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Konawe',
                'postal_code' => '93411',
            ),
            200 => 
            array (
                'id' => 201,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Konawe Selatan',
                'postal_code' => '93811',
            ),
            201 => 
            array (
                'id' => 202,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Konawe Utara',
                'postal_code' => '93311',
            ),
            202 => 
            array (
                'id' => 203,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Kotabaru',
                'postal_code' => '72119',
            ),
            203 => 
            array (
                'id' => 204,
                'province_id' => 31,
                'type' => 'Kota',
                'name' => 'Kotamobagu',
                'postal_code' => '95711',
            ),
            204 => 
            array (
                'id' => 205,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Kotawaringin Barat',
                'postal_code' => '74119',
            ),
            205 => 
            array (
                'id' => 206,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Kotawaringin Timur',
                'postal_code' => '74364',
            ),
            206 => 
            array (
                'id' => 207,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Kuantan Singingi',
                'postal_code' => '29519',
            ),
            207 => 
            array (
                'id' => 208,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Kubu Raya',
                'postal_code' => '78311',
            ),
            208 => 
            array (
                'id' => 209,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Kudus',
                'postal_code' => '59311',
            ),
            209 => 
            array (
                'id' => 210,
                'province_id' => 5,
                'type' => 'Kabupaten',
                'name' => 'Kulon Progo',
                'postal_code' => '55611',
            ),
            210 => 
            array (
                'id' => 211,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Kuningan',
                'postal_code' => '45511',
            ),
            211 => 
            array (
                'id' => 212,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Kupang',
                'postal_code' => '85362',
            ),
            212 => 
            array (
                'id' => 213,
                'province_id' => 23,
                'type' => 'Kota',
                'name' => 'Kupang',
                'postal_code' => '85119',
            ),
            213 => 
            array (
                'id' => 214,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Kutai Barat',
                'postal_code' => '75711',
            ),
            214 => 
            array (
                'id' => 215,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Kutai Kartanegara',
                'postal_code' => '75511',
            ),
            215 => 
            array (
                'id' => 216,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Kutai Timur',
                'postal_code' => '75611',
            ),
            216 => 
            array (
                'id' => 217,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu',
                'postal_code' => '21412',
            ),
            217 => 
            array (
                'id' => 218,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu Selatan',
                'postal_code' => '21511',
            ),
            218 => 
            array (
                'id' => 219,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu Utara',
                'postal_code' => '21711',
            ),
            219 => 
            array (
                'id' => 220,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Lahat',
                'postal_code' => '31419',
            ),
            220 => 
            array (
                'id' => 221,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Lamandau',
                'postal_code' => '74611',
            ),
            221 => 
            array (
                'id' => 222,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Lamongan',
                'postal_code' => '64125',
            ),
            222 => 
            array (
                'id' => 223,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Lampung Barat',
                'postal_code' => '34814',
            ),
            223 => 
            array (
                'id' => 224,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Lampung Selatan',
                'postal_code' => '35511',
            ),
            224 => 
            array (
                'id' => 225,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Lampung Tengah',
                'postal_code' => '34212',
            ),
            225 => 
            array (
                'id' => 226,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Lampung Timur',
                'postal_code' => '34319',
            ),
            226 => 
            array (
                'id' => 227,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Lampung Utara',
                'postal_code' => '34516',
            ),
            227 => 
            array (
                'id' => 228,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Landak',
                'postal_code' => '78319',
            ),
            228 => 
            array (
                'id' => 229,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Langkat',
                'postal_code' => '20811',
            ),
            229 => 
            array (
                'id' => 230,
                'province_id' => 21,
                'type' => 'Kota',
                'name' => 'Langsa',
                'postal_code' => '24412',
            ),
            230 => 
            array (
                'id' => 231,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Lanny Jaya',
                'postal_code' => '99531',
            ),
            231 => 
            array (
                'id' => 232,
                'province_id' => 3,
                'type' => 'Kabupaten',
                'name' => 'Lebak',
                'postal_code' => '42319',
            ),
            232 => 
            array (
                'id' => 233,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Lebong',
                'postal_code' => '39264',
            ),
            233 => 
            array (
                'id' => 234,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Lembata',
                'postal_code' => '86611',
            ),
            234 => 
            array (
                'id' => 235,
                'province_id' => 21,
                'type' => 'Kota',
                'name' => 'Lhokseumawe',
                'postal_code' => '24352',
            ),
            235 => 
            array (
                'id' => 236,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Lima Puluh Koto/Kota',
                'postal_code' => '26671',
            ),
            236 => 
            array (
                'id' => 237,
                'province_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Lingga',
                'postal_code' => '29811',
            ),
            237 => 
            array (
                'id' => 238,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Lombok Barat',
                'postal_code' => '83311',
            ),
            238 => 
            array (
                'id' => 239,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Lombok Tengah',
                'postal_code' => '83511',
            ),
            239 => 
            array (
                'id' => 240,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Lombok Timur',
                'postal_code' => '83612',
            ),
            240 => 
            array (
                'id' => 241,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Lombok Utara',
                'postal_code' => '83711',
            ),
            241 => 
            array (
                'id' => 242,
                'province_id' => 33,
                'type' => 'Kota',
                'name' => 'Lubuk Linggau',
                'postal_code' => '31614',
            ),
            242 => 
            array (
                'id' => 243,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Lumajang',
                'postal_code' => '67319',
            ),
            243 => 
            array (
                'id' => 244,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Luwu',
                'postal_code' => '91994',
            ),
            244 => 
            array (
                'id' => 245,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Luwu Timur',
                'postal_code' => '92981',
            ),
            245 => 
            array (
                'id' => 246,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Luwu Utara',
                'postal_code' => '92911',
            ),
            246 => 
            array (
                'id' => 247,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Madiun',
                'postal_code' => '63153',
            ),
            247 => 
            array (
                'id' => 248,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Madiun',
                'postal_code' => '63122',
            ),
            248 => 
            array (
                'id' => 249,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Magelang',
                'postal_code' => '56519',
            ),
            249 => 
            array (
                'id' => 250,
                'province_id' => 10,
                'type' => 'Kota',
                'name' => 'Magelang',
                'postal_code' => '56133',
            ),
            250 => 
            array (
                'id' => 251,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Magetan',
                'postal_code' => '63314',
            ),
            251 => 
            array (
                'id' => 252,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Majalengka',
                'postal_code' => '45412',
            ),
            252 => 
            array (
                'id' => 253,
                'province_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Majene',
                'postal_code' => '91411',
            ),
            253 => 
            array (
                'id' => 254,
                'province_id' => 28,
                'type' => 'Kota',
                'name' => 'Makassar',
                'postal_code' => '90111',
            ),
            254 => 
            array (
                'id' => 255,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Malang',
                'postal_code' => '65163',
            ),
            255 => 
            array (
                'id' => 256,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Malang',
                'postal_code' => '65112',
            ),
            256 => 
            array (
                'id' => 257,
                'province_id' => 16,
                'type' => 'Kabupaten',
                'name' => 'Malinau',
                'postal_code' => '77511',
            ),
            257 => 
            array (
                'id' => 258,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Maluku Barat Daya',
                'postal_code' => '97451',
            ),
            258 => 
            array (
                'id' => 259,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tengah',
                'postal_code' => '97513',
            ),
            259 => 
            array (
                'id' => 260,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tenggara',
                'postal_code' => '97651',
            ),
            260 => 
            array (
                'id' => 261,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tenggara Barat',
                'postal_code' => '97465',
            ),
            261 => 
            array (
                'id' => 262,
                'province_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Mamasa',
                'postal_code' => '91362',
            ),
            262 => 
            array (
                'id' => 263,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Mamberamo Raya',
                'postal_code' => '99381',
            ),
            263 => 
            array (
                'id' => 264,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Mamberamo Tengah',
                'postal_code' => '99553',
            ),
            264 => 
            array (
                'id' => 265,
                'province_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Mamuju',
                'postal_code' => '91519',
            ),
            265 => 
            array (
                'id' => 266,
                'province_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Mamuju Utara',
                'postal_code' => '91571',
            ),
            266 => 
            array (
                'id' => 267,
                'province_id' => 31,
                'type' => 'Kota',
                'name' => 'Manado',
                'postal_code' => '95247',
            ),
            267 => 
            array (
                'id' => 268,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Mandailing Natal',
                'postal_code' => '22916',
            ),
            268 => 
            array (
                'id' => 269,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Manggarai',
                'postal_code' => '86551',
            ),
            269 => 
            array (
                'id' => 270,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Manggarai Barat',
                'postal_code' => '86711',
            ),
            270 => 
            array (
                'id' => 271,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Manggarai Timur',
                'postal_code' => '86811',
            ),
            271 => 
            array (
                'id' => 272,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Manokwari',
                'postal_code' => '98311',
            ),
            272 => 
            array (
                'id' => 273,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Manokwari Selatan',
                'postal_code' => '98355',
            ),
            273 => 
            array (
                'id' => 274,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Mappi',
                'postal_code' => '99853',
            ),
            274 => 
            array (
                'id' => 275,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Maros',
                'postal_code' => '90511',
            ),
            275 => 
            array (
                'id' => 276,
                'province_id' => 22,
                'type' => 'Kota',
                'name' => 'Mataram',
                'postal_code' => '83131',
            ),
            276 => 
            array (
                'id' => 277,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Maybrat',
                'postal_code' => '98051',
            ),
            277 => 
            array (
                'id' => 278,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Medan',
                'postal_code' => '20228',
            ),
            278 => 
            array (
                'id' => 279,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Melawi',
                'postal_code' => '78619',
            ),
            279 => 
            array (
                'id' => 280,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Merangin',
                'postal_code' => '37319',
            ),
            280 => 
            array (
                'id' => 281,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Merauke',
                'postal_code' => '99613',
            ),
            281 => 
            array (
                'id' => 282,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Mesuji',
                'postal_code' => '34911',
            ),
            282 => 
            array (
                'id' => 283,
                'province_id' => 18,
                'type' => 'Kota',
                'name' => 'Metro',
                'postal_code' => '34111',
            ),
            283 => 
            array (
                'id' => 284,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Mimika',
                'postal_code' => '99962',
            ),
            284 => 
            array (
                'id' => 285,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Minahasa',
                'postal_code' => '95614',
            ),
            285 => 
            array (
                'id' => 286,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Selatan',
                'postal_code' => '95914',
            ),
            286 => 
            array (
                'id' => 287,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Tenggara',
                'postal_code' => '95995',
            ),
            287 => 
            array (
                'id' => 288,
                'province_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Utara',
                'postal_code' => '95316',
            ),
            288 => 
            array (
                'id' => 289,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Mojokerto',
                'postal_code' => '61382',
            ),
            289 => 
            array (
                'id' => 290,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Mojokerto',
                'postal_code' => '61316',
            ),
            290 => 
            array (
                'id' => 291,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Morowali',
                'postal_code' => '94911',
            ),
            291 => 
            array (
                'id' => 292,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Muara Enim',
                'postal_code' => '31315',
            ),
            292 => 
            array (
                'id' => 293,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Muaro Jambi',
                'postal_code' => '36311',
            ),
            293 => 
            array (
                'id' => 294,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Muko Muko',
                'postal_code' => '38715',
            ),
            294 => 
            array (
                'id' => 295,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Muna',
                'postal_code' => '93611',
            ),
            295 => 
            array (
                'id' => 296,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Murung Raya',
                'postal_code' => '73911',
            ),
            296 => 
            array (
                'id' => 297,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Musi Banyuasin',
                'postal_code' => '30719',
            ),
            297 => 
            array (
                'id' => 298,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Musi Rawas',
                'postal_code' => '31661',
            ),
            298 => 
            array (
                'id' => 299,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Nabire',
                'postal_code' => '98816',
            ),
            299 => 
            array (
                'id' => 300,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Nagan Raya',
                'postal_code' => '23674',
            ),
            300 => 
            array (
                'id' => 301,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Nagekeo',
                'postal_code' => '86911',
            ),
            301 => 
            array (
                'id' => 302,
                'province_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Natuna',
                'postal_code' => '29711',
            ),
            302 => 
            array (
                'id' => 303,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Nduga',
                'postal_code' => '99541',
            ),
            303 => 
            array (
                'id' => 304,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Ngada',
                'postal_code' => '86413',
            ),
            304 => 
            array (
                'id' => 305,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Nganjuk',
                'postal_code' => '64414',
            ),
            305 => 
            array (
                'id' => 306,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Ngawi',
                'postal_code' => '63219',
            ),
            306 => 
            array (
                'id' => 307,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Nias',
                'postal_code' => '22876',
            ),
            307 => 
            array (
                'id' => 308,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Nias Barat',
                'postal_code' => '22895',
            ),
            308 => 
            array (
                'id' => 309,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Nias Selatan',
                'postal_code' => '22865',
            ),
            309 => 
            array (
                'id' => 310,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Nias Utara',
                'postal_code' => '22856',
            ),
            310 => 
            array (
                'id' => 311,
                'province_id' => 16,
                'type' => 'Kabupaten',
                'name' => 'Nunukan',
                'postal_code' => '77421',
            ),
            311 => 
            array (
                'id' => 312,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Ogan Ilir',
                'postal_code' => '30811',
            ),
            312 => 
            array (
                'id' => 313,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ilir',
                'postal_code' => '30618',
            ),
            313 => 
            array (
                'id' => 314,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu',
                'postal_code' => '32112',
            ),
            314 => 
            array (
                'id' => 315,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu Selatan',
                'postal_code' => '32211',
            ),
            315 => 
            array (
                'id' => 316,
                'province_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu Timur',
                'postal_code' => '32312',
            ),
            316 => 
            array (
                'id' => 317,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Pacitan',
                'postal_code' => '63512',
            ),
            317 => 
            array (
                'id' => 318,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Padang',
                'postal_code' => '25112',
            ),
            318 => 
            array (
                'id' => 319,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Padang Lawas',
                'postal_code' => '22763',
            ),
            319 => 
            array (
                'id' => 320,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Padang Lawas Utara',
                'postal_code' => '22753',
            ),
            320 => 
            array (
                'id' => 321,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Padang Panjang',
                'postal_code' => '27122',
            ),
            321 => 
            array (
                'id' => 322,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Padang Pariaman',
                'postal_code' => '25583',
            ),
            322 => 
            array (
                'id' => 323,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Padang Sidempuan',
                'postal_code' => '22727',
            ),
            323 => 
            array (
                'id' => 324,
                'province_id' => 33,
                'type' => 'Kota',
                'name' => 'Pagar Alam',
                'postal_code' => '31512',
            ),
            324 => 
            array (
                'id' => 325,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Pakpak Bharat',
                'postal_code' => '22272',
            ),
            325 => 
            array (
                'id' => 326,
                'province_id' => 14,
                'type' => 'Kota',
                'name' => 'Palangka Raya',
                'postal_code' => '73112',
            ),
            326 => 
            array (
                'id' => 327,
                'province_id' => 33,
                'type' => 'Kota',
                'name' => 'Palembang',
                'postal_code' => '30111',
            ),
            327 => 
            array (
                'id' => 328,
                'province_id' => 28,
                'type' => 'Kota',
                'name' => 'Palopo',
                'postal_code' => '91911',
            ),
            328 => 
            array (
                'id' => 329,
                'province_id' => 29,
                'type' => 'Kota',
                'name' => 'Palu',
                'postal_code' => '94111',
            ),
            329 => 
            array (
                'id' => 330,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Pamekasan',
                'postal_code' => '69319',
            ),
            330 => 
            array (
                'id' => 331,
                'province_id' => 3,
                'type' => 'Kabupaten',
                'name' => 'Pandeglang',
                'postal_code' => '42212',
            ),
            331 => 
            array (
                'id' => 332,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Pangandaran',
                'postal_code' => '46511',
            ),
            332 => 
            array (
                'id' => 333,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Pangkajene Kepulauan',
                'postal_code' => '90611',
            ),
            333 => 
            array (
                'id' => 334,
                'province_id' => 2,
                'type' => 'Kota',
                'name' => 'Pangkal Pinang',
                'postal_code' => '33115',
            ),
            334 => 
            array (
                'id' => 335,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Paniai',
                'postal_code' => '98765',
            ),
            335 => 
            array (
                'id' => 336,
                'province_id' => 28,
                'type' => 'Kota',
                'name' => 'Parepare',
                'postal_code' => '91123',
            ),
            336 => 
            array (
                'id' => 337,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Pariaman',
                'postal_code' => '25511',
            ),
            337 => 
            array (
                'id' => 338,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Parigi Moutong',
                'postal_code' => '94411',
            ),
            338 => 
            array (
                'id' => 339,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Pasaman',
                'postal_code' => '26318',
            ),
            339 => 
            array (
                'id' => 340,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Pasaman Barat',
                'postal_code' => '26511',
            ),
            340 => 
            array (
                'id' => 341,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Paser',
                'postal_code' => '76211',
            ),
            341 => 
            array (
                'id' => 342,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Pasuruan',
                'postal_code' => '67153',
            ),
            342 => 
            array (
                'id' => 343,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Pasuruan',
                'postal_code' => '67118',
            ),
            343 => 
            array (
                'id' => 344,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Pati',
                'postal_code' => '59114',
            ),
            344 => 
            array (
                'id' => 345,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Payakumbuh',
                'postal_code' => '26213',
            ),
            345 => 
            array (
                'id' => 346,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Pegunungan Arfak',
                'postal_code' => '98354',
            ),
            346 => 
            array (
                'id' => 347,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Pegunungan Bintang',
                'postal_code' => '99573',
            ),
            347 => 
            array (
                'id' => 348,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Pekalongan',
                'postal_code' => '51161',
            ),
            348 => 
            array (
                'id' => 349,
                'province_id' => 10,
                'type' => 'Kota',
                'name' => 'Pekalongan',
                'postal_code' => '51122',
            ),
            349 => 
            array (
                'id' => 350,
                'province_id' => 26,
                'type' => 'Kota',
                'name' => 'Pekanbaru',
                'postal_code' => '28112',
            ),
            350 => 
            array (
                'id' => 351,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Pelalawan',
                'postal_code' => '28311',
            ),
            351 => 
            array (
                'id' => 352,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Pemalang',
                'postal_code' => '52319',
            ),
            352 => 
            array (
                'id' => 353,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Pematang Siantar',
                'postal_code' => '21126',
            ),
            353 => 
            array (
                'id' => 354,
                'province_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Penajam Paser Utara',
                'postal_code' => '76311',
            ),
            354 => 
            array (
                'id' => 355,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Pesawaran',
                'postal_code' => '35312',
            ),
            355 => 
            array (
                'id' => 356,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Pesisir Barat',
                'postal_code' => '35974',
            ),
            356 => 
            array (
                'id' => 357,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Pesisir Selatan',
                'postal_code' => '25611',
            ),
            357 => 
            array (
                'id' => 358,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Pidie',
                'postal_code' => '24116',
            ),
            358 => 
            array (
                'id' => 359,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Pidie Jaya',
                'postal_code' => '24186',
            ),
            359 => 
            array (
                'id' => 360,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Pinrang',
                'postal_code' => '91251',
            ),
            360 => 
            array (
                'id' => 361,
                'province_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Pohuwato',
                'postal_code' => '96419',
            ),
            361 => 
            array (
                'id' => 362,
                'province_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Polewali Mandar',
                'postal_code' => '91311',
            ),
            362 => 
            array (
                'id' => 363,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Ponorogo',
                'postal_code' => '63411',
            ),
            363 => 
            array (
                'id' => 364,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Pontianak',
                'postal_code' => '78971',
            ),
            364 => 
            array (
                'id' => 365,
                'province_id' => 12,
                'type' => 'Kota',
                'name' => 'Pontianak',
                'postal_code' => '78112',
            ),
            365 => 
            array (
                'id' => 366,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Poso',
                'postal_code' => '94615',
            ),
            366 => 
            array (
                'id' => 367,
                'province_id' => 33,
                'type' => 'Kota',
                'name' => 'Prabumulih',
                'postal_code' => '31121',
            ),
            367 => 
            array (
                'id' => 368,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Pringsewu',
                'postal_code' => '35719',
            ),
            368 => 
            array (
                'id' => 369,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Probolinggo',
                'postal_code' => '67282',
            ),
            369 => 
            array (
                'id' => 370,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Probolinggo',
                'postal_code' => '67215',
            ),
            370 => 
            array (
                'id' => 371,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Pulang Pisau',
                'postal_code' => '74811',
            ),
            371 => 
            array (
                'id' => 372,
                'province_id' => 20,
                'type' => 'Kabupaten',
                'name' => 'Pulau Morotai',
                'postal_code' => '97771',
            ),
            372 => 
            array (
                'id' => 373,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Puncak',
                'postal_code' => '98981',
            ),
            373 => 
            array (
                'id' => 374,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Puncak Jaya',
                'postal_code' => '98979',
            ),
            374 => 
            array (
                'id' => 375,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Purbalingga',
                'postal_code' => '53312',
            ),
            375 => 
            array (
                'id' => 376,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Purwakarta',
                'postal_code' => '41119',
            ),
            376 => 
            array (
                'id' => 377,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Purworejo',
                'postal_code' => '54111',
            ),
            377 => 
            array (
                'id' => 378,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Raja Ampat',
                'postal_code' => '98489',
            ),
            378 => 
            array (
                'id' => 379,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Rejang Lebong',
                'postal_code' => '39112',
            ),
            379 => 
            array (
                'id' => 380,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Rembang',
                'postal_code' => '59219',
            ),
            380 => 
            array (
                'id' => 381,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Rokan Hilir',
                'postal_code' => '28992',
            ),
            381 => 
            array (
                'id' => 382,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Rokan Hulu',
                'postal_code' => '28511',
            ),
            382 => 
            array (
                'id' => 383,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Rote Ndao',
                'postal_code' => '85982',
            ),
            383 => 
            array (
                'id' => 384,
                'province_id' => 21,
                'type' => 'Kota',
                'name' => 'Sabang',
                'postal_code' => '23512',
            ),
            384 => 
            array (
                'id' => 385,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sabu Raijua',
                'postal_code' => '85391',
            ),
            385 => 
            array (
                'id' => 386,
                'province_id' => 10,
                'type' => 'Kota',
                'name' => 'Salatiga',
                'postal_code' => '50711',
            ),
            386 => 
            array (
                'id' => 387,
                'province_id' => 15,
                'type' => 'Kota',
                'name' => 'Samarinda',
                'postal_code' => '75133',
            ),
            387 => 
            array (
                'id' => 388,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Sambas',
                'postal_code' => '79453',
            ),
            388 => 
            array (
                'id' => 389,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Samosir',
                'postal_code' => '22392',
            ),
            389 => 
            array (
                'id' => 390,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Sampang',
                'postal_code' => '69219',
            ),
            390 => 
            array (
                'id' => 391,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Sanggau',
                'postal_code' => '78557',
            ),
            391 => 
            array (
                'id' => 392,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Sarmi',
                'postal_code' => '99373',
            ),
            392 => 
            array (
                'id' => 393,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Sarolangun',
                'postal_code' => '37419',
            ),
            393 => 
            array (
                'id' => 394,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Sawah Lunto',
                'postal_code' => '27416',
            ),
            394 => 
            array (
                'id' => 395,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Sekadau',
                'postal_code' => '79583',
            ),
            395 => 
            array (
                'id' => 396,
                'province_id' => 28,
                'type' => 'Kabupaten',
            'name' => 'Selayar (Kepulauan Selayar)',
                'postal_code' => '92812',
            ),
            396 => 
            array (
                'id' => 397,
                'province_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Seluma',
                'postal_code' => '38811',
            ),
            397 => 
            array (
                'id' => 398,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Semarang',
                'postal_code' => '50511',
            ),
            398 => 
            array (
                'id' => 399,
                'province_id' => 10,
                'type' => 'Kota',
                'name' => 'Semarang',
                'postal_code' => '50135',
            ),
            399 => 
            array (
                'id' => 400,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Seram Bagian Barat',
                'postal_code' => '97561',
            ),
            400 => 
            array (
                'id' => 401,
                'province_id' => 19,
                'type' => 'Kabupaten',
                'name' => 'Seram Bagian Timur',
                'postal_code' => '97581',
            ),
            401 => 
            array (
                'id' => 402,
                'province_id' => 3,
                'type' => 'Kabupaten',
                'name' => 'Serang',
                'postal_code' => '42182',
            ),
            402 => 
            array (
                'id' => 403,
                'province_id' => 3,
                'type' => 'Kota',
                'name' => 'Serang',
                'postal_code' => '42111',
            ),
            403 => 
            array (
                'id' => 404,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Serdang Bedagai',
                'postal_code' => '20915',
            ),
            404 => 
            array (
                'id' => 405,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Seruyan',
                'postal_code' => '74211',
            ),
            405 => 
            array (
                'id' => 406,
                'province_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Siak',
                'postal_code' => '28623',
            ),
            406 => 
            array (
                'id' => 407,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Sibolga',
                'postal_code' => '22522',
            ),
            407 => 
            array (
                'id' => 408,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Sidenreng Rappang/Rapang',
                'postal_code' => '91613',
            ),
            408 => 
            array (
                'id' => 409,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Sidoarjo',
                'postal_code' => '61219',
            ),
            409 => 
            array (
                'id' => 410,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Sigi',
                'postal_code' => '94364',
            ),
            410 => 
            array (
                'id' => 411,
                'province_id' => 32,
                'type' => 'Kabupaten',
            'name' => 'Sijunjung (Sawah Lunto Sijunjung)',
                'postal_code' => '27511',
            ),
            411 => 
            array (
                'id' => 412,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sikka',
                'postal_code' => '86121',
            ),
            412 => 
            array (
                'id' => 413,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Simalungun',
                'postal_code' => '21162',
            ),
            413 => 
            array (
                'id' => 414,
                'province_id' => 21,
                'type' => 'Kabupaten',
                'name' => 'Simeulue',
                'postal_code' => '23891',
            ),
            414 => 
            array (
                'id' => 415,
                'province_id' => 12,
                'type' => 'Kota',
                'name' => 'Singkawang',
                'postal_code' => '79117',
            ),
            415 => 
            array (
                'id' => 416,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Sinjai',
                'postal_code' => '92615',
            ),
            416 => 
            array (
                'id' => 417,
                'province_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Sintang',
                'postal_code' => '78619',
            ),
            417 => 
            array (
                'id' => 418,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Situbondo',
                'postal_code' => '68316',
            ),
            418 => 
            array (
                'id' => 419,
                'province_id' => 5,
                'type' => 'Kabupaten',
                'name' => 'Sleman',
                'postal_code' => '55513',
            ),
            419 => 
            array (
                'id' => 420,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Solok',
                'postal_code' => '27365',
            ),
            420 => 
            array (
                'id' => 421,
                'province_id' => 32,
                'type' => 'Kota',
                'name' => 'Solok',
                'postal_code' => '27315',
            ),
            421 => 
            array (
                'id' => 422,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Solok Selatan',
                'postal_code' => '27779',
            ),
            422 => 
            array (
                'id' => 423,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Soppeng',
                'postal_code' => '90812',
            ),
            423 => 
            array (
                'id' => 424,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Sorong',
                'postal_code' => '98431',
            ),
            424 => 
            array (
                'id' => 425,
                'province_id' => 25,
                'type' => 'Kota',
                'name' => 'Sorong',
                'postal_code' => '98411',
            ),
            425 => 
            array (
                'id' => 426,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Sorong Selatan',
                'postal_code' => '98454',
            ),
            426 => 
            array (
                'id' => 427,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Sragen',
                'postal_code' => '57211',
            ),
            427 => 
            array (
                'id' => 428,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Subang',
                'postal_code' => '41215',
            ),
            428 => 
            array (
                'id' => 429,
                'province_id' => 21,
                'type' => 'Kota',
                'name' => 'Subulussalam',
                'postal_code' => '24882',
            ),
            429 => 
            array (
                'id' => 430,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Sukabumi',
                'postal_code' => '43311',
            ),
            430 => 
            array (
                'id' => 431,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Sukabumi',
                'postal_code' => '43114',
            ),
            431 => 
            array (
                'id' => 432,
                'province_id' => 14,
                'type' => 'Kabupaten',
                'name' => 'Sukamara',
                'postal_code' => '74712',
            ),
            432 => 
            array (
                'id' => 433,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Sukoharjo',
                'postal_code' => '57514',
            ),
            433 => 
            array (
                'id' => 434,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sumba Barat',
                'postal_code' => '87219',
            ),
            434 => 
            array (
                'id' => 435,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sumba Barat Daya',
                'postal_code' => '87453',
            ),
            435 => 
            array (
                'id' => 436,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sumba Tengah',
                'postal_code' => '87358',
            ),
            436 => 
            array (
                'id' => 437,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Sumba Timur',
                'postal_code' => '87112',
            ),
            437 => 
            array (
                'id' => 438,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Sumbawa',
                'postal_code' => '84315',
            ),
            438 => 
            array (
                'id' => 439,
                'province_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Sumbawa Barat',
                'postal_code' => '84419',
            ),
            439 => 
            array (
                'id' => 440,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Sumedang',
                'postal_code' => '45326',
            ),
            440 => 
            array (
                'id' => 441,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Sumenep',
                'postal_code' => '69413',
            ),
            441 => 
            array (
                'id' => 442,
                'province_id' => 8,
                'type' => 'Kota',
                'name' => 'Sungaipenuh',
                'postal_code' => '37113',
            ),
            442 => 
            array (
                'id' => 443,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Supiori',
                'postal_code' => '98164',
            ),
            443 => 
            array (
                'id' => 444,
                'province_id' => 11,
                'type' => 'Kota',
                'name' => 'Surabaya',
                'postal_code' => '60119',
            ),
            444 => 
            array (
                'id' => 445,
                'province_id' => 10,
                'type' => 'Kota',
            'name' => 'Surakarta (Solo)',
                'postal_code' => '57113',
            ),
            445 => 
            array (
                'id' => 446,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Tabalong',
                'postal_code' => '71513',
            ),
            446 => 
            array (
                'id' => 447,
                'province_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Tabanan',
                'postal_code' => '82119',
            ),
            447 => 
            array (
                'id' => 448,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Takalar',
                'postal_code' => '92212',
            ),
            448 => 
            array (
                'id' => 449,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Tambrauw',
                'postal_code' => '98475',
            ),
            449 => 
            array (
                'id' => 450,
                'province_id' => 16,
                'type' => 'Kabupaten',
                'name' => 'Tana Tidung',
                'postal_code' => '77611',
            ),
            450 => 
            array (
                'id' => 451,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Tana Toraja',
                'postal_code' => '91819',
            ),
            451 => 
            array (
                'id' => 452,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Tanah Bumbu',
                'postal_code' => '72211',
            ),
            452 => 
            array (
                'id' => 453,
                'province_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Tanah Datar',
                'postal_code' => '27211',
            ),
            453 => 
            array (
                'id' => 454,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Tanah Laut',
                'postal_code' => '70811',
            ),
            454 => 
            array (
                'id' => 455,
                'province_id' => 3,
                'type' => 'Kabupaten',
                'name' => 'Tangerang',
                'postal_code' => '15914',
            ),
            455 => 
            array (
                'id' => 456,
                'province_id' => 3,
                'type' => 'Kota',
                'name' => 'Tangerang',
                'postal_code' => '15111',
            ),
            456 => 
            array (
                'id' => 457,
                'province_id' => 3,
                'type' => 'Kota',
                'name' => 'Tangerang Selatan',
                'postal_code' => '15332',
            ),
            457 => 
            array (
                'id' => 458,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Tanggamus',
                'postal_code' => '35619',
            ),
            458 => 
            array (
                'id' => 459,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Tanjung Balai',
                'postal_code' => '21321',
            ),
            459 => 
            array (
                'id' => 460,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Tanjung Jabung Barat',
                'postal_code' => '36513',
            ),
            460 => 
            array (
                'id' => 461,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Tanjung Jabung Timur',
                'postal_code' => '36719',
            ),
            461 => 
            array (
                'id' => 462,
                'province_id' => 17,
                'type' => 'Kota',
                'name' => 'Tanjung Pinang',
                'postal_code' => '29111',
            ),
            462 => 
            array (
                'id' => 463,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Selatan',
                'postal_code' => '22742',
            ),
            463 => 
            array (
                'id' => 464,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Tengah',
                'postal_code' => '22611',
            ),
            464 => 
            array (
                'id' => 465,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Utara',
                'postal_code' => '22414',
            ),
            465 => 
            array (
                'id' => 466,
                'province_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Tapin',
                'postal_code' => '71119',
            ),
            466 => 
            array (
                'id' => 467,
                'province_id' => 16,
                'type' => 'Kota',
                'name' => 'Tarakan',
                'postal_code' => '77114',
            ),
            467 => 
            array (
                'id' => 468,
                'province_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Tasikmalaya',
                'postal_code' => '46411',
            ),
            468 => 
            array (
                'id' => 469,
                'province_id' => 9,
                'type' => 'Kota',
                'name' => 'Tasikmalaya',
                'postal_code' => '46116',
            ),
            469 => 
            array (
                'id' => 470,
                'province_id' => 34,
                'type' => 'Kota',
                'name' => 'Tebing Tinggi',
                'postal_code' => '20632',
            ),
            470 => 
            array (
                'id' => 471,
                'province_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Tebo',
                'postal_code' => '37519',
            ),
            471 => 
            array (
                'id' => 472,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Tegal',
                'postal_code' => '52419',
            ),
            472 => 
            array (
                'id' => 473,
                'province_id' => 10,
                'type' => 'Kota',
                'name' => 'Tegal',
                'postal_code' => '52114',
            ),
            473 => 
            array (
                'id' => 474,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Teluk Bintuni',
                'postal_code' => '98551',
            ),
            474 => 
            array (
                'id' => 475,
                'province_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Teluk Wondama',
                'postal_code' => '98591',
            ),
            475 => 
            array (
                'id' => 476,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Temanggung',
                'postal_code' => '56212',
            ),
            476 => 
            array (
                'id' => 477,
                'province_id' => 20,
                'type' => 'Kota',
                'name' => 'Ternate',
                'postal_code' => '97714',
            ),
            477 => 
            array (
                'id' => 478,
                'province_id' => 20,
                'type' => 'Kota',
                'name' => 'Tidore Kepulauan',
                'postal_code' => '97815',
            ),
            478 => 
            array (
                'id' => 479,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Timor Tengah Selatan',
                'postal_code' => '85562',
            ),
            479 => 
            array (
                'id' => 480,
                'province_id' => 23,
                'type' => 'Kabupaten',
                'name' => 'Timor Tengah Utara',
                'postal_code' => '85612',
            ),
            480 => 
            array (
                'id' => 481,
                'province_id' => 34,
                'type' => 'Kabupaten',
                'name' => 'Toba Samosir',
                'postal_code' => '22316',
            ),
            481 => 
            array (
                'id' => 482,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Tojo Una-Una',
                'postal_code' => '94683',
            ),
            482 => 
            array (
                'id' => 483,
                'province_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Toli-Toli',
                'postal_code' => '94542',
            ),
            483 => 
            array (
                'id' => 484,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Tolikara',
                'postal_code' => '99411',
            ),
            484 => 
            array (
                'id' => 485,
                'province_id' => 31,
                'type' => 'Kota',
                'name' => 'Tomohon',
                'postal_code' => '95416',
            ),
            485 => 
            array (
                'id' => 486,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Toraja Utara',
                'postal_code' => '91831',
            ),
            486 => 
            array (
                'id' => 487,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Trenggalek',
                'postal_code' => '66312',
            ),
            487 => 
            array (
                'id' => 488,
                'province_id' => 19,
                'type' => 'Kota',
                'name' => 'Tual',
                'postal_code' => '97612',
            ),
            488 => 
            array (
                'id' => 489,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Tuban',
                'postal_code' => '62319',
            ),
            489 => 
            array (
                'id' => 490,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Tulang Bawang',
                'postal_code' => '34613',
            ),
            490 => 
            array (
                'id' => 491,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Tulang Bawang Barat',
                'postal_code' => '34419',
            ),
            491 => 
            array (
                'id' => 492,
                'province_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Tulungagung',
                'postal_code' => '66212',
            ),
            492 => 
            array (
                'id' => 493,
                'province_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Wajo',
                'postal_code' => '90911',
            ),
            493 => 
            array (
                'id' => 494,
                'province_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Wakatobi',
                'postal_code' => '93791',
            ),
            494 => 
            array (
                'id' => 495,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Waropen',
                'postal_code' => '98269',
            ),
            495 => 
            array (
                'id' => 496,
                'province_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Way Kanan',
                'postal_code' => '34711',
            ),
            496 => 
            array (
                'id' => 497,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Wonogiri',
                'postal_code' => '57619',
            ),
            497 => 
            array (
                'id' => 498,
                'province_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Wonosobo',
                'postal_code' => '56311',
            ),
            498 => 
            array (
                'id' => 499,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Yahukimo',
                'postal_code' => '99041',
            ),
            499 => 
            array (
                'id' => 500,
                'province_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Yalimo',
                'postal_code' => '99481',
            ),
        ));
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 501,
                'province_id' => 5,
                'type' => 'Kota',
                'name' => 'Yogyakarta',
                'postal_code' => '55111',
            ),
        ));
        
        
    }
}