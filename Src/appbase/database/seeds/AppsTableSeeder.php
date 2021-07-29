<?php

use Illuminate\Database\Seeder;

class AppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset table
        DB::table('apps')->delete();

        //cms
        DB::table('apps')->insert([
            'id' => 1,
            'code' => 'cms',
            'name' => 'Content Management System',
            'description' => 'Content Management System for Website Management',
        ]);
    } //end method
} //end classs
