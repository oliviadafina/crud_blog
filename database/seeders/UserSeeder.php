<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'role'      => 'Administrator',
            'password'  => Hash::make('admin')
        ]);
        User::create([
            'name'      => 'Olivia Keren Dafina',
            'email'     => 'oliviakeren@gmail.com',
            'role'      => 'Operator',
            'password'  => bcrypt('olivia123')
        ]);
        User::create([
            'name'      => 'Annisa Amelia',
            'email'     => 'annisamel@gmail.com',
            'role'      => 'User',
            'password'  => bcrypt('annisa123')
        ]);
        User::create([
            'name'      => 'Fathikah Abelina',
            'email'     => 'patikabel@gmail.com',
            'role'      => 'User',
            'password'  => bcrypt('abel123')
        ]);
        User::create([
            'name'      => 'Rika Hana',
            'email'     => 'tiwiono@gmail.com',
            'role'      => 'User',
            'password'  => bcrypt('rika123')
        ]);
    }
}
