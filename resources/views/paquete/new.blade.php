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
            <form method="POST" action="{{ route('paquetes.store') }}" onsubmit="return validarFormulario()">
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
                    <label for="duracion" class="form-label">Duración (# Noches)</label>
                    <input type="number" required class="form-control" id="duracion" aria-describedby="nameHelp"
                        name="duracion" placeholder="Duración en numero de noches del paquete">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" required class="form-control" id="precio" aria-describedby="nameHelp"
                        name="precio" placeholder="Precio del paquete">
                </div>
                <div class="mb-3">
                    <label for="incluye" class="form-label">Inluido en el paquete</label>
                    <input type="hidden" required class="form-control" id="incluye" aria-describedby="nameHelp"
                        name="incluye" value="Alojamiento">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Alojamiento" id="alojamiento"
                        onclick="guardarCheckbox()" checked>
                    <label class="form-check-label" for="alojamiento">
                        Alojamiento
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Tiquete Aereo" id="tiquete"
                        onclick="guardarCheckbox()">
                    <label class="form-check-label" for="tiquete">
                        Tiquete Aereo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Transporte Aeropuerto" id="trasporte"
                        onclick="guardarCheckbox()">
                    <label class="form-check-label" for="trasporte">
                        Transporte Aeropuerto
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Alimentacion" id="alimentacion"
                        onclick="guardarCheckbox()">
                    <label class="form-check-label" for="alimentacion">
                        Alimentación
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Toures" id="toures"
                        onclick="guardarCheckbox()">
                    <label class="form-check-label" for="toures">
                        Toures
                    </label>
                </div>


                <h5></h5>
                <script>
                    function guardarCheckbox() {
                        var checkboxes = document.getElementsByClassName("form-check-input");
                        var valoresSeleccionados = [];
                        for (var i = 0; i < checkboxes.length; i++) {
                            if (checkboxes[i].checked) {
                                valoresSeleccionados.push(checkboxes[i].value);
                            }
                        }
                        document.getElementById("incluye").value = valoresSeleccionados.join(', ');
                    }

                    function validarFormulario() {
                        var incluye = document.getElementById("incluye").value;
                        if (incluye.trim() === "") {
                            alert("ERROR. Debe seleccionar al menos una opción para incluir en el paquete.");
                            return false; // Evita que el formulario se envíe
                        }
                        return true; // Permite que el formulario se envíe si el input "incluye" no está vacío
                    }
                </script>

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
