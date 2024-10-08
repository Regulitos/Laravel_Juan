<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;


class ControladorCliente extends Controller
{
    public function lista()
    {
        $clientes = Cliente::all();

        if ($clientes->isEmpty()) {
            $data = [
                'mensaje' => 'No se encontraron clientes',
                'estado' => 200
            ];


            return response()->json($data, 204);
        }
        return response()->json($clientes, 200);
    }

    public function obtener($id)
    {
        $cliente = Cliente::find($id);
        return 'Obteniendo Cliente con ID: ' . $id;
    }

    public function crear(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required | max:255',
            'correo' => 'required | email | unique',
            'telefono' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error en la validacion de datos',
                'errores' => $validator->errors(),
                'estado' => 400
            ];
            return response()->json($data, 400);
        }

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        if (!$cliente){
            $data=[
                'mensaje' => 'Error al crear el cliente',
                'estado' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'cliente' => $cliente,
            'estado' => 201
        ];
        return 'Creando Clientes';
    }

    public function actualizar($id, Request $request)
    {
        return 'Actualizando Cliente con ID: ' . $id;
    }

    public function eliminar($id)
    {
        return 'Eliminando Cliente con ID: ' . $id;
    }
}
