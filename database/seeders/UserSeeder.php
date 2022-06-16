<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userSuperAdmin = User::create([
            'name' => 'Admin',
            'username' => 'CentroAdultosAdmin',
            'password' => bcrypt('CenAd_adul2126'),
        ]);
        $userSuperAdmin->assignRole('super_admin');

    }
}
