<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        
        DB::table('types')->insert([
            'id' => '1',
            'name' => 'Super-admin',
            'created_at' => \Carbon\Carbon::now(),

        ]);
        DB::table('types')->insert([
            'id' => '2',
            'name' => 'Guest',
            'created_at' => \Carbon\Carbon::now(),

        ]);
    }
}
