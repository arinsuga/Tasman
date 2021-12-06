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
        DB::table("subdept")->insert([ "id" => 1, "dept_id" => 4, "code" => "ARTPLK", "name" => "", "displayname" => "Pelaksanaan Artwork", "description" => "Pelaksanaan Artwork", "numsort" => 10, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 2, "dept_id" => 5, "code" => "DNBPLK", "name" => "", "displayname" => "Pelaksanaan dan MEP", "description" => "Pelaksanaan dan MEP", "numsort" => 20, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 3, "dept_id" => 9, "code" => "ARS", "name" => "", "displayname" => "Perencanaan Arsitektur", "description" => "Perencanaan Arsitektur", "numsort" => 30, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 4, "dept_id" => 9, "code" => "INT", "name" => "", "displayname" => "Perencanaan Interior", "description" => "Perencanaan Interior", "numsort" => 40, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 5, "dept_id" => 9, "code" => "LGH", "name" => "", "displayname" => "perencanaan Lighting", "description" => "perencanaan Lighting", "numsort" => 50, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 6, "dept_id" => 10, "code" => "IT", "name" => "", "displayname" => "IT Support", "description" => "IT Support", "numsort" => 60, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 7, "dept_id" => 10, "code" => "MKT", "name" => "", "displayname" => "Marketing", "description" => "Marketing", "numsort" => 70, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 8, "dept_id" => 10, "code" => "PS", "name" => "", "displayname" => "Project Support", "description" => "Project Support", "numsort" => 80, "status" => 1, ]); 
        DB::table("subdept")->insert([ "id" => 9, "dept_id" => 10, "code" => "QA", "name" => "", "displayname" => "Quality Assurance", "description" => "Quality Assurance", "numsort" => 90, "status" => 1, ]); 
                

    }
}
