<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla1Route2;
use App\Models\Tabla2Route2;
use App\Models\Tabla3Route2;
use Illuminate\Support\Facades\DB;

class Route2Controller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:tabla1_route1,id',
            'institucion' => 'required|string',
            'carrera' => 'required|string',
            'programa' => 'required|string',
            'semestre' => 'required|string',
            'cursos' => 'required|string',
            'certificaciones' => 'required|string',
            'idiomas' => 'required|string',
            'nivel_idioma' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $tabla1 = Tabla1Route2::create([
                'persona_id' => $request->persona_id,
                'Institucion' => $request->institucion,
                'Carrera' => $request->carrera,
                'Programa' => $request->programa,
                'Semestre' => $request->semestre,
            ]);

            $tabla2 = Tabla2Route2::create([
                'persona_id' => $request->persona_id,
                'cursos' => $request->cursos,
                'certificaciones' => $request->certificaciones,
            ]);

            $tabla3 = Tabla3Route2::create([
                'persona_id' => $request->persona_id,
                'idiomas' => $request->idiomas,
                'nivel' => $request->nivel_idioma,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Datos insertados correctamente en Ruta 2',
                'educacion' => $tabla1,
                'cursos_certificaciones' => $tabla2,
                'idiomas' => $tabla3
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error al insertar datos: ' . $e->getMessage()], 500);
        }
    }
}
