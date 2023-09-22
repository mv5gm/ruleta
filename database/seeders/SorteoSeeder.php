<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sorteo;

class SorteoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filas = [
            [
            	'hora' => '09:00:00'
        	],
        	[
            	'hora' => '10:00:00'
        	],
        	[
            	'hora' => '11:00:00'
        	],
        	[
            	'hora' => '12:00:00'
        	],
        	[
            	'hora' => '13:00:00'
        	],
        	[
            	'hora' => '14:00:00'
        	],
        	[
            	'hora' => '15:00:00'
        	],
        	[
            	'hora' => '16:00:00'
        	],
        	[
            	'hora' => '17:00:00'
        	],
        	[
            	'hora' => '18:00:00'
        	],
        ];	

        foreach ($filas as $fila){
	        Sorteo::create($fila);
        }
    }
}
