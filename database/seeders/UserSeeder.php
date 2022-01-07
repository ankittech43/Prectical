<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name']="Admin";
        $data['email']="admin@admin.com";
        $data['password']=Hash::make("");
       DB::table('users')->insert($data);
    }
}
