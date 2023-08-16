<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        //Admin
            [
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'shahzodrashidov0307@gmail.com',
                'password'=>Hash::make(11111111),
                'role'=>'admin',
                'status'=>'active',
            ],
            //Agent
            [
                'name'=>'Agent',
                'username'=>'agent',
                'email'=>'agent@gmail.com',
                'password'=>Hash::make(11111111),
                'role'=>'agent',
                'status'=>'active',
            ],
            //User
            [
                'name'=>'User',
                'username'=>'user',
                'email'=>'user@gmail.com',
                'password'=>Hash::make(11111111),
                'role'=>'user',
                'status'=>'active',
            ],
        ]);
    }
}
