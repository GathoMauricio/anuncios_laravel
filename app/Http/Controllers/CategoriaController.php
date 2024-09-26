<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;

class CategoriaController extends Controller
{
    public function subcategorias($id)
    {
        $subcategorias = Subcategoria::where('categoria_id', $id)->get();
        return response()->json($subcategorias);
    }
}
