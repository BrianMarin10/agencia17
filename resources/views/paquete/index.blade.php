<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Paquetes Turisticos</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Paquetes Turisticos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('paquetes.create') }}"
                            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Crear</a>
                        @if ($error ?? '')
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID Paquete</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Duración</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Incluye</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paquetes as $paquete)
                                    <tr>
                                        <th scope="row">{{ $paquete->id }}</th>
                                        <td>{{ $paquete->destino }}</td>
                                        <td>{{ $paquete->descripcion }}</td>
                                        <td>{{ $paquete->duracion }}</td>
                                        <td>{{ $paquete->precio }}</td>
                                        <td>{{ $paquete->incluye }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('paquetes.edit', ['paquete' => $paquete->id]) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Editar </a></li>

                                                <form
                                                    action="{{ route('paquetes.destroy', ['paquete' => $paquete->id]) }}"
                                                    method='POST' style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                                                        type="submit" value="Eliminar">
                                                </form>
                                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
