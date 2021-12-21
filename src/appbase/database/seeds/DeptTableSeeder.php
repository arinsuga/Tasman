<?php

use Illuminate\Database\Seeder;

class DeptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Table reset
        DB::table("dept")->delete();
        DB::table("dept")->insert([ "id" => 1, "code" => "KOM", "name" => "Komisaris", "displayname" => "Komisaris", "description" => "Komisaris", "numsort" => 10, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 2, "code" => "BOD", "name" => "Board Of Director", "displayname" => "Direksi", "description" => "Direksi", "numsort" => 20, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 3, "code" => "ACCENT", "name" => "Accent", "displayname" => "Accent", "description" => "Accent", "numsort" => 30, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 4, "code" => "ART", "name" => "Artwork", "displayname" => "Artwork", "description" => "Artwork", "numsort" => 40, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 5, "code" => "DNB", "name" => "Disain and Build", "displayname" => "Disain and Build", "description" => "Disain and Build", "numsort" => 50, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 6, "code" => "KEU", "name" => "Direktorat Keuangan", "displayname" => "Direktorat Keuangan", "description" => "Direktorat Keuangan", "numsort" => 60, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 7, "code" => "LEGAL", "name" => "Legal Corporate", "displayname" => "Legal Corporate", "description" => "Legal Corporate", "numsort" => 70, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 8, "code" => "HRGA", "name" => "SDM dan Umum", "displayname" => "SDM dan Umum", "description" => "SDM dan Umum", "numsort" => 80, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 9, "code" => "PRC", "name" => "Perencanaan", "displayname" => "Perencanaan", "description" => "Perencanaan", "numsort" => 90, "status" => 1, ]); 
        DB::table("dept")->insert([ "id" => 10, "code" => "SUP", "name" => "Support", "displayname" => "Support", "description" => "Support", "numsort" => 100, "status" => 1, ]); 
    }
}
