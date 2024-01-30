<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moths')->delete();

        DB::table('moths')->insert([
             'id' => '1',
             'mes' => 'Janeiro',
             'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('moths')->insert([
            'id' => '2',
            'mes' => 'Fevereiro',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('moths')->insert([
            'id' => '3',
            'mes' => 'Março',
            'created_at' => \Carbon\Carbon::now(),
       ]);
       DB::table('moths')->insert([
        'id' => '4',
        'mes' => 'Abril',
        'created_at' => \Carbon\Carbon::now(),
        ]);
        \DB::table('moths')->insert([
            'id' => '5',
            'mes' => 'Maio',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        
        DB::table('moths')->insert([
            'id' => '6',
            'mes' => 'Junho',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('moths')->insert([
            'id' => '7',
            'mes' => 'Julho',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('moths')->insert([
            'id' => '8',
            'mes' => 'Agosto',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('moths')->insert([
            'id' => '9',
            'mes' => 'Setembro',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('moths')->insert([
        'id' => '10',
        'mes' => 'Outubro',
        'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('moths')->insert([
            'id' => '11',
            'mes' => 'Novembro',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('moths')->insert([
        'id' => '12',
        'mes' => 'Dezembro',
        'created_at' => \Carbon\Carbon::now(),
        ]);


    }
}
