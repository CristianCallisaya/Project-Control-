<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstudianteRequest;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    //solicitudes de estudiantes por carreras
    public function getEstudianteSolicitud($id){
        $estudiante = Estudiante::where('id_carrera',$id)->where('esEstado',1)->where('esSolicitud','falta')->orderBy('id','desc')->get();
        return response()->json($estudiante, 200);
    }

    
    //todos los estudiantes
    public function index(){
        $estudiante = Estudiante::with('relacionAsignacion.relacionTribunal','relacionSolicitud.relacionDocente','relacionProgramacion.relacionDetalleEstudiante','relacion_carrera','relacionObservacion')->when(request('search'), function ($query) {
            $query->where('esPaterno', 'like', '%' . request('search') . '%')->orWhereHas('relacion_carrera', function($q) {
                $q->where('carreraNombre',  request('search') );
            });
        })->where('esEstado','1')->orderBy('id', 'desc')->paginate(4);
        return response()->json($estudiante,200);
    }

    public function store(CreateEstudianteRequest $request){      
        $estudiante = new Estudiante();
        $estudiante->esNombres = $request->esNombres;
        $estudiante->esPaterno = $request->esPaterno;
        $estudiante->esMaterno = $request->esMaterno;
        $estudiante->esCelular = $request->esCelular;
        $estudiante->esTituloProyecto = $request->esTituloProyecto;
        $estudiante->esGenero = $request->esGenero;
        $estudiante->id_carrera = $request->id_carrera;
        if($estudiante->save()){     
        return response()->json($estudiante, 200);
        } else{
            return response()->json([
                'message' => 'Ocurrio un error, intentelo otra vez por favor',
                'status_code' => 500,
            ],500);
        }
    }

    public function update(CreateEstudianteRequest $request, Estudiante $estudiante){

        $data=$request->all();
        $estudiante->update($data);
        return response()->json($estudiante,201);
    }

    public function destroy(Estudiante $estudiante){
        if ($estudiante->delete()) {
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
