<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loteria;

class LoteriaSeeder extends Seeder
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
            	'nombre' => 'Lotto activo'
        	],
        	[
            	'nombre' => 'Granjita'
        	]
        ];	

        foreach ($filas as $fila){
	        Loteria::create($fila);
        }
    }
}
