<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)


    {

     if($request->ajax()){

        /*obtencion de los datos que se quieren mostrar en la base de datos*/

        $excursion =  Excursion::with('categoria')->get();

        return Datatables::of($excursion)
        ->addColumn('action', function($row){
          return '<div class="btn-group" >


          <a type="button" class="btn-floating light-blue waves-effect waves-light" id="editExcursionBtn" data-id="'.$row['id'].'">

          <i class="fas fa-pencil-alt" style="color:#00c851;"></i></a>&nbsp;&nbsp;



          <a type="button" class="btn-floating light-blue waves-effect waves-light"  id="deleteExcursionBtn"  data-id="'.$row['id'].'"><i class="fa fa-trash" style="color:#ff3547;"></i></a>

          </div>';

      })
        ->rawColumns(['action'])
        ->make(true);

    }

    $categories = Categorias::all();

    return view('modulos.excursiones.excursion-home',compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

            try {

             $excursion = new Excursion();
             $excursion->titulo = $request->title;
             $excursion ->description =$request->description;
             $excursion ->id_categoria =$request->id_category;

             $resultado =DB::table('excursiones')
             ->where('titulo',$excursion->titulo)
             ->where('id_categoria',$excursion ->id_categoria)
             ->exists(); 

             if($resultado){
                return response()->json(['status'=>2,'error'=>'Excursión Existente']);

            }else{

               if($request->hasFile('portada')){

                $rutaImg = $request['portada']->store('excursiones','public');

                $excursion->portada= $rutaImg;

                $excursion->save(); 

            }


            return response()->json(['status'=>1,'success'=>'Excursion saved successfully.']);
        }


    } catch (Exception $e) {


        return response()->json(['status'=>0,'error'=>'Error']);
    }
  }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Excursion  $excursion
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request)
    {


        $id = $request->id;
        $excursionDetails = Excursion::find($id);


        return response()->json(['details'=>$excursionDetails]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Excursion  $excursion
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request)
    {
       if($request->ajax()){


         $excursion = new Excursion();
         $excursion_id = $request->excid;
         $excursion = excursion::find($excursion_id);
         $excursion->titulo = $request->title2;
         $excursion ->description =$request->description2;
         $excursion ->id_categoria =$request->id_category2;

         $resultado =DB::table('excursiones')
         ->where('titulo',$excursion->titulo)
         ->where('id_categoria',$excursion->id_categoria)
         ->exists(); 
         if($resultado){
            return response()->json(['status'=>2,'error'=>'Excursión Existente']);



        } else{
         if($request->hasFile('portada2')){


            Storage::delete('public/'.$excursion->portada);

            $rutaImg = $request['portada2']->store('excursiones','public');

            $excursion->portada= $rutaImg;

            $excursion->save(); 

        }

        return response()->json(['status'=>1, 'msg'=>'Excursion actulaizada con exito']); 

    }

}

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Excursion  $excursion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if($request->ajax()){

            $excursion_id = $request->id;
            $excursion = Excursion::find($excursion_id);

            if(Storage::delete('public/'.$excursion->portada))

              Excursion::destroy($excursion_id);
      }
      return response()->json(['code'=>1,'success'=>'Deleted successfully.']);    

  }


}
