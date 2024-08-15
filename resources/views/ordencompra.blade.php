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
                                <input type="date" name="fecha_emision" id="fecha_emision"
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
                            <label for="precio_unitario" class="block mb-2 text-sm font-medium text-gray-900">Precio
                                Unitario</label>
                            <div class="relative">
                                <input type="text" name="precio_unitario" id="precio_unitario   "
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"
                                    placeholder="0000,00 $" required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('precio_unitario')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Total</label>
                            <div class="relative">
                                <input type="text" name="total_pagar" id="total_pagar" 
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"
                                    placeholder="0000,00 $" required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('total_pagar')
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
                    <th scope="col" class="px-4 py-3">Precio Unitario</th>
                    <th scope="col" class="px-4 py-3">Total</th>
                    <th scope="col" class="px-4 py-3">Empleado</th>
                    <th scope="col" class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>

            @foreach($ordenesCompra as $ordenCompra)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$ordenCompra->fecha_emision->format('d-m-Y') }}</th>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->proveedores ? $ordenCompra->proveedores->nombre_empresa : 'N/A' }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->suministro->nombre_suministro }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->cantidad_pedida }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->precio_unitario }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ number_format($ordenCompra->total_pagar, 2) }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->empleado->nombre_empleado }} {{ $ordenCompra->empleado->apellido_empleado }}</td>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <!-- Botón Cancelar -->
                            @if($ordenCompra->esCancelable())
                        <form action="{{ route('ordencompra.cancel', $ordenCompra->idOrden_compra) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="flex items-center text-blue-600 hover:underline mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                            @endif
                        </div>
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>
</section>
@endsection