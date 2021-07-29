<?php

use Illuminate\Database\Seeder;

class ProducttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('producttypes')->delete();

        DB::table('producttypes')->insert([
            'id' => 1,
            'name' => 'AGRICULTURE TOOLS',
            'description' => 'Tipe produk agriculture tools',
        ]);

        DB::table('producttypes')->insert([
            'id' => 2,
            'name' => 'CROP PROTECTION',
            'description' => 'Tipe produk crop protection',
        ]);

        DB::table('producttypes')->insert([
            'id' => 3,
            'name' => 'FERTILIZER',
            'description' => 'Tipe produk drone',
        ]);

        DB::table('producttypes')->insert([
            'id' => 4,
            'name' => 'AGRICULTURE DRONE',
            'description' => 'Tipe produk drone',
        ]);

    } //end method
} //end class
