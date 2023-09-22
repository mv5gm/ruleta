<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animalito;

class AnimalitoSeeder extends Seeder
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
            	'nombre' => 'Ballena',
            	'numero' => '00',
            	'imagen' => 'ballena.jpg'
        	],
        	[
            	'nombre' => 'Delfin',
            	'numero' => '0',
            	'imagen' => 'delfin.jpeg'
        	],
        	[
            	'nombre' => 'Carnero',
            	'numero' => '01',
            	'imagen' => 'carnero.png'
        	],
        	[
            	'nombre' => 'Toro',
            	'numero' => '02',
            	'imagen' => 'toro.jpeg'
        	],
        	[
            	'nombre' => 'Ciempies',
            	'numero' => '03',
            	'imagen' => 'ciempies.png'
        	],
        	[
            	'nombre' => 'Alacran',
            	'numero' => '04',
            	'imagen' => 'alacran.jpg'
        	],
        	[
            	'nombre' => 'Leon',
            	'numero' => '05',
            	'imagen' => 'leon.jpeg'
        	],
        	[
            	'nombre' => 'Rana',
            	'numero' => '06',
            	'imagen' => 'rana.jpeg'
        	],
        	[
            	'nombre' => 'Perico',
            	'numero' => '07',
            	'imagen' => 'perico.jpg'
        	],
        	[
            	'nombre' => 'Raton',
            	'numero' => '08',
            	'imagen' => 'raton.jpeg'
        	],
        	[
            	'nombre' => 'Aguila',
            	'numero' => '09',
            	'imagen' => 'aguila.jpeg'
        	],
        	[
            	'nombre' => 'Tigre',
            	'numero' => '10',
            	'imagen' => 'tigre.jpg'
        	],
        	[
            	'nombre' => 'Gato',
            	'numero' => '11',
            	'imagen' => 'gato.png'
        	],
        	[
            	'nombre' => 'Caballo',
            	'numero' => '12',
            	'imagen' => 'caballo.jpg'
        	],
        	[
            	'nombre' => 'Mono',
            	'numero' => '13',
            	'imagen' => 'mono.png'
        	],
        	[
            	'nombre' => 'Paloma',
            	'numero' => '14',
            	'imagen' => 'paloma.jpeg'
        	],
        	[
            	'nombre' => 'Zorro',
            	'numero' => '15',
            	'imagen' => 'zorro.jpeg'
        	],
        	[
            	'nombre' => 'Oso',
            	'numero' => '16',
            	'imagen' => 'oso.jpeg'
        	],
        	[
            	'nombre' => 'Pavo',
            	'numero' => '17',
            	'imagen' => 'pavo.jpg'
        	],
        	[
            	'nombre' => 'Burro',
            	'numero' => '18',
            	'imagen' => 'burro.jpg'
        	],
        	[
            	'nombre' => 'Chivo',
            	'numero' => '19',
            	'imagen' => 'chivo.jpg'
        	],
        	[
            	'nombre' => 'Cochino',
            	'numero' => '20',
            	'imagen' => 'cochino.jpeg'
        	],
        	[
            	'nombre' => 'Gallo',
            	'numero' => '21',
            	'imagen' => 'gallo.jpeg'
        	],
        	[
            	'nombre' => 'Camello',
            	'numero' => '22',
            	'imagen' => 'camello.jpg'
        	],
        	[
            	'nombre' => 'Cebra',
            	'numero' => '23',
            	'imagen' => 'cebra.jpeg'
        	],
        	[
            	'nombre' => 'Iguana',
            	'numero' => '24',
            	'imagen' => 'iguana.jpg'
        	],
        	[
            	'nombre' => 'Gallina',
            	'numero' => '25',
            	'imagen' => 'gallina.jpeg'
        	],
        	[
            	'nombre' => 'Vaca',
            	'numero' => '26',
            	'imagen' => 'vaca.jpg'
        	],
        	[
            	'nombre' => 'Perro',
            	'numero' => '27',
            	'imagen' => 'perro.jpg'
        	],
        	[
            	'nombre' => 'Zamuro',
            	'numero' => '28',
            	'imagen' => 'zamuro.webp'
        	],
        	[
            	'nombre' => 'Elefante',
            	'numero' => '29',
            	'imagen' => 'elefante.jpg'
        	],
        	[
            	'nombre' => 'Caiman',
            	'numero' => '30',
            	'imagen' => 'caiman.jpg'
        	],
        	[
            	'nombre' => 'Lapa',
            	'numero' => '31',
            	'imagen' => 'lapa.jpg'
        	],
        	[
            	'nombre' => 'Ardilla',
            	'numero' => '32',
            	'imagen' => 'ardilla.jpg'
        	],
        	[
            	'nombre' => 'Pescado',
            	'numero' => '33',
            	'imagen' => 'pescado.webp'
        	],
        	[
            	'nombre' => 'Venado',
            	'numero' => '34',
            	'imagen' => 'venado.png'
        	],
        	[
            	'nombre' => 'Jirafa',
            	'numero' => '35',
            	'imagen' => 'jirafa.jpeg'
        	],
        	[
            	'nombre' => 'Culebra',
            	'numero' => '36',
            	'imagen' => 'culebra.jpg'
        	]
        ];	

        foreach ($filas as $fila){
	        Animalito::create($fila);
        }
    }
}
