<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae todos los registros en el objeto paqutes
        $paquetes = DB::table('paquetes')
            ->select('paquetes.*')
            ->get();
        return view('paquete.index', ['paquetes' => $paquetes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear una nueva paquete
        return view('paquete.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda los cambios de paqute
        //El codigo de la paquete es autoincremental
        $paquete = new Paquete();
        $paquete->destino = $request->destino;
        $paquete->descripcion = $request->descripcion;
        $paquete->duracion = $request->duracion;
        $paquete->precio = $request->precio;
        $paquete->incluye = $request->incluye;
        $paquete->save();
        $paquetes = DB::table('paquetes')
            ->select('paquetes.*')
            ->get();
        return view('paquete.index', ['paquetes' => $paquetes]);
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
        //Edita una paquete
        $paquete = Paquete::find($id);
        return view('paquete.edit', ['paquete' => $paquete]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->destino = $request->destino;
        $paquete->descripcion = $request->descripcion;
        $paquete->duracion = $request->duracion;
        $paquete->precio = $request->precio;
        $paquete->incluye = $request->incluye;
        $paquete->save();

        $paquetes = DB::table('paquetes')
            ->select('paquetes.*')
            ->get();
        return view('paquete.index', ['paquetes' => $paquetes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina una paquete
        $paquete = Paquete::find($id);
        $paquete->delete();
        $paquetes = DB::table('paquetes')
            ->select('paquetes.*')
            ->get();

            return view('paquete.index', ['paquetes' => $paquetes]);
    }
}
