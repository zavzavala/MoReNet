<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class tipo_empresa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_empresas')->delete();

        \DB::table('tipo_empresas')->insert([
            'id'=>1,
            'tipo'=>'Instituições de Ensino Superior Públicas',
            'created_at'=>\Carbon\Carbon::now()

        ]);

        \DB::table('tipo_empresas')->insert([
            'id'=>2,
            'tipo'=>'Instituições de Ensino Superior Privadas',
            'created_at'=>\Carbon\Carbon::now()

        ]);

        \DB::table('tipo_empresas')->insert([
            'id'=>3,
            'tipo'=>'Instituições de Investigação',
            'created_at'=>\Carbon\Carbon::now()

        ]);

        \DB::table('tipo_empresas')->insert([
            'id'=>4,
            'tipo'=>'Instituições de Ensino Secundário',
            'created_at'=>\Carbon\Carbon::now()

        ]);

        \DB::table('tipo_empresas')->insert([
            'id'=>5,
            'tipo'=>'Instituições Tuteladas',
            'created_at'=>\Carbon\Carbon::now()

        ]);

        \DB::table('tipo_empresas')->insert([
            'id'=>6,
            'tipo'=>'TVET',
            'created_at'=>\Carbon\Carbon::now()

        ]);
    }
}





