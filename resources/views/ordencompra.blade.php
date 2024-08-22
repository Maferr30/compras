@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Orden de Compra</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">

<!-- Mensaje de éxito -->
@if (session('success'))
    <div class="alert alert-success text-teal-800 text-center my-4">
        {{ session('success') }}
    </div>
@endif

            <form action="{{ route('ordencompra.store') }}" method="POST">
            @csrf
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="fecha_emision" class="block mb-2 text-sm font-medium text-gray-900">Fecha
                                Emision</label>
                            <div class="relative">
                                <input type="date" name="fecha_emision" id="fecha_emision" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full  p-2.5 hover:border-rose-300"
                                    required>
                            </div>
                            @error('fecha_emision')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="fecha_entrega" class="block mb-2 text-sm font-medium text-gray-900">Fecha
                                Entrega</label>
                            <div class="relative">
                                <input type="date" name="fecha_entraga" id="fecha_entraga"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300"
                                    required>
                            </div>
                        </div>
                        @error('fecha_entraga')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="empleado" class="block mb-2 text-sm font-medium text-gray-900">Empleado</label>
                            <select id="Empleados_idEmpleados" name="Empleados_idEmpleados" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                                <option selected>Seleccione Empleado</option>
                                @foreach($empleados as $empleado)
                                <option value="{{ $empleado->idEmpleados }}" {{ old('Empleados_idEmpleados') == $empleado->idEmpleados ? 'selected' : '' }}>{{ $empleado->nombre_empleado}}{{ $empleado->apellido_empleado }}</option>
                        @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="proveedor"
                                class="block mb-2 text-sm font-medium text-gray-900">Proveedor</label>
                            <select id="Proveedores_idProveedores" name="Proveedores_idProveedores" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                                <option selected>Seleccione Proveedor</option>
                                @foreach($pro as $zion)
                    <option value="{{ $zion->idProveedores }}" {{ old('Proveedores_idProveedores') == $zion->idProveedores ? 'selected' : '' }}>{{ $zion->nombre_empresa }}</option>
                    @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="suministro"
                                class="block mb-2 text-sm font-medium text-gray-900">Suministro</label>
                            <select id="Suministros_idSuministro" name="Suministros_idSuministro" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                                <option selected>Seleccione Suministro</option>
                                @foreach($suminis as $suministro)
                        <option value="{{ $suministro->idSuministro }}" {{ old('Suministros_idSuministro') == $suministro->idSuministro ? 'selected' : '' }}>{{ $suministro->nombre_suministro}}</option>
                        @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 viewBox=" 0 0
                                        20 20" fill="currentColor">
                                        <path
                                            d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="number" name="cantidad_pedida" id="cantidad_pedida"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"
                                    required>
                            </div>
                            @error('cantidad_pedida')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        <div class="w-full">
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Cantidad Total</label>
                            <div class="relative">
                                <input type="text" name="cantidad_total" id="cantidad_total"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"
                                    placeholder="0000" required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('cantidad_total')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-center mt-4 sm:mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-rose-400 border-2 border-rose-300 rounded-lg focus:ring-4 focus:ring-purple-300 hover:bg-rose-300 transition-colors duration-200">
                                Guardar
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>


    <!-- Table Section -->
    <h2 class="mb-4 text-3xl font-semibold text-gray-900">Lista de Ordenes</h2>
    <div class="relative shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-4 py-3">Fecha Emision</th>
                    <th scope="col" class="px-4 py-3">Proveedor</th>
                    <th scope="col" class="px-4 py-3">Suministro</th>
                    <th scope="col" class="px-4 py-3">Cantidad</th>
                    <th scope="col" class="px-4 py-3">Cantidad Total</th>
                    <th scope="col" class="px-4 py-3">Empleado</th>
                    <th scope="col" class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>

            @foreach($ordenesCompra as $ordenCompra)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$ordenCompra->fecha_emision->format('d-m-Y') }}</th>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->proveedore->nombre_empresa }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->suministro->nombre_suministro }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->cantidad_pedida }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ number_format($ordenCompra->cantidad_total, 2) }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->empleado->nombre_empleado }} {{ $ordenCompra->empleado->apellido_empleado }}</td>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                             <!-- Botón Editar -->
                                <a href="{{ route('ordencompra.edit', $ordenCompra->idOrden_compra) }}" class="flex items-center text-blue-600 hover:underline mr-4">
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
                            <form action="{{ route('ordencompra.delete', $ordenCompra->idOrden_compra) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                <button class="flex items-center text-red-600 hover:underline" onclick="return confirm('¿Estás seguro que quieres eliminar esta orden de compra?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                            <!-- Botón Imprimir-->
                            <a href="{{ route('ordencompra.pdf', $ordenCompra->idOrden_compra) }}" target="_blank" class="flex items-center text-cyan-700 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-4" viewBox="0 0 20 20" 
                                   fill="currentColor">
                                   <path fill-rule="evenodd" 
                                   d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" 
                                   clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>
</section>
@endsection