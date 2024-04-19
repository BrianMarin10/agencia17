app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>
    <div class="container">
    <h1>Listado de Clientes</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clientes.create') }}"
                        class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-2">Agregar nuevo cliente</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>
                                        <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Editar cliente </a></li>


                                        <form action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"
                                            method='POST' style="display: inline-block">
                                            @method('delete')
                                            @csrf
                                            <input
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                                                type="submit" value="Delete">
                                        </form>
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
