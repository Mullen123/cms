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




     /*permisos para el modulo de usuarios*/
     Permission::create(['name'=>'users.index','description'=> '  Ver Panel de Usarios'])->syncRoles([$role1]);
     Permission::create(['name'=>'users.store','description'=> ' Almacenamiento  de usuario'])->syncRoles([$role1]);
     Permission::create(['name'=>'users.edit','description'=> 'Editar Rol a usuario'])->syncRoles([$role1]);
     Permission::create(['name'=>'users.update','description'=> 'Asignacionde rol a usuario'])->syncRoles([$role1]);

     Permission::create(['name'=>'users.delete','description'=> 'Eliminación de usuario'])->syncRoles([$role1]);


     /*permisos para el modulo de slide*/



     Permission::create(['name'=>'slide.index','description'=> '  Ver Panel de Slide'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'slide.store','description'=> 'Almacenamiento de Slide'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'slide.edit','description'=> 'Editción de Slide'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'slide.update','description'=> 'Actualización de Slide'])->syncRoles([$role1,$role2]);

     Permission::create(['name'=>'slide.delete','description'=> 'Eliminación de slide'])->syncRoles([$role1,$role2]);



     /*permisos para el modulo de roles*/
     Permission::create(['name'=>'roles.index','description'=> 'Ver panel de Roles'])->syncRoles([$role1]);;
     Permission::create(['name'=>'roles.create','description'=> 'Creación de Rol'])->syncRoles([$role1]);;
     Permission::create(['name'=>'roles.store','description'=> 'Almacenamiento de Rol'])->syncRoles([$role1]);;
     Permission::create(['name'=>'roles.edit','description'=> 'Edición de Rol'])->syncRoles([$role1]);
     Permission::create(['name'=>'roles.destroy','description'=> 'Eliminación de Rol'])->syncRoles([$role1]);





     /*permiso para ver categorias, leer eliminar y editar*/
     Permission::create(['name'=>'categorias.home','description'=> 'Ver panel de Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.store','description'=> 'Almacenar categorías'])->syncRoles([$role1]);
     Permission::create(['name'=>'categorias.edit','description'=> 'Editar Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.update','description'=> 'Actualizar Categorías'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'categorias.delete','description'=> 'Borrado de Categorías'])->syncRoles([$role1,$role2]);



     /*permiso para ver excrusiones, leer eliminar y editar*/
     Permission::create(['name'=>'excursiones.index','description'=> 'Ver panel de Excursiones'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'excursiones.store','description'=> 'Almacenar Excursiones '])->syncRoles([$role1]);
     Permission::create(['name'=>'excursiones.edit','description'=> 'Editar Excursiones'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'excursiones.update','description'=> 'Actualizar Excursiones'])->syncRoles([$role1,$role2]);
     Permission::create(['name'=>'excursiones.delete','description'=> 'Borrado de Excursiones'])->syncRoles([$role1,$role2]);






     /*permiso para ver mensajes, leer mensajes*/

     Permission::create(['name'=>'mensajes.home','description'=> 'Ver panel de Mensajes'])->syncRoles([$role1]);
     Permission::create(['name'=>'mensajes.show','description'=> 'Leer mensajes'])->syncRoles([$role1]);
     

 }
}
