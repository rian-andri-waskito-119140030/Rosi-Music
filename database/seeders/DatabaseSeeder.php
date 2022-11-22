<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'nama'      => 'Putu Ary Kusuma Yudha',
            'username'  => 'putuary',
            'password'  => Hash::make('password'),
            'avatar'    => 'default.png',
        ]);
    }
}