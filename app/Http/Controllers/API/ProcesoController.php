<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Proceso;
use App\Models\Bien;
use App\Models\Producto;
use App\Models\Etapa;
use App\Http\Resources\ProcesoResource;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = ProcesoResource::collection((Proceso::latest()->paginate()));
        return response()->json($lista);
    }

    public function list()
    {
        $lista = Proceso::with(['bienes', 'etapas'])->latest()->get();
        return response()->json($lista);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = Proceso::create($request->all());
        return response()->json($obj);
    }

    public function store2(Request $request)
    {
        $data = json_decode($request->input('data'));
        $bienes = $data->products;
        $etapas = $data->stages;
        $obj = Proceso::create((array) $data->process);
        foreach ($bienes as $key => $value) {
            $producto = Producto::find($value->id);
            if(!is_null($producto)){
                $input = array("producto_id"=>$value->id,
                                "proceso_id"=>$obj->id,
                                "situacion"=>'P',
                                "garantia" => $value->garantia,
                                "valorreferencia"=>$producto->valor);
                Bien::create($input);
            }
        }
        foreach ($etapas as $key => $value) {
            $input = $value;
            $input->proceso_id=$obj->id;
            Etapa::create((array) $input);
        }
        $obj->load(['bienes', 'etapas']);
        return response()->json($obj);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Proceso::find($id);
        return new ProcesoResource($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = Proceso::find($id);
        $obj->update($request->all());
        return response()->json($obj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Proceso::find($id);
        if(!empty($obj)){
            $obj->delete();
            return response()->json($obj);
        }

        return response()->json('No encontrado');
    }
}
