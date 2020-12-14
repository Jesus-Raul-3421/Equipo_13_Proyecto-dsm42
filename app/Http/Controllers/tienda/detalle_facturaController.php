<?php

namespace App\Http\Controllers\tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\detalle_factura;
use App\Http\Requests\detalle_factura as detalle_facturaRequests;

class detalle_facturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $detalle_factura;
    public function __construct (detalle_factura $detalle_factura) {
    $this->detalle_factura = $detalle_factura;

}
    public function index()
    {
        //
        $detalle_factura = detalle_factura ::all();
        return response()->json(['detalle_factura '=> $detalle_factura]);
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
        $detalle_factura = $this->detalle_factura->create($request->all());
        if($detalle_factura = true){
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
        $detalle_factura = detalle_factura::find($id);
        return response()->json($detalle_factura); 
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
    public function update(detalle_facturaRequest $request,detalle_factura $detalle_factura)
    {
        //
        $detalle_factura->update($request->all());
        if($detalle_factura = true){
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
    public function destroy(detalle_factura $detalle_factura)
    {
        //
        $detalle_factura->delete();
        return response()->json('el registro a sido eliminado ');
    }
}
