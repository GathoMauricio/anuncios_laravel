<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Colonia;

class SepomexController extends Controller
{
    public function minicipios($id)
    {
        $municipios = Municipio::where('idestado', $id)->orderBy('municipio')->get();
        return response()->json($municipios);
    }

    public function colonias($id)
    {
        $colonias = Colonia::where('idmunicipio', $id)->orderBy('colonia')->get();
        return response()->json($colonias);
    }

    public function cp($id)
    {
        $colonia = Colonia::find($id);
        return response()->json($colonia);
    }
}
