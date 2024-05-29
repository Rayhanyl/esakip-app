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
            [
                'email' => 'afrizal@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'afrizal',
                'role' => 'perda',
            ],
            [
                'email' => 'argapura_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'argapura_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'banjaran_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'banjaran_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'bantarujeg_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bantarujeg_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'bapenda_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bapenda_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'bappedalitbang_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bappedalitbang_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'bkad_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bkad_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'bkpsdm_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bkpsdm_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'bpbd_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'bpbd_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'cigasong_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'cigasong_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'cikijing_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'cikijing_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'cingambul_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'cingambul_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'dawuan_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dawuan_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'dinkes_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dinkes_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dinsos_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dinsos_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disarpus_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disarpus_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disdik_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disdik_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disdukcapil_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disdukcapil_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dishub_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dishub_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'diskominfo_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'diskominfo_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disnakerkukm_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disnakerkukm_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disparbud_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disparbud_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'disperdagin_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'disperdagin_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dispora_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dispora_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dkp3_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dkp3_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dlh_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dlh_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dp3akb_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dp3akb_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dpmd_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dpmd_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dpmptsp_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dpmptsp_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'dputr_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'dputr_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'inspektorat_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'inspektorat_mjlk',
                'role' => 'inspektorat',
            ],
            [
                'email' => 'jatitujuh_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'jatitujuh_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'jatiwangi_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'jatiwangi_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'kabupaten_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'kabupaten_mjlk',
                'role' => 'pemkab',
            ],
            [
                'email' => 'kadipaten_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'kadipaten_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'kasokandel_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'kasokandel_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'kesbangpol_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'kesbangpol_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'lemahsugih_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'lemahsugih_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'leuwimunding_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'leuwimunding_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'ligung_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'ligung_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'maja_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'maja_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'majalengka_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'majalengka_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'malausma_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'malausma_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'palasah_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'palasah_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'panyingkiran_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'panyingkiran_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'rajagaluh_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'rajagaluh_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'rsud_cideres@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'rsud_cideres',
                'role' => 'perda',
            ],
            [
                'email' => 'rsud_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'rsud_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'rumkimtan_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'rumkimtan_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'satpolpp_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'satpolpp_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'setda_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'setda_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'setwan_mjlk@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'setwan_mjlk',
                'role' => 'perda',
            ],
            [
                'email' => 'sindang_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'sindang_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'sindangwangi_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'sindangwangi_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'sukahaji_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'sukahaji_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'sumberjaya_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'sumberjaya_kec',
                'role' => 'perda',
            ],
            [
                'email' => 'talaga_kec@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'talaga_kec',
                'role' => 'perda',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
