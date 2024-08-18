@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Recepcion Mercancia</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">

        <!-- Mensaje de éxito -->
@if (session('success'))
    <div class="alert alert-success text-teal-800 text-center my-4">
        {{ session('success') }}
    </div>
@endif

            <form action="{{route('recepcion.create')}}" method="POST">
                @csrf
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="fecha_recepcion" class="block mb-2 text-sm font-medium text-gray-900">Fecha Recepcion</label>
                            <div class="relative">
                                <input type="date" name="fecha_recepcion" id="fecha_recepcion"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300"required>
                            </div>
                            @error('fecha_recepcion')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="idOrden_compra"
                                class="block mb-2 text-sm font-medium text-gray-900">Nº Orden Compra</label>
                            <div class="relative">
                                <select type="number" name="idOrden_compra" id="Ordenes_compras_idOrden_compra"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"required>
                                   <option selected>seleccione un número</option>
                                   @foreach ( $orc as $item)
                                       <option value="{{$item->idOrden_compra}}">{{$item->idOrden_compra}}</option>
                                   @endforeach
                                </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"></path>
                                </svg>
                                </div>
                            </div>
                        </div>
                        @error('idOrden_compra')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="empleado" class="block mb-2 text-sm font-medium text-gray-900">Empleado</label>
                            <select id="Empleados_idEmpleados" name="Empleados_idEmpleados"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Empleado</option>
                            @foreach ($emp as $item)
                                <option value="{{$item->idEmpleados}}">{{$item->nombre_empleado}} {{$item->apellido_empleado}}</option>
                            @endforeach
                        </select>
                        @error('Empleados_idEmpleados')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        </div>
                        
                        <div class="w-full">
                            <label for="proveedor" class="block mb-2 text-sm font-medium text-gray-900">Proveedor</label>
                            <select id="Proveedores_idProveedores"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Proveedor</option>
                            @foreach ($pro as $item )
                                <option value="{{$item->idProveedores}}">{{$item->nombre_empresa}}</option>
                            @endforeach
                        </select>
                        </div>
                        @error('Proveedores_idProveedores')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                        <div class="w-full">
                            <label for="cantidad"
                                class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"></path>
                                    </svg>
                            </div>
                                <input type="number" name="cantidad" id="cantidad_recibida"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" required>
                            </div>
                            @error('cantidad')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
                        <select id="status" name="status"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Estado</option>
                            <option value="Buen estado">Buen estado</option>
                            <option value="Incompleto">Incompleto</option>
                            <option value="Deteriorado">Deteriorado</option>
                        </select>
                    </div>
                    @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
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
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Lista Recepcion</h2>
        <div class="relative shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-3">Fecha Recepcion</th>
                        <th scope="col" class="px-4 py-3">Nº Orden Compra</th>
                        <th scope="col" class="px-4 py-3">Empleado</th>
                        <th scope="col" class="px-4 py-3">Proveedor</th>
                        <th scope="col" class="px-4 py-3">Suministro</th>
                        <th scope="col" class="px-4 py-3">Cantidad</th>
                        <th scope="col" class="px-4 py-3">Estado</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repc as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$item->fecha_recepcion}}</th>
                        <td class="px-4 py-3 text-gray-900">{{$item->idOrden_compra}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->nombre_empleado}} {{$item->apellido_empleado}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->nombre_empresa}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->nombre_suministro}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->cantidad_recibida}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->status}}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <!-- Botón Editar interfaz -->
                                <button class="flex items-center text-blue-600 hover:underline mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
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
