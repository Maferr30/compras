@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Orden de Compra</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">
            <form action="#">
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="fecha_emision" class="block mb-2 text-sm font-medium text-gray-900">Fecha Emision</label>
                            <div class="relative">
                                <input type="date" name="fecha_emision" id="fecha_emision"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="fecha_entrega"
                                class="block mb-2 text-sm font-medium text-gray-900">Fecha Entrega</label>
                            <div class="relative">
                                <input type="date" name="fecha_entrega" id="fecga_entraga"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300"required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
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
                            <option value="maria">Maria Fernanda</option>
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

                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="cantidad"
                                class="block mb-2 text-sm font-medium text-gray-900">Cantidad</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"></path>
                                    </svg>
                            </div>
                                <input type="number" name="cantidad" id="cantidad_pedida"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" required>
                            </div>
                        </div>
                        
                        <div class="w-full">
                            <label for="precio_unitario" class="block mb-2 text-sm font-medium text-gray-900">Precio Unitario</label>
                            <input type="text" name="precio_unitario" id="precio_unitario"
                                class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" required>
                        </div>

                        <div class="w-full">
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Total</label>
                            <input type="text" name="total" id="total_pagar"
                                class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" required>
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
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">02/07/2024</th>
                        <td class="px-4 py-3 text-gray-900">Empresas polar</td>
                        <td class="px-4 py-3 text-gray-900">Jabon</td>
                        <td class="px-4 py-3 text-gray-900">5</td>
                        <td class="px-4 py-3 text-gray-900">10</td>
                        <td class="px-4 py-3 text-gray-900">50</td>
                        <td class="px-4 py-3 text-gray-900">Recibido</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <!-- Botón Cancelar -->
                                <button class="flex items-center text-blue-600 hover:underline mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" 
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">04/07/2024</th>
                        <td class="px-4 py-3 text-gray-900">Alimentos del Campo</td>
                        <td class="px-4 py-3 text-gray-900">Tomate</td>
                        <td class="px-4 py-3 text-gray-900">10</td>
                        <td class="px-4 py-3 text-gray-900">2</td>
                        <td class="px-4 py-3 text-gray-900">20</td>
                        <td class="px-4 py-3 text-gray-900">Recibido</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <!-- Botón Cancelar -->
                                <button class="flex items-center text-blue-600 hover:underline mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" 
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
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