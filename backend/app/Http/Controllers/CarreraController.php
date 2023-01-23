<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Models\Carrera;

class CarreraController extends Controller
{
    public function index()
    {
        $carrera = Carrera::all();
        return response()->json($carrera, 200);
    }

    public function store(CreateCarreraRequest $request)
    {
        $carrera =  Carrera::create($request->validated());
        return response()->json($carrera, 200);
    }

    public function update(UpdateCarreraRequest $request, Carrera $carrera)
    {
        $data = $request->validated();
        $carrera->update($data);
        return response()->json($carrera, 201);
    }

    public function destroy(Carrera $carrera)
    {
        if ($carrera->delete()) {
            return response()->json([
                'message' => 'Se ha eliminado exitosamente',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ocurrio un error, intentelo otra vez por favor',
                'status_code' => 500,
            ], 500);
        }
    }
}
