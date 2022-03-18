<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
/*importamos el modelo roles y permisos*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

     /* creacion del los roles*/
     $role1 = Role::create(['name'=>'Admin']); 

     $role2 =  Role::create(['name'=>'User']); 


  


     Permission::create(['name'=>'users.index','description'=> '  Ver Panel de Usarios'])->syncRoles([$role1]);
     Permission::create(['name'=>'users.edit','description'=> 'Editar Rol a usuario'])->syncRoles([$role1]);
     Permission::create(['name'=>'users.update','description'=> 'Asignacionde rol a usuario'])->syncRoles([$role1]);
    









     /*permiso para ver categorias, leer eliminar y editar*/
     Permission::create(['name'=>'categorias.home','description'=> 'Ver panel de Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.store','description'=> 'Almacenar categorías'])->syncRoles([$role1]);
     Permission::create(['name'=>'categorias.edit','description'=> 'Editar Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.update','description'=> 'Actualizar Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.delete','description'=> 'Borrado de Categorías'])->syncRoles([$role1,$role2]);


     /*permisos para la vista de users*/
       // Permission::create(['name'=>'users.home'])->syncRoles([$role1]);




  }
}
