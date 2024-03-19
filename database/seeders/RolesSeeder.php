<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name_rol'=>'Administrador',
            ],

            [
                'name_rol'=>'Recepcionista',
            ],

            [
                'name_rol'=>'Mesero',
            ],

            [
                'name_rol'=>'RoomService',
            ],

            [
                'name_rol'=>'Cliente',
            ],
            ];
            DB::table('roles')->insert($data);
        }
}
