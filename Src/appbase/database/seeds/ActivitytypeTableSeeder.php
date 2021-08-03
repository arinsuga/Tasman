<?php

use Illuminate\Database\Seeder;

class ActivitytypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('activitytype')->delete();

        DB::table('activitytype')->insert([
            'id' => 1,
            'name' => 'SUPPORT',
            'description' => 'Support Hardware, Software/Aplikasi, Jaringan, Troubleshoot, Request User',
        ]);

        DB::table('activitytype')->insert([
            'id' => 2,
            'name' => 'MAINTENANCE',
            'description' => 'Perawatan Hardware, Software/Aplikasi dan Jaringan',
        ]);

        DB::table('activitytype')->insert([
            'id' => 3,
            'name' => 'PROJECT',
            'description' => 'Project Hardware, Software/Aplikasi dan Networking',
        ]);

    } //end method
} //end class
