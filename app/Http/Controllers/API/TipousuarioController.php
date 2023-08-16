<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tipousuario;
use Illuminate\Http\Request;
use App\Http\Resources\TipousuarioResource;

class TipousuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = TipousuarioResource::collection((Tipousuario::latest()->paginate()));
        return response()->json([
            'status' => true,
            'data' => $lista
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = Tipousuario::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Tipo usuario creado correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Tipousuario::find($id);
        return new TipousuarioResource($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $obj = Tipousuario::find($id);
        $obj->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Tipo de usuario actualizado correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Tipousuario::find($id);
        if(!empty($obj)){
            $obj->delete();
            return response()->json([
                'status' => true,
                'message' => 'Eliminado correctamente'
            ],200);
        }

        return response()->json([
            'status' => true,
            'message' => 'No encontrado'
        ],404);
    }
}
