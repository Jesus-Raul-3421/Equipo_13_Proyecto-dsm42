<?php

namespace App\Http\Controllers\tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tienda;
use App\Http\Requests\cliente as clienteRequests;

class cliente extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       protected $cliente;
       public function __construct (Materias $cliente) {
       $this->cliente = $cliente;

   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cliente = cliente ::all();
        return response()->json(['cliente'=> $cliente]);
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
        $cliente = $this->cliente->create($request->all());
        if($cliente = true){
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
        $cliente = cliente::find($id);
        return response()->json($cliente); 
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
    public function update(clienteRequest $request,cliente $cliente)
    {
        //
        $cliente->update($request->all());
        if($cliente = true){
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
    public function destroy(cliente $cliente)
    {
        //
        $cliente->delete();
        return response()->json('el registro a sido eliminado ');
    }
}
