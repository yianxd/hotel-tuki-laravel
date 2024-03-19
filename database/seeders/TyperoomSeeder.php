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
                'id_type'=>'1',
                'name'=>'Habitacion Individual',
                'description'=>'',
            ],

            [
                'id_type'=>'2',
                'name'=>'Habitacion Doble',
                'description'=>'',
            ],

            [
                'id_type'=>'3',
                'name'=>'Suite',
                'description'=>'',
            ]
            ];
            DB::table('type_rooms')->insert($data);
        }
}
