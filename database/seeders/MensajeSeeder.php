<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensaje;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Mensaje::create([
            'name' => 'Andres Mullen',
            'email' => 'prueba@email.com',
            'message' =>'qui dolorem ipsum, quia dolor sit amet consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem' 
        ]);
            Mensaje::factory(25)->create();
    
    }
    
}
