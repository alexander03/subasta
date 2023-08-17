<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Grupomenu;
use Illuminate\Http\Request;
use App\Http\Resources\GrupomenuResource;

class GrupomenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = GrupomenuResource::collection((Grupomenu::latest()->paginate()));
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
        $obj = Grupomenu::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Grupo Menu creada correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupomenu  $grupomenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Grupomenu::find($id);
        return new GrupomenuResource($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupomenu  $grupomenu
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $obj = Grupomenu::find($id);
        $obj->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Grupo Menu actualizada correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupomenu  $grupomenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Grupomenu::find($id);
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
