<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol_id == 2) {
            $usuarios = User::paginate(10);
            return view('usuario.index', compact('usuarios'));
        } else {
            return abort(403);
        }
    }

    public function eliminados()
    {
        if (Auth::user()->rol_id == 2) {
            $usuarios = User::onlyTrashed()->paginate(10);
            return view('usuario.eliminados', compact('usuarios'));
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        if (Auth::user()->rol_id == 2) {
            $usuario = User::findOrFail($id);
            return view('usuario.show', compact('usuario'));
        } else {
            return abort(403);
        }
    }

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

    public function destroy($id)
    {
        if (Auth::user()->rol_id == 2) {
            $usuario = User::findOrFail($id);
            if ($usuario->delete()) {
                return redirect()->back()->with('message', 'El usuario ha sido eliminado correctamente.');
            }
        } else {
            return abort(403);
        }
    }
}
