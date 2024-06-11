<x-app-layout>
    <div class="w-screen">
        <x-slot name="header">
            <div class="flex flex-col items-center content-between justify-evenly">
                <h1 class="text-2xl font-bold mb-4">Lista de Empleados</h1>
                <a href="{{ route('empleados.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear
                    Empleado</a>
            </div>
        </x-slot>
        <br>
        <br>
        <div class="container mx-auto">
            @if ($empleados->isEmpty())
                <p class="text-center text-red-500 font-bold">No hay empleados</p>
            @else
                <table class="w-full border-collapse border border-gray-300 bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Rango</th>
                            <th class="px-4 py-2">Precio Hora</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td class="border px-4 py-2">{{ $empleado->nombre }}</td>
                                <td class="border px-4 py-2">{{ $empleado->apellidos }}</td>
                                <td class="border px-4 py-2">{{ $empleado->rango }}</td>
                                <td class="border px-4 py-2">{{ $empleado->precio_hora }}</td>
                                <td class="border px-4 py-2 flex flex-row justify-center">
                                    <a href="{{ route('empleados.edit', $empleado->id) }}"
                                        class="ml-2 text-yellow-100 hover:white hover:bg-yellow-400 bg-yellow-500 px-4 py-2 rounded">Editar</a>
                                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="ml-2 text-red-100 hover:white hover:bg-red-400 bg-red-500 px-4 py-2 rounded">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div><br><br>
</x-app-layout>
