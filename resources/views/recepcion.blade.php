@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Recepcion Mercancia</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">
            <form action="#">
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="fecha_recepcion" class="block mb-2 text-sm font-medium text-gray-900">Fecha Recepcion</label>
                            <div class="relative">
                                <input type="date" name="fecha_recepcion" id="fecha_recepcion"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="idOrden_compra"
                                class="block mb-2 text-sm font-medium text-gray-900">Nº Orden Compra</label>
                            <div class="relative">
                                <input type="number" name="idOrden_compra" id="Ordenes_compras_idOrden_compra"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="empleado" class="block mb-2 text-sm font-medium text-gray-900">Empleado</label>
                            <select id="Empleados_idEmpleados"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Empleado</option>
                            <option value="maria">Mara Fernanda</option>
                            <option value="juan">Juan Pernia</option>
                        </select>
                        </div>
                        
                        <div class="w-full">
                            <label for="proveedor" class="block mb-2 text-sm font-medium text-gray-900">Proveedor</label>
                            <select id="Proveedores_idProveedores"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Proveedor</option>
                            <option value="polar">Empresas Polar</option>
                            <option value="del campo">Alimentos del Campo</option>
                        </select>
                        </div>

                        <div class="w-full">
                            <label for="suministro" class="block mb-2 text-sm font-medium text-gray-900">Suministro</label>
                            <select id="Suministros_idSuministro"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Suministro</option>
                            <option value="Jabon">Jabón</option>
                            <option value="Tenedor">Tenedor</option>
                            <option value="Tomate">Tomate</option>
                            <option value="Plato">Plato</option>
                        </select>
                        </div>
                    </div>

                        <div class="w-full">
                            <label for="cantidad"
                                class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                            <div class="relative">
                                <input type="number" name="cantidad" id="cantidad_recibida"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" required>
                            </div>
                        </div>
                    <div>
                        <label for="status	" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
                        <select id="status	"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Estado</option>
                            <option value="Buen estado">Buen estado</option>
                            <option value="Incompleto">Incompleto</option>
                            <option value="Deteriorado">Deteriorado</option>
                        </select>
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
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">05/07/2024</th>
                        <td class="px-4 py-3 text-gray-900">01</td>
                        <td class="px-4 py-3 text-gray-900">Juan Pernia</td>
                        <td class="px-4 py-3 text-gray-900">Empresas Polar</td>
                        <td class="px-4 py-3 text-gray-900">Jabon</td>
                        <td class="px-4 py-3 text-gray-900">5</td>
                        <td class="px-4 py-3 text-gray-900">Buen estado</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <!-- Botón Editar -->
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
                                <!-- Botón Eliminar -->
                                <button class="flex items-center text-red-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">06/07/2024</th>
                        <td class="px-4 py-3 text-gray-900">02</td>
                        <td class="px-4 py-3 text-gray-900">Maria Fernanda</td>
                        <td class="px-4 py-3 text-gray-900">Alimentos del Campo</td>
                        <td class="px-4 py-3 text-gray-900">Tomate</td>
                        <td class="px-4 py-3 text-gray-900">8</td>
                        <td class="px-4 py-3 text-gray-900">Incompleto</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <!-- Botón Editar -->
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
                                <!-- Botón Eliminar -->
                                <button class="flex items-center text-red-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
