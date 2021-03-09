<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'first_name' => 'super',
          'Last_name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('password'),
          'phone_number' => '+91 1234567890',
          'website' => 'https://www.goodfirmz.com/',
          'status' => 1
        ]);
    }
}
