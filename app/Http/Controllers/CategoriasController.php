<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;


use Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        /*obtenemos todos los registros almacenados en la base de datos*/
        $categorias = Categorias::all();
         //dd($categorias);
        return view('modulos.categories',compact('categorias'));
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


            $category = $request->all();
        Categorias::create($category);        
        return response()->json(['status'=>1,'success'=>'Category saved successfully.']);
        /*validaciones*/
        /*$validator = Validator::make($request->all(),[
            'name' => 'required|unique:categorias|max:2',
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }

        $category = $request->all();
        Categorias::create($category);        
        return response()->json(['status'=>1,'success'=>'Category saved successfully.']);*/
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
