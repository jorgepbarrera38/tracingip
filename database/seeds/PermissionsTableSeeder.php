<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos ip
        Permission::create([
            'name' => 'Navegar direcciónes ip',
            'slug' => 'ip.index',
            'description' => 'Lista y navega todas las IP asignadas'
        ]);
        Permission::create([
            'name' => 'Asignar direcciónes ip',
            'slug' => 'ip.create',
            'description' => 'Asigna IP'
        ]);
        Permission::create([
            'name' => 'Editar direcciónes ip',
            'slug' => 'ip.edit',
            'description' => 'Edita IP'
        ]);
        Permission::create([
            'name' => 'Eliminar direcciónes ip',
            'slug' => 'ip.destroy',
            'description' => 'Elimina IP asignadas'
        ]);
        //Permisos para módulo funcionario
        Permission::create([
            'name' => 'Ver funcionarios',
            'slug' => 'funcionaries.index',
            'description' => 'Lista y navega todos los funcionarios'
        ]);
        Permission::create([
            'name' => 'Crear funcionarios',
            'slug' => 'funcionaries.create',
            'description' => 'Crea funcionarios'
        ]);
        Permission::create([
            'name' => 'Eliminar funcionarios',
            'slug' => 'funcionaries.destroy',
            'description' => 'Elimina funcionarios'
        ]);
        //Permisos para módulo ubicaiones
        Permission::create([
            'name' => 'Ver ubicaciónes',
            'slug' => 'ubications.index',
            'description' => 'Lista y navega todas las ubicaciónes'
        ]);
        Permission::create([
            'name' => 'Crear ubicaciónes',
            'slug' => 'ubications.create',
            'description' => 'Crea ubicaciónes'
        ]);
        Permission::create([
            'name' => 'Eliminar ubicaciónes',
            'slug' => 'ubications.destroy',
            'description' => 'Elimina ubicaciónes'
        ]);
        //Permisos para módulo dependencias
        Permission::create([
            'name' => 'Ver dependencias',
            'slug' => 'dependences.index',
            'description' => 'Lista y navega todas las dependencias'
        ]);
        Permission::create([
            'name' => 'Crear dependencias',
            'slug' => 'dependences.create',
            'description' => 'Crea dependencias'
        ]);
        Permission::create([
            'name' => 'Eliminar dependencias',
            'slug' => 'dependences.destroy',
            'description' => 'Elimina dependencias'
        ]);
        //Permisos para módulo Usuarios
        Permission::create([
            'name' => 'Ver usuarios del sistema',
            'slug' => 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema'
        ]);
        Permission::create([
            'name' => 'Crear usuarios del sistema',
            'slug' => 'users.create',
            'description' => 'Crea usuarios del sistema'
        ]);
        Permission::create([
            'name' => 'Ver un usuario del sistema',
            'slug' => 'users.show',
            'description' => 'Ve un usuario del sistema'
        ]);
        Permission::create([
            'name' => 'Editar un usuario del sistema',
            'slug' => 'users.edit',
            'description' => 'Edita un usuario del sistema'
        ]);
    }
}
