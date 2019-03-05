<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => Str::random(10),
            'uuid' => \Webpatser\Uuid\Uuid::generate(),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'username' => Str::random(10),
            'uuid' => \Webpatser\Uuid\Uuid::generate(),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
