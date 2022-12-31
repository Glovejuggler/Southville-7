<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Glovejuggler',
            'email' => 'aelizaga77@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Roles
        DB::table('roles')->insert([
            [
                'position' => 'Chairman'
            ],
            [
                'position' => 'Vice Chairman'
            ],
            [
                'position' => 'Secretary'
            ],
            [
                'position' => 'Treasurer'
            ]
        ]);

        // Loan services
        DB::table('loanables')->insert([
            [
                'type' => 'Cash',
                'name' => '3000 pesos',
                'equivalent' => 3000,
                'requirement' => 2000,
            ],
            [
                'type' => 'Cash',
                'name' => '4500 pesos',
                'equivalent' => 4500,
                'requirement' => 3000,
            ],
            [
                'type' => 'Cash',
                'name' => '6000 pesos',
                'equivalent' => 6000,
                'requirement' => 4000,
            ],
            [
                'type' => 'Goods',
                'name' => '1 sack of rice',
                'equivalent' => 500,
                'requirement' => 500,
            ],
        ]);

        
    }
}
