<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorUsuario extends Controller{
    public function nombre()
    {
        $nombre = "Juan";
        return response()->json([
            'mensaje' => "{$nombre}, mensaje por medio del controlador"
        ]);
    }
}
