<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consultar Tablas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!--Botonera-->
                <div class="flex gap-2 mb-6">
                    {{-- <x-button-link :href="route('dashboard')" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg">Dashboard</x-button-link> --}}
                    <button class="px-4 py-2 bg-red-700 text-white rounded-lg font-semibold">Existencias</button>
                    <button class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg">Salidas</button>
                    <button class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg">Entradas</button>
                    <button class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700 rounded-lg">Productos</button>
                </div>
            <!--Tablas-->
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('table.partials.productos')
                    {{-- @include('table.partials.existencias') --}}
                    {{-- @include('table.partials.areas') --}}
                </div>

        </div>
    </div>
</x-app-layout>