<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \Illuminate\Contracts\Validation\Validator;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $result = $request->only(['nombre', 'correo', 'cargo', 'asistencia']);
        $result_to_validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'cargo' => 'required|string|max:100',
            'asistencia' => 'string|max:100',
        ]);

        if ($result_to_validate instanceof Validator && $result_to_validate->fails()) {
            return redirect()->back()->withErrors($result_to_validate)->withInput();
        }



        Log::info('Crear Personal: ', ["mensaje" => "personal creado correctamente"]);
        Log::info('Crear Personal: ', $result_to_validate);

        \App\Models\Personal::create($result_to_validate);


        return redirect()->route('admin.panel')->with('success', 'Personal creado correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = \App\Models\Personal::find($id);
        if (!$personal) {
            return redirect()->route('admin.panel')->with('error', 'Personal no encontrado.');
        }

        $personal->delete();
        return redirect()->route('admin.panel')->with('success', 'Personal eliminado correctamente.');
    }
}
