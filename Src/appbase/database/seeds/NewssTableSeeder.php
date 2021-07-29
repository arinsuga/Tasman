<?php

use Illuminate\Database\Seeder;
use Arins\Facades\ConvertDate as Convert;

class NewssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('newss')->delete();

        DB::table('newss')->insert([
            'id' => 1,
            'name' => 'Pengembangan sistem produksi pada produk perkakas Sawit',
            'description' => 'Penggunaan alaI dan mesin pertanian di Indonesia sudah dimulai. sebelumPerang Dunia Ke II. Pada masa, ilu alaI dan mesin pertanian yang digunakan sebagian besar berupa mesinpengolahan hasil pertanian komodili tanaman pangan dan lanaman perkebunan, khususnya karel dan gula" yangpada mula~ya didatangkan dari luar negeri. Mesin penggilingan padi padamasa ilu banyal berasal dari negara Jerman dan Inggris, yang digunakan oleh',
            'image' => 'news/sawit.jpeg',
            'link' => '',
            'date' => Convert::strDatetimeToDate('22/01/2021 00:00:00'),
        ]);

        DB::table('newss')->insert([
            'id' => 2,
            'name' => 'Kerja sama antara PT. Malindo Agrotek Perkasa dan PT. Tani Fund Madani Indonesia',
            'description' => 'Grid.ID - Bertempat di Ruang Victory 1, Hotel Ciputra Jakarta, pada Senin 30 November 2020, TaniFund (PT Tani Fund Madani Indonesia) dan Malindo (PT Malindo Agrotek Perkasa) bersama-sama menandatangani Perjanjian Kerja Sama dalam penyediaan peralatan dan perlengkapan pertanian, seperti pupuk, pestisida, dan peralatan pertanian bagi para petani binaan TaniFund',
            'image' => 'news/tani1.jpeg',
            'link' => '',
            'date' => Convert::strDatetimeToDate('04/12/2020 00:00:00'),
        ]);

        DB::table('newss')->insert([
            'id' => 3,
            'name' => 'Kerja sama antara PT. Malindo Agrotek Perkasa dan PT. Tani Fund Madani Indonesia',
            'description' => 'Grid.ID - Bertempat di Ruang Victory 1, Hotel Ciputra Jakarta, pada Senin 30 November 2020, TaniFund (PT Tani Fund Madani Indonesia) dan Malindo (PT Malindo Agrotek Perkasa) bersama-sama menandatangani Perjanjian Kerja Sama dalam penyediaan peralatan dan perlengkapan pertanian, seperti pupuk, pestisida, dan peralatan pertanian bagi para petani binaan TaniFund',
            'image' => 'news/tani2.jpeg',
            'link' => '',
            'date' => Convert::strDatetimeToDate('15/08/2020 00:00:00'),
        ]);

    } //end method
} //end class
