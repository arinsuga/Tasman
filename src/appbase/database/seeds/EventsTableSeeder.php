<?php

use Illuminate\Database\Seeder;
use Arins\Facades\ConvertDate as Convert;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('events')->delete();

        DB::table('events')->insert([
            'id' => 1,
            'name' => 'New Year 2021',
            'description' => 'Hari berganti, Bulan berganti, Tahun pun berganti. Tahun baru dan tentunya selalu disertai harapan yang baru dengan semangat yang baru. Selamat Tahun Baru 2021',
            'image' => 'events/event1.png',
            'link' => 'https://www.instagram.com/p/CJeFYLqFhTt/',
            'date' => Convert::strDatetimeToDate('01/01/2021 00:00:01'),
        ]);

        DB::table('events')->insert([
            'id' => 2,
            'name' => 'Solusi Petani Masa Kini',
            'description' => 'Malindo Agrotek Perkasa , Drone Spray ! kami siap mengudara untuk petani Indonesia yang lebih maju !',
            'image' => 'events/event2.png',
            'link' => 'https://www.instagram.com/p/CFObl3-l2ka/',
            'date' => Convert::strDatetimeToDate('17/09/2021 00:00:00'),
        ]);

        DB::table('events')->insert([
            'id' => 3,
            'name' => 'Dirgahayu RI ke-75',
            'description' => 'Robek-robeklah badanku, potong-potonglah jasad ini, tetapi jiwaku dilindungi benteng merah putih, akan tetap hidup, tetap menuntut bela, siapapun lawan yang aku hadapi.– Jenderal Sudirman. Selamat HUT RI ke75.',
            'image' => 'events/event3.png',
            'link' => 'https://www.instagram.com/p/CD_C8LUF004/',
            'date' => Convert::strDatetimeToDate('17/08/2021 00:00:00'),
        ]);

        DB::table('events')->insert([
            'id' => 4,
            'name' => '',
            'description' => 'Kami mengucapkan Selamat hari raya idul adha untuk kalian semua yang merayakan.',
            'image' => 'events/event4.png',
            'link' => 'https://www.instagram.com/p/CDTM6AjFRWb/',
            'date' => Convert::strDatetimeToDate('31/07/2021 00:00:00'),
        ]);

        DB::table('events')->insert([
            'id' => 5,
            'name' => 'Happy BirthDay Mr Herry Theo',
            'description' => 'Dear Pak Herry Theo, with you at the helm of affairs, you make us look forward to coming to work every day. This is because you have the heart and soul of a true rock star. I wish you a very happy birthday and many successful years ahead.',
            'image' => 'events/event5.png',
            'link' => 'https://www.instagram.com/p/CCtOK2PlzTT/',
            'date' => Convert::strDatetimeToDate('16/07/2021 00:00:00'),
        ]);

        DB::table('events')->insert([
            'id' => 6,
            'name' => 'Parang Jagal Super Malindo',
            'description' => 'Kami Kembali melahirkan satu produk varian baru untuk meramaikan suasana Idul Adha 2020, yaitu PARANG JAGAL Super MLD.<br>
            Parang yang didesain untuk kebutuhan para juru sembelih hewan dengan spesifikasi sebagai berikut :<br>
            Panjang bilah : 32.5 cm<br>
            Tebal bilah : 0.4 cm menipis kebagian depan<br>
            Lebar bilah : 4,5 cm<br>
            Bahan bilah : High Carbon Steel 65mn<br>
            Handle : 13 cm<br>
            Bahan handle : Plastic Nylon<br>
            Sarung : kulit imitasi<br>
            Hrc Range : 58-60 hrc<br>
            Berat estimasi : 300 gram<br>',
            'image' => 'events/event6.png',
            'link' => 'https://www.instagram.com/p/CCfZaPXFNWo/',
            'date' => Convert::strDatetimeToDate('11/07/2021 00:00:00'),
        ]);

    } //end method
} //end class
