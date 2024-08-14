<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla1Route3;
use App\Models\Tabla2Route3;
use App\Models\Tabla3Route3;
use Illuminate\Support\Facades\DB;

class Route3Controller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:tabla1_route1,id',
            'nombre_proyecto' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'habilidades' => 'required|array',
            'habilidades.*.habilidad' => 'required|string',
            'habilidades.*.nivel' => 'required|string',
            'ciberseguridad' => 'required|string',
            'nivel_ciberseguridad' => 'required|string',
            'certificaciones_ciberseguridad' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $tabla1 = Tabla1Route3::create([
                'persona_id' => $request->persona_id,
                'nombre_proyecto' => $request->nombre_proyecto,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
            ]);

            foreach ($request->habilidades as $habilidad) {
                Tabla2Route3::create([
                    'persona_id' => $request->persona_id,
                    'habilidad' => $habilidad['habilidad'],
                    'nivel' => $habilidad['nivel'],
                ]);
            }

            $tabla3 = Tabla3Route3::create([
                'persona_id' => $request->persona_id,
                'ciberseguridad' => $request->ciberseguridad,
                'nivel' => $request->nivel_ciberseguridad,
                'certificaciones_ciberseguridad' => $request->certificaciones_ciberseguridad,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Datos insertados correctamente en Ruta 3',
                'proyecto' => $tabla1,
                'habilidades' => $request->habilidades,
                'ciberseguridad' => $tabla3
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error al insertar datos: ' . $e->getMessage()], 500);
        }
    }
}
