<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        return response('Hello, World!');
    }

    public function store(Request $request)
    {
        // Implementación para guardar el producto
    }
}