<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'username' => 'developer',
            'password' => Hash::make('Test@Password123#'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
