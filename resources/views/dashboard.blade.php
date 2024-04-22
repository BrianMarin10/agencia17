<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('https://media.licdn.com/dms/image/C5612AQHj1ZIwq-tORA/article-cover_image-shrink_720_1280/0/1520042951547?e=1719446400&v=beta&t=mObNN8W-67OjFMVtjiotx_0MzVrbmhR4EvbTic5Jjpg'); background-size: cover; background-position: center;">>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Agencia 17 - Bienvenido -") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
