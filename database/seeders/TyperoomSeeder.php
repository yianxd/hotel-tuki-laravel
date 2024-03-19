<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TyperoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data=[
            [
                'name'=>'Habitacion Individual',
                'description'=>'Tu refugio personal, perfecto para una experiencia tranquila y confortable.',
            ],

            [
                'name'=>'Habitacion Doble',
                'description'=>'Comparte momentos especiales con tu pareja o amigo en un ambiente acogedor y relajante.',
            ],

            [
                'name'=>'Suite',
                'description'=>'Sumérgete en el lujo y la comodidad con nuestra suite exclusiva, donde cada detalle está diseñado para tu deleite absoluto.',
            ]
            ];
            DB::table('type_rooms')->insert($data);
        }
}
