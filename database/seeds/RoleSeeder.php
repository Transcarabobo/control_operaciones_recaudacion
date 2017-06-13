<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = array(
    				['name'	=> 'Administrador', 'slug' => 'administrator'],
    				['name'	=> 'Operaciones', 'slug' => 'operations'],
    				['name'	=> 'Recaudacion', 'slug' => 'collections']
    			);

    	for ($i=0; $i < 3; $i++) {
	        DB::table('roles')->insert(
	        	[
					[
			        	'name'		=> $role[$i]['name'],
			        	'slug'		=> $role[$i]['slug'],
			        	'description'	=> 'Acceso al modulo de '.strtolower($role[$i]['name'])
			        ]
				]
	        );

	        if ($i == 0) {
	        	for ($j=1; $j < 33; $j++) { 
	        		DB::table('permission_role')->insert(
			        	[
						    'permission_id'	=> $j,
						    'role_id'		=> $i+1
						]
			        );
	        	}
	        } elseif ($i == 1) {
	        	for ($j=13; $j < 29; $j++) { 
	        		DB::table('permission_role')->insert(
			        	[
						    'permission_id'	=> $j,
						    'role_id'		=> $i+1
						]
			        );
	        	}
	        } else {
	        	for ($j=29; $j < 33; $j++) { 
	        		DB::table('permission_role')->insert(
			        	[
						    'permission_id'	=> $j,
						    'role_id'		=> $i+1
						]
			        );
	        	}
	        }
	     }
    }
}
