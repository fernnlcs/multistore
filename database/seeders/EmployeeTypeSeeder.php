<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees_types')->insert([
            [
                'id' => 1,
                'created_by' => 1,
                'name' => 'Proprietário(a)',
                'slug' => 'proprietario',
            ],
            [
                'id' => 2,
                'created_by' => 1,
                'name' => 'Gerente',
                'slug' => 'gerente',
            ],
            [
                'id'=> 3,
                'created_by' => 1,
                'name' => 'Vendedor(a)',
                'slug' => 'vendedor',
            ],
            [
                'id' => 4,
                'created_by' => 1,
                'name' => 'Consultor(a)',
                'slug' => 'consultor',
            ]
        ]);
    }
}
