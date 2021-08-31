<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset table
        DB::table('users')->delete();

        //Super Admin
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'bo' => true,
        ]);

        //Post Admin
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Post Admin',
            'email' => 'postadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'bo' => true,
        ]);

        //Report Admin
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Report Admin',
            'email' => 'reportadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
            'bo' => true,
        ]);

        //guest 1
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Guest 1',
            'email' => 'guest1@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        //guest 2
        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Guest 2',
            'email' => 'guest2@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        //dummy data
        //factory(App\User::class, 1000)->create();

    }
}
