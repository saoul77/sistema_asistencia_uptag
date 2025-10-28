<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function showAdmin()
    {
        return view('panel.admin');
    }
    public function edit_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->nombre = $request->input('Nombre');
        $user->email = $request->input('Correo');
        $user->cargo = $request->input('Cargo');
        $user->asistencia = $request->input('Asistencia');
        $user->save();

        return redirect()->route('admin.panel')->with('success', 'Usuario actualizado correctamente.');
    }
    public function delete_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.panel')->with('success', 'Usuario eliminado correctamente.');
    }
}
