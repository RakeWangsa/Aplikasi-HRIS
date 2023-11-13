<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'      => 'Auliya Putri',
            'email'     => 'aul@gmail.com',
            'password'  => bcrypt('12345'),
            'level'     => 'karyawan'
        ]);

        User::create([
            'name'      => 'CEO',
            'email'     => 'ceo@gmail.com',
            'password'  => bcrypt('12345'),
            'level'     => 'executive'
        ]);

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345'),
            'level'     => 'admin'
        ]);
    }
}
