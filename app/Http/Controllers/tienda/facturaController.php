<?php

namespace App\Http\Controllers\tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\factura;
use App\Http\Requests\factura as facturaRequests;

class facturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $factura;
    public function __construct (factura $factura) {
    $this->factura = $factura;
    }

    public function index()
    {
        //
        $factura = factura ::all();
        return response()->json(['factura '=> $factura]);
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
        $factura = $this->factura->create($request->all());
        if($factura = true){
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
        $factura = factura::find($id);
        return response()->json($factura); 
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
    public function update(facturaRequest $request,factura $factura)
    {
        //
        $factura->update($request->all());
        if($factura = true){
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
    public function destroy(factura $factura)
    {
        //
        $factura->delete();
        return response()->json('el registro a sido eliminado ');
    }
}
