<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModalidadRequet;
use App\Http\Requests\UpdateModalidad;
use App\Models\Modalidad;

class ModalidadController extends Controller
{
    public function index(){
        $modalidad = Modalidad::all();
        return response()->json($modalidad,200);
    }

    public function store(CreateModalidadRequet $request){
        $modalidad = Modalidad::create($request->validated());
        return response()->json($modalidad, 200);
    }

    public function update(UpdateModalidad $request, Modalidad $modalidade){
        $data = $request->Validated();
        $modalidade->update($data);
        return response()->json($modalidade, 201);
    }

    public function destroy(Modalidad $modalidade){
        if($modalidade->delete()){
            return response()->json([
                'message' => 'Se ha eliminado exitosamente',
                'status_code' => 200
            ],200);
        }else {
            return response()->json(['message' => 'Ocurrio un error, intentelo otra vez por favor',
            'status_code' => 500],500);
        }
    }
}
