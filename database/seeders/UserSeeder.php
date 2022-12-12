<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'type' => "1",
            'created_at' => \Carbon\Carbon::Now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
            'deleted_at' => Null,

        ]);
    }
}
