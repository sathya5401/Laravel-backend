<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            ],
            [
                'name' => 'Normal User',
                'email' => 'normaluser@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ],
        );
    }
}
