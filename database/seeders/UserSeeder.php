<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidRECIB EXTRAORD FEBRERO 2022.xlsx
     */
    public function run()
    {

User::create([
  'name' => 'Andres Mullen',
            'email' => 'prueba@email.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
        
        User::factory(25)->create();
    }
}
