<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Acceso;
use Illuminate\Http\Request;
use App\Http\Resources\AccesoResource;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lista = AccesoResource::collection((Acceso::where('tipousuario_id',$request->input('tipousuario_id'))->latest()->paginate()));
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
        $obj = Acceso::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Acceso creada correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Acceso::find($id);
        return new AccesoResource($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $obj = Acceso::find($id);
        $obj->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Acceso actualizada correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Acceso::find($id);
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
