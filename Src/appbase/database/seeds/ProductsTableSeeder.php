<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('products')->delete();

        DB::table('products')->insert([
            'id' => 1,
            'producttype_id' => 1,
            'name' => 'SPRAYER 1',
            'description' => 'Alat penyemprot tanaman',
            'image' => 'products/sprayer.jpg',
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'producttype_id' => 1,
            'name' => 'HERBICIDES 1',
            'description' => 'Obat pembasmi hama',
            'image' => 'products/herbicides.jpg',
        ]);


        DB::table('products')->insert([
            'id' => 3,
            'producttype_id' => 2,
            'name' => 'SPRAYER 2',
            'description' => 'Alat penyemprot tanaman tipe 2',
            'image' => 'products/sprayer.jpg',
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'producttype_id' => 2,
            'name' => 'HERBICIDES 2',
            'description' => 'Obat pembasmi hama tipe 2',
            'image' => 'products/herbicides.jpg',
        ]);

        DB::table('products')->insert([
            'id' => 5,
            'producttype_id' => 3,
            'name' => 'Drone 1',
            'description' => 'Produk drone andalan 1',
            'image' => 'products/drone1.png',
        ]);

        DB::table('products')->insert([
            'id' => 6,
            'producttype_id' => 3,
            'name' => 'Drone 21',
            'description' => 'Produk drone andalan 1',
            'image' => 'products/drone2.png',
        ]);

        
    } //end method
} //end class
