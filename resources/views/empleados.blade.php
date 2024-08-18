@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Registro de Empleados</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">
           
        <!-- Mensaje de éxito -->
@if (session('success'))
    <div class="alert alert-success text-teal-800 text-center my-4">
        {{ session('success') }}
    </div>
@endif
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="nombre_empleado" class="block mb-2 text-sm font-medium text-gray-900">Nombre Empleado</label>
                            <div class="relative">
                                <input type="text" name="nombre_empleado" id="nombre_empleado"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg 
                                    focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300"
                                    placeholder="Ejem: Mafer" required>
                            </div>
                            @error('nombre_empleado')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="apellido_empleado"
                                class="block mb-2 text-sm font-medium text-gray-900">Apellido Empleado</label>
                            <div class="relative">
                                <input type="text" name="apellido_empleado" id="apellido_empleado"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300"
                                    placeholder="Ejem: Garcia" required>
                            </div>
                        </div>
                        @error('apellido_empleado')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                    <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Nacimiento</label>
                     <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    </div>
                         <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                         class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full  p-2.5 hover:border-rose-300" required>
                  </div>
                  @error('fecha_nacimiento')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                </div>
                        
                        <div class="w-full">
                        <label for="cedula" class="block mb-2 text-sm font-medium text-gray-900">Cedula</label>
                     <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                     </svg>
                            </div>
                         <input type="text" name="cedula" id="cedula"
                         class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" placeholder="30.000-000" required>
                  </div>
                </div>

                        <div class="w-full">
                        <label for="telefono_empleado" class="block mb-2 text-sm font-medium text-gray-900">Telefono Empleado</label>
                     <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                       <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                     </svg>
                            </div>
                         <input type="text" name="telefono_empleado" id="telefono_empleado"
                         class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" placeholder="+00-000-00-00" required>
                  </div>
                </div>
                @error('telefono_empleado')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>

                        <div class="w-full">
                            <label for="direccion_empleado"
                                class="block mb-2 text-sm font-medium text-gray-900">Dirección Empleado</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            </div>
                                <input type="text" name="direccion_empleado" id="direccion_empleado"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"
                                    placeholder="Municipio-Parroquia" required>
                            </div>
                            @error('direccion_empleado')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="flex justify-center mt-4 sm:mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-rose-400 border-2 border-rose-300 rounded-lg focus:ring-4 focus:ring-purple-300 hover:bg-rose-300 transition-colors duration-200">
                        Guardar
                    </button>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Lista Empleados</h2>
        <div class="relative shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-3">Nombre Empleado</th>
                        <th scope="col" class="px-4 py-3">Apellido Empleado</th>
                        <th scope="col" class="px-4 py-3">Fecha de Nacimiento</th>
                        <th scope="col" class="px-4 py-3">Cedula</th>
                        <th scope="col" class="px-4 py-3">Telefono Empleado</th>
                        <th scope="col" class="px-4 py-3">Dirección Empleado</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($empleados as $empleado)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$empleado->nombre_empleado}}</th>
                        <td class="px-4 py-3 text-gray-900">{{$empleado->apellido_empleado}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$empleado->fecha_nacimiento }}</td>
                        <td class="px-4 py-3 text-gray-900">{{$empleado->cedula}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$empleado->telefono_empleado}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$empleado->direccion_empleado}}</td>
                        <td class="px-4 py-3">

                            <div class="flex items-center space-x-2">
                                <!-- Botón Editar -->
                                <a href="{{ route('empleados.edit', $empleado->idEmpleados) }}" class="flex items-center text-blue-600 hover:underline mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                  <!-- Botón Eliminar -->
                            <form action="{{ route('empleados.delete', $empleado->idEmpleados) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                <button class="flex items-center text-red-600 hover:underline" onclick="return confirm('¿Estás seguro que quieres eliminar este empleado?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection