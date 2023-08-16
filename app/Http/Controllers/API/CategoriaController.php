<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = CategoriaResource::collection((Categoria::latest()->paginate()));
        return response()->json([
            'status' => true,
            'catgorias' => $lista
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
        $categoria = Categoria::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Categoria creada correctamente",
            'categoria' => $categoria
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Categoria actualizada correctamente",
            'categoria' => $categoria
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $categoria = Categoria::find($id);
        if(!empty($categoria)){
            $categoria->delete();
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
