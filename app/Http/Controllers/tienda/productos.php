<?php

namespace App\Http\Controllers\tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tienda;
use App\Http\Requests\productos as productosRequests;

class productos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $productos;
    public function __construct (productos $productos) {
    $this->productos = $productos;
    }

    public function index()
    {
        //
        $productos = productos ::all();
        return response()->json(['productos'=> $productos]);
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
        $productos = $this->productos->create($request->all());
        if($productos = true){
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
        $productos = productos::find($id);
        return response()->json($productos); 
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
    public function update(productosRequest $request,productos $productos)
    {
        //
        $productos->update($request->all());
        if($productos = true){
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
    public function destroy(productos $productos)
    {
        //
        $productos->delete();
        return response()->json('el registro a sido eliminado ');
    }
}
