<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         [
           'name' => 'admin',
           'email' => 'admin@example.com',
           'password' => '123456',
           'remember_token' => '123456'
         ]
        ]);
    }
}
