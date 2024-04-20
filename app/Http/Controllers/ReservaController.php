<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{

    public function index()
    {
        
        //$reserva = Reserva::all();
        $reservas = DB::table('reservas')
            ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
            ->join('paquetes', 'reservas.paquete_id', '=', 'paquetes.id')
            ->select('reservas.*', 'clientes.nombre', 'paquetes.destino')
            ->get();
        return view('reserva.index', ['reservas'=>$reservas]);
    }


    public function create()
    {
        $clientes = DB::table('clientes')
        ->orderBy('nombre')
        ->get();

        $paquetes = DB::table('paquetes')
        ->orderBy('destino')
        ->get();

        return view('reserva.new', ['clientes' => $clientes], ['paquetes' => $paquetes]);



    }

    public function store(Request $request)
    {
        $reserva = new Reserva();
        //$reserva->id = strtoupper($request->id);
        $reserva->cliente_id = $request->nombre;
        $reserva->paquete_id = $request->destino;
        $reserva->fecha_reserva = $request->fecha1;
        $reserva->fecha_salida = $request->fecha2;
        $reserva->cantidad_personas = $request->cantidad;
        $reserva->comentarios = $request->comentarios;

        $reserva->save();

        $reservas = DB::table('reservas')
            ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
            ->join('paquetes', 'reservas.paquete_id', '=', 'paquetes.id')
            ->select('reservas.*', 'clientes.nombre', 'paquetes.destino')
            ->get();
        return view('reserva.index', ['reservas'=>$reservas]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $reserva= Reserva::find($id);
        $clientes = DB::table('clientes')
        ->orderBy('nombre')
        ->get();

        $paquetes = DB::table('paquetes')
        ->orderBy('destino')
        ->get();
        return view('reserva.edit', ['reserva' => $reserva, 'clientes' => $clientes, 'paquetes' => $paquetes]);
    }

    public function update(Request $request, $id)
    {
        $reserva= Reserva::find($id);

        $reserva->cliente_id = $request->nombre;
        $reserva->paquete_id = $request->destino;
        $reserva->fecha_reserva = $request->fecha1;
        $reserva->fecha_salida = $request->fecha2;
        $reserva->cantidad_personas = $request->cantidad;
        $reserva->comentarios = $request->comentarios;
        $reserva->save();
        $reservas = DB::table('reservas')
            ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
            ->join('paquetes', 'reservas.paquete_id', '=', 'paquetes.id')
            ->select('reservas.*', 'clientes.nombre', 'paquetes.destino')
            ->get();
        return view('reserva.index', ['reservas' => $reservas]);
    }

    public function destroy( $id)
    {
        $reserva= Reserva::find($id);
        $reserva->delete();

        $reservas = DB::table('reservas')
            ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
            ->join('paquetes', 'reservas.paquete_id', '=', 'paquetes.id')
            ->select('reservas.*', 'clientes.nombre', 'paquetes.destino')
            ->get();
        return view('reserva.index', ['reservas' => $reservas]);
    }
}
