<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=>'admin',
            'nama'=>'Dio',
            'alamat'=>'xxx',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'jenis'=>'admin'
        ]);
    }
}
