<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Consurv',
            'email' => 'admin@consurv.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'),
            'created_at' => now(),
            'updated_at' => now()
            // 'remember_token' => rememberToken()
            // 'remember_token' => Hash::make('consurv')
            // 'remember_token' =>rememberToken()
        ]);
    }
}
