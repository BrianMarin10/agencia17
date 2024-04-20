<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear nuevo paquete</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Paquetes Turisticos') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Agregar Paquete</h1>
            <form method="POST" action="{{ route('paquetes.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                        disabled="disabled">
                    <div id="idHelp" class="form-text">ID Paquete</div>
                </div>
                <div class="mb-3">
                    <label for="destino" class="form-label">Destino</label>
                    <input type="text" required class="form-control" id="destino" aria-describedby="nameHelp"
                        name="destino" placeholder="Nombre del destino">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" aria-describedby="nameHelp"
                        name="descripcion" placeholder="Descripcion destino">
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input type="text" required class="form-control" id="duracion" aria-describedby="nameHelp"
                        name="duracion" placeholder="Duración paquete">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" required class="form-control" id="precio" aria-describedby="nameHelp"
                        name="precio" placeholder="Precio del paquete">
                </div>
                <div class="mb-3">
                    <label for="incluye" class="form-label">Incluye</label>
                    <input type="text" required class="form-control" id="incluye" aria-describedby="nameHelp"
                        name="incluye" placeholder="Paquete incluye . . .">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('paquetes.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </x-app-layout>
</body>

</html>
