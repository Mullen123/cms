<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

/*traemos el modelo de roles*/
use Spatie\Permission\Models\Role; 
use App\Models\User;
use DataTables;
use Validator;


class UsersController extends Controller
{


    public function index(Request $request)
    {
     


        $users = User::get();

        return view('modulos.usuarios.home-user',compact('users'));
    }

    

    public function store(Request $request)
    {

       if($request->ajax()){

           try {


             $user = new User();
             
             $user->name= $request->name;
             $user->email= $request->email;
             $user->password= bcrypt($request->password);
             
             $resultado =DB::table('users')->where('email',$user->email)->exists(); 

             if($resultado){

                return response()->json(['status'=>2,'error'=>'Existing user']);

            }else{

                $user->save();
                return response()->json(['status'=>1,'success'=>'User saved successfully.']);

            }
        } catch (Exception $e) {

           return response()->json(['status'=>0,'error'=>'Error']);

       }

   }
}


public function edit(User $user)
{

    /*recuperamos el listado de roles*/
    $roles = Role::all();
    //dd($roles);

    return  view('modulos.usuarios.editar-user',compact('user','roles'));


}


public function update(Request $request,User $user)
{
   /*el sync se encargara de ingresar registros en la tabla intermedia de usuario roles la cual se llama model_has_roles*/
   $user->roles()->sync($request->roles);

   return redirect()->route('users.edit',$user)->with('info' , 'Rol Asignado correctamente');

}


public function destroy(Request $request)
{


    if($request->ajax()){
      $user_id = $request->id;
      
      
      try {


         $query = User::find($user_id)->delete(); 

         return response()->json(['code'=>1,'success'=>'Deleted successfully.']);

     } catch (Exception $e) {
      return response()->json(['code'=>0,'error'=>'No se pudo borrar el elemento.']);
  }


}

}




}
