<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'First name 1',
            'last_name' => 'Last name 1',
            'phone' => '0955555555',
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'First name 2',
            'last_name' => 'Last name 2',
            'phone' => '0955514555',
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'First name 3',
            'last_name' => 'Last name 3',
            'phone' => '0956894315',
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
