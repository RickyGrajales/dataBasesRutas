<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla1Route1;
use App\Models\Tabla2Route1;
use App\Models\Tabla3Route1;
use Illuminate\Support\Facades\DB;

class Route1Controller extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'require|string',
            'apellido' => 'required|string',
            'telefono' => 'required|numeric',
            'email' => 'required|email||unique:tabla1_route1,email',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'require|date',
            'calle' => 'required|string',
            'ciudad' => 'required|string',
            'estado' => 'required|string',
            'colonia' => 'required|string',
            'codigo_postal' => 'required|string',
            'pais' => 'required|string',
            'empresa' => 'required|string',
            'area' => 'required|string',
            'cargo' => 'required|string',
            'telefono_trabajo' => 'required|string',
            'correo_trabajo' => 'required|email',
        ]);

        try {
            DB::beginTransaction();

            $tabla1 = Tabla1Route1::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);

            $tabla2 = Tabla2Route1::create([
                'persona_id' => $tabla1->id,
                'calle' => $request->calle,
                'ciudad' => $request->ciudad,
                'estado' => $request->estado,
                'colonia' => $request->colonia,
                'codigo_postal' => $request->codigo_postal,
                'pais' => $request->pais,
            ]);

            $tabla3 = Tabla3Route1::create([
                'persona_id' => $tabla1->id,
                'empresa' => $request->empresa,
                'area' => $request->area,
                'cargo' => $request->cargo,
                'telefono' => $request->telefono_trabajo,
                'correo' => $request->correo_trabajo,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Datos insertados correctamente en Ruta 1',
                'persona' => $tabla1,
                'direccion' => $tabla2,
                'trabajo' => $tabla3
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error al insertar datos: ' . $e->getMessage()], 500);
        }
    }
}
