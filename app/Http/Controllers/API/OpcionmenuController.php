<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Opcionmenu;
use Illuminate\Http\Request;
use App\Http\Resources\OpcionmenuResource;

class OpcionmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OpcionmenuResource::collection((Opcionmenu::latest()->paginate()));
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
        $obj = Opcionmenu::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Opcion menu creado correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opcionmenu  $opcionmenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Opcionmenu::find($id);
        return new OpcionmenuResource($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opcionmenu  $opcionmenu
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $obj = Opcionmenu::find($id);
        $obj->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Opcion Menu actualizado correctamente",
            'data' => $obj
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opcionmenu  $opcionmenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Opcionmenu::find($id);
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
