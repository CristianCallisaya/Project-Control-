<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    //

    public function index(){
        $carrera = Carrera::all();
        return response()->json($carrera, 200);
       
    }

    public function store(Request $request){
        $carrera = new Carrera();

        $carrera->carreraNombre = $request->carreraNombre;
        $carrera->correlativo = $request->correlativo;
        if ($carrera->save()) {
            return response()->json($carrera, 200);
        } else {
            return response()->json([
                'message' => 'Ocurrio un error, intente otra vez por favor ',
                'status_code' => 500
            ], 500);
        }
    }


    public function update(Request $request, Carrera $carrera){
        $carrera->carreraNombre = $request->carreraNombre;
        $carrera->correlativo = $request->correlativo;
        if ($carrera->update()) {
            return response()->json($carrera, 200);
        } else {
            return response()->json([
                'message' => 'Ocurrio un error, intente otra vez por favor ',
                'status_code' => 500
            ], 500);
        }
    }

    public function destroy(Carrera $carrera){
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
