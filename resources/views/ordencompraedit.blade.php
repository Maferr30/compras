@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Editar Orden de Compra</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">

     <form action="{{ route('ordencompra.update', $ordenCompra->idOrden_compra) }}" method="POST">
            @csrf
            @method('PUT')
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
                                Actualizar
                            </button>
                        </div>
                    </div>
            </form>
        </div>
@endsection