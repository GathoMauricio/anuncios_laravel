<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function cuenta()
    {
        $usuario = Auth::user();
        return view('usuario.cuenta', compact('usuario'));
    }

    public function actualizarCuenta(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $usuario = Auth::user();
        if ($usuario->update($request->all())) {
            return redirect()->route('cuenta')->with('message', 'Tus datos han sido actualizados correctamente.');
        }
    }

    public function actualizarPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $usuario = Auth::user();
        $usuario->password = bcrypt($request->password);
        if ($usuario->save()) {
            return redirect()->route('cuenta')->with('message', 'Tu contraseña ha sido actualizados correctamente.');
        }
    }
}
