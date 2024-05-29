<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email'             => 'superadmin@gmail.com',
                'password'          => Hash::make('qwerty'),
                'name'              => 'Super Admin',
                'role'              => 'superadmin',
            ],
            [
                'email'             => 'admin@gmail.com',
                'password'          => Hash::make('qwerty'),
                'name'              => 'User Admin',
                'role'              => 'admin',
            ],
            [
                'email'             => 'perda@gmail.com',
                'password'          => Hash::make('qwerty'),
                'name'              => 'Perangkat Daerah',
                'role'              => 'perda',
            ],
            [
                'email'             => 'pemkab@gmail.com',
                'password'          => Hash::make('qwerty'),
                'name'              => 'User Pemkab',
                'role'              => 'pemkab',
            ],
            [
                'email'             => 'inspektorat@gmail.com',
                'password'          => Hash::make('qwerty'),
                'name'              => 'User Inspektorat',
                'role'              => 'inspektorat',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
