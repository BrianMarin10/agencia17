<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>RESERVAS</title>
  </head>
  <body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>
    <div class="container">
    <h1>Listado de Reservas</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('reservas.create') }}"
                        class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Agregar reserva</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre cliente</th>
            <th scope="col">Destino</th>
            <th scope="col">Fecha reserva</th>
            <th scope="col">Fecha salida</th>
            <th scope="col">Actions </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
        <tr>
            <th scope="row">{{ $reserva->id }}</th>
            <td>{{ $reserva->nombre }}</td>
            <td>{{ $reserva->destino }}</td>
            <td>{{ $reserva->fecha_reserva }}</td>
            <td>{{ $reserva->fecha_salida }}</td>
            <td>
              </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 