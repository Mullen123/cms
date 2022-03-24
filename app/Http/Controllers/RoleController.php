<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*traemos el modelo de roles y permisos*/
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission;
use Illuminate\Pagination\Paginator; 


class RoleController extends Controller
{


    public function __construct(){

        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create');
        $this->middleware('can:roles.store')->only('store');
        $this->middleware('can:roles.edit')->only('edit');
        $this->middleware('can:roles.destroy')->only('destroy');


    }


    public function index()


    {
        $roles = Role::all();
        return view('modulos.roles.roles',compact('roles'));
    }

    

    public function create()
    {

     $permissions = Permission::all();
     return view('modulos.roles.roles-create',compact('permissions')); 
 }


 public function store(Request $request)
 {

   $role = Role::create(['name' => $request->name]);


   /*sinconizamos permisos con el rol*/
   $role->permissions()->sync($request->permisos);

   return redirect()->route('roles.index',compact('role'));
}




public function edit($id)
{

      $role = Role::find($id);//encontramos el id
      $permissions = Permission::get();//traemos todos los permisos
      $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
      ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
      ->all();/*consulta la cual te devuelve que permisos estan asignados al rol seleccionado*/

        //$permissions = Permission::all();
        //dd($rolePermissions);
      return view('modulos.roles.edit-role',compact('role','permissions','rolePermissions'));
  }


  public function update(Request $request, $id)
  {
   $role = Role::find($id);
   $role->name = $request->input('name');
   $role->name;
   $role->save();
   /*sinconizamos permisos con el rol*/
   $role->permissions()->sync($request->permisions);
   return redirect()->route('roles.index');  

}


public function destroy($id)
{
    DB::delete('delete from roles where id= '.$id);
    return redirect()->route('roles.index');  
}
}
