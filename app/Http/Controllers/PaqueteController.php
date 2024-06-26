<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        try {
            // Elimina una paquete
            $paquete = Paquete::find($id);
            $paquete->delete();
            $paquetes = DB::table('paquetes')
                ->select('paquetes.*')
                ->get();
            return view('paquete.index', ['paquetes' => $paquetes]);
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                // Este código de error específico indica una violación de integridad referencial
                $paquetes = DB::table('paquetes')
                    ->select('paquetes.*')
                    ->get();
                return view('paquete.index', ['paquetes' => $paquetes, 'error' => 'No se puede eliminar el paquete turistico debido a que existen reservas asociadas.']);
            } else {
                // Otros errores de la base de datos
                $paquetes = DB::table('paquetes')
                    ->select('paquetes.*')
                    ->get();
                return view('paquete.index', ['paquetes' => $paquetes, 'error' => 'Error en la base de datos: ' . $e->getMessage()]);
            }
        }
    }
}
