<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*traemos el modelo de roles y permisos*/
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission; 


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {

      $roles = Role::all();
      return view('modulos.roles.roles',compact('roles'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $permissions = Permission::all();
       return view('modulos.roles.roles-create',compact('permissions')); 
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             //$roles = $request->all();


         //dd($roles);


         $role = Role::create(['name' => $request->name]);






          /*sinconizamos permisos con el rol*/
               $role->permissions()->sync($request->permisos);


           return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('modulos.roles.roles-show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
       return view('modulos.roles.roles-edit',compact('role'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        return "hola";
    }
}
