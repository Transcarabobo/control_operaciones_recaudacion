<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$model = array(
    				['name'	=> 'Permiso', 'slug' => 'permission'],
    				['name'	=> 'Rol', 'slug' => 'role'],
    				['name'	=> 'Usuario', 'slug' => 'user'],
    				['name'	=> 'Operador', 'slug' => 'operators'],
    				['name'	=> 'Vehiculo', 'slug' => 'vehicle'],
    				['name'	=> 'Ruta', 'slug' => 'route'],
			        ['name'	=> 'Despacho', 'slug' => 'despatch'],
			        ['name'	=> 'Recaudacion', 'slug' => 'collection']
			      );
    	for ($i=0; $i < 8; $i++) { 
    		DB::table('permissions')->insert(
	        	[
					[
			        	'name'			=> 'Crear '.$model[$i]['name'],
			        	'slug'			=> 'create-'.$model[$i]['slug'],
			        	'description'	=> 'Permiso para crear '.str_plural(strtolower($model[$i]['name']))
			        ],
			        [
			        	'name'			=> 'Leer '.$model[$i]['name'],
			        	'slug'			=> 'read-'.$model[$i]['slug'],
			        	'description'	=> 'Permiso para ver informacion de los '.str_plural(strtolower($model[$i]['name']))
			        ],
			        [
			        	'name'			=> 'Editar '.$model[$i]['name'],
			        	'slug'			=> 'update-'.$model[$i]['slug'],
			        	'description'	=> 'Permiso para actualizar informacion de los '.str_plural(strtolower($model[$i]['name']))
			        ],
			    	[
			        	'name'			=> 'Borrar '.$model[$i]['name'],
			        	'slug'			=> 'delete-'.$model[$i]['slug'],
			        	'description'	=> 'Permiso para eliminar '.str_plural(strtolower($model[$i]['name']))
			        ]
				]
	        );
    	}
        
    }
}
