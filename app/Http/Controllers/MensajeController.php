<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use DataTables;
class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        


   $mensajes =  Mensaje::select('id','name','email','message','created_at','leido')->get();


      
       
    
        return view('modulos.mensajes.mensajes',compact('mensajes'));

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         
         
   $msn = new Mensaje();
             
             $msn->name= $request->name;
             $msn->email= $request->email;
             $msn->message = $request->message;
             $msn->leido = 'No';

             $msn->save();

          return response()->json(['details'=>$msn],200);
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
  DB::table('mensajes')
    ->where('id', $id)
    ->update(['leido' => "Si"]);
        $mensaje = Mensaje::find($id);
        //dd($mensaje);
            //$mensaje->leido = "Si";

            //$mensaje->save();
        
        return view('modulos.mensajes.leer-mensaje',compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
