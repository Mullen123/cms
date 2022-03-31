<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use DataTables;
use Illuminate\Support\Facades\Storage;



class SlideController extends Controller
{

  public function index(Request $request)
  {

   if($request->ajax()){

    /*obtencion de los datos que se quieren mostrar en la base de datos*/
    $slide =  Slide::select('id','title','description','image')->get();

    return Datatables::of($slide)
    ->addColumn('action', function($row){
      return '<div class="btn-group" >


      <a type="button" class="btn-floating light-blue waves-effect waves-light" id="editSlideBtn" data-id="'.$row['id'].'">

      <i class="fas fa-pencil-alt" style="color:#00c851;"></i></a>&nbsp;&nbsp;



      <a type="button" class="btn-floating light-blue waves-effect waves-light"  id="deleteSlideBtn"  data-id="'.$row['id'].'"><i class="fa fa-trash" style="color:#ff3547;"></i></a>

      </div>';

    })
    ->rawColumns(['action'])
    ->make(true);

  }

  return view('modulos.slide.home');
}


public function store(Request $request)
{




  try {


   $slide = $request->all();



   $resultado =DB::table('slide')->where('title', $slide)->exists();

   if($resultado){

    return response()->json(['status'=>2,'error'=>'Categoria  repetida']);

  }else{



   if($request->hasFile('image')){

    $rutaImg = $request['image']->store('slide','public');


        //obtines lo que te envian del formulario3
    $datos = request();


    Slide::create([

      'title' => $datos["title"],

      'description'=> $datos["description"],

      'image' => $rutaImg

    ]);


  }

  return response()->json(['status'=>1,'success'=>'Slide saved successfully.']);

}
} catch (Exception $e) {
 return response()->json(['status'=>0,'error'=>'Error']);
}



        }



     public function edit(Request $request)
        {
           
            $id = $request->id;
    $slideDetails = Slide::find($id);
    return response()->json(['details'=>$slideDetails]);
        
        }


        public function update(Request $request, Slide $slide)
        {

        }


        public function destroy( Request $request)
        {

          if($request->ajax()){

            $slide_id = $request->id;
            $slide = Slide::find($slide_id);
            
            if(Storage::delete('public/'.$slide->image))

              Slide::destroy($slide_id);
          }
          return response()->json(['code'=>1,'success'=>'Deleted successfully.']);    

        }






      }
