<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;


use DataTables;
use Validator;




class CategoriasController extends   Controller
{



    

    public function index(Request $request)
    {

        if($request->ajax()){


            /*obtencion de los datos que se quieren mostrar en la base de datos*/

            $categorias =  Categorias::select('id','name')->get();

            return Datatables::of($categorias)
            ->addColumn('action', function($row){
              return '<div class="btn-group" >
              <a type="button" class="btn-floating light-blue waves-effect waves-light" id="editUserBtn" data-id="'.$row['id'].'">
              <i class="fas fa-pencil-alt" style="color:#00c851;"></i></a>&nbsp;&nbsp;
              <a type="button" class="btn-floating light-blue waves-effect waves-light"  id="deleteUserBtn"  data-id="'.$row['id'].'"><i class="fa fa-trash" style="color:#ff3547;"></i></a>
              </div>';

          })
            ->rawColumns(['action'])
            ->make(true);


        }

        return view('modulos.categorias.categories');
    }


    public function store(Request $request)
    {


     if($request->ajax()){


        try {


         $category = $request->all();



         $resultado =DB::table('categorias')->where('name', $category)->exists();

         if($resultado){

          return response()->json(['status'=>2,'error'=>'Categoria  repetida']);

      }else{

        Categorias::create($category); 
        return response()->json(['status'=>1,'success'=>'Category saved successfully.']);
    }

} catch (Exception $e) {
 return response()->json(['status'=>0,'error'=>'Error']);
}


}


}



public function edit(Request $request)
{

    $id = $request->id;
    $categoriaDetails = Categorias::find($id);
    return response()->json(['details'=>$categoriaDetails]);


}



public function update(Request $request){





   $category_id = $request->cid;

   $category = Categorias::find($category_id);
   $category->name= $request->name2;

   $resultado =DB::table('categorias')->where('name', $category->name)->exists();       
   if($resultado){
     return response()->json(['code'=>2, 'msg'=>'Country Details have Been updated']); 
 }else{
    $query = $category->save();

    if($query){
        return response()->json(['code'=>1, 'msg'=>'Country Details have Been updated']);  
    }




    



}        



}



public function delete(Request $request)
{

    if($request->ajax()){
      $category_id = $request->id;
      try {


       $query = Categorias::find($category_id)->delete(); 
       return response()->json(['code'=>1,'success'=>'Deleted successfully.']);

   } catch (Exception $e) {
      return response()->json(['code'=>0,'error'=>'No se pudo borrar el elemento.']);
  }


}


}


}