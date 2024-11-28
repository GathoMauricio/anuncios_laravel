<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Denuncia;

class DenunciaController extends Controller
{
    public function store(Request $request)
    {
        //Se busca si ya existe una denucia a este anuncio desde la misma ip para evitar spam
        $denuncia = Denuncia::where('ip', $request->ip())->where('anuncio_id', $request->anuncio_id)->first();
        if ($denuncia) {
            return redirect()->back()->with('message', 'Ya has denunciado esta publicación anteriormente.');
        }

        $denuncia = Denuncia::create([
            'anuncio_id' => $request->anuncio_id,
            'motivo' => $request->motivo,
            'ip' => $request->ip(),
        ]);

        if ($denuncia) {
            //Enviar email al admin
            Mail::send('email.denuncia', ['denuncia' => $denuncia], function ($mail) {
                $mail->subject('Categoría Inmuebles - Denuncia');
                $mail->from('contacto@catinmo.com', 'Categoría Inmuebles');
                $mail->to(['ventas@arm21.mx', 'mauricio2769@gmail.com']);
            });
            return redirect()->back()->with('message', 'La denuncia se envió correctamente.');
        }
    }
}
