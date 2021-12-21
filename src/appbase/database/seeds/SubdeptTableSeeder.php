<?php

use Illuminate\Database\Seeder;

class SubdeptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Table reset
        DB::table("subdept")->delete();
        DB::table("subdept")->insert([ "id" => 1, "dept_id" => 1, "code" => "KOM", "name" => "Komisaris", "displayname" => "Komisaris", "description" => "Komisaris", "numsort" => 10, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 2, "dept_id" => 2, "code" => "BOD", "name" => "Board Of Director", "displayname" => "Direksi", "description" => "Direksi", "numsort" => 11, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 3, "dept_id" => 3, "code" => "ACCENT", "name" => "Accent", "displayname" => "Accent", "description" => "Accent", "numsort" => 12, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 4, "dept_id" => 4, "code" => "ARTPLK", "name" => "Pelaksanaan Artwork", "displayname" => "Pelaksanaan Artwork", "description" => "Pelaksanaan Artwork", "numsort" => 13, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 5, "dept_id" => 5, "code" => "DNBPLK", "name" => "Pelaksanaan dan MEP", "displayname" => "Pelaksanaan dan MEP", "description" => "Pelaksanaan dan MEP", "numsort" => 14, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 6, "dept_id" => 6, "code" => "KEU", "name" => "Direktorat Keuangan", "displayname" => "Direktorat Keuangan", "description" => "Direktorat Keuangan", "numsort" => 15, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 7, "dept_id" => 7, "code" => "LEGAL", "name" => "Legal Corporate", "displayname" => "Legal Corporate", "description" => "Legal Corporate", "numsort" => 16, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 8, "dept_id" => 8, "code" => "HRGA", "name" => "SDM dan Umum", "displayname" => "SDM dan Umum", "description" => "SDM dan Umum", "numsort" => 17, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 9, "dept_id" => 9, "code" => "ARS", "name" => "Perencanaan Arsitektur", "displayname" => "Perencanaan Arsitektur", "description" => "Perencanaan Arsitektur", "numsort" => 18, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 10, "dept_id" => 9, "code" => "INT", "name" => "Perencanaan Interior", "displayname" => "Perencanaan Interior", "description" => "Perencanaan Interior", "numsort" => 19, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 11, "dept_id" => 9, "code" => "LGH", "name" => "perencanaan Lighting", "displayname" => "perencanaan Lighting", "description" => "perencanaan Lighting", "numsort" => 20, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 12, "dept_id" => 10, "code" => "IT", "name" => "IT Support", "displayname" => "IT Support", "description" => "IT Support", "numsort" => 21, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 13, "dept_id" => 10, "code" => "MKT", "name" => "Marketing", "displayname" => "Marketing", "description" => "Marketing", "numsort" => 22, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 14, "dept_id" => 10, "code" => "PS", "name" => "Project Support", "displayname" => "Project Support", "description" => "Project Support", "numsort" => 23, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 15, "dept_id" => 10, "code" => "QA", "name" => "Quality Assurance", "displayname" => "Quality Assurance", "description" => "Quality Assurance", "numsort" => 24, "status" => 1, ]); 
                                

    }
}
