<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        \Log::debug($request->all());
        $anuncios = Anuncio::where('borrador', 'NO')->orderBy('estatus_id', 'DESC')->orderBy('id', 'DESC')->limit(20)->get();
        return view('index', compact('anuncios'));
    }

    public function quienesSomos()
    {
        return view('layouts.quienes_somos');
    }
}
