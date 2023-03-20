<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Klient', 'isEmployee' => false],
            ['name' => 'Pracownik', 'isEmployee' => true],
            ['name' => 'Manager', 'isEmployee' => true],
            ['name' => 'Admin', 'isEmployee' => true],
        ]);
    }
}
