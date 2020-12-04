<?php

namespace App\Http\Controllers\tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tienda;
use App\Http\Requests\categoria_producto as categoria_productoRequests;

class categoria_producto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       protected $categoria_producto;
       public function __construct (categoria_producto $categoria_producto) {
       $this->categoria_producto = $categoria_producto;
       }

    public function index()
    {
        //
        $categoria_producto = categoria_producto ::all();
        return response()->json(['categoria_producto'=> $categoria_producto]);
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
        //
        $categoria_producto = $this->categoria_producto->create($request->all());
        if($categoria_producto = true){
            return response()->json(['error'=>true,'mensaje'=>'su registro fu un exito']);
        }else{
            return response()->json(['error'=>false,'mensaje'=>'su registro no se guardo vuelve intentar']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoria_producto = categoria_producto::find($id);
        return response()->json($categoria_producto); 
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
    public function update(categoria_productoRequest $request,categoria_producto $categoria_producto)
    {
        //
        $categoria_producto->update($request->all());
        if($categoria_producto = true){
            return response()->json(['error'=>true,'mensaje'=>'se actualizo el registro']);
        }else{
            return response()->json(['error'=>false,'mensaje'=>'vuelve intetar actualizar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria_producto $categoria_producto)
    {
        //
        $categoria_producto->delete();
        return response()->json('el registro a sido eliminado ');
    }
}
