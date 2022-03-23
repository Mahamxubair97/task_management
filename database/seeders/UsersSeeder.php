<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
              'name' => 'maham',
              'email' => 'maham@gmail.com',
              'password' => Hash::make('password'),
            ],
            [
              'name' => 'zubair',
              'email' => 'zubair@gmail.com',
              'password' => Hash::make('password'),
            ]
        ];
        
        DB::table('users')->insert($users);
    }
}
