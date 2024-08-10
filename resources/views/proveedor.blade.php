@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Proveedores</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">
            <form action="#">
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="nombre_empresa" class="block mb-2 text-sm font-medium text-gray-900">Nombre Empresa</label>
                            <input type="text" name="nombre_empresa" id="nombre_empresa" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" placeholder="Empresas Polar" required>
                        </div>
                        <div class="w-full">
                            <label for="direccion_empresa" class="block mb-2 text-sm font-medium text-gray-900">Dirección Empresa</label>
                            <input type="text" name="direccion" id="direccion_empresa" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" placeholder="Altamira" required>
                        </div>
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                        <div class="w-full">
                            <label for="telefono_proveedor" class="block mb-2 text-sm font-medium text-gray-900">Teléfono Proveedor</label>
                            <input type="text" name="telefono" id="telefono_proveedor" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" placeholder="0412-000000" required>
                        </div>
                        <div class="w-full">
                            <label for="rif" class="block mb-2 text-sm font-medium text-gray-900">Rif</label>
                            <input type="text" name="rif" id="rif" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" placeholder="J-12345678-1" required>
                        </div>
                        <div class="w-full">
                            <label for="correo_proveedor" class="block mb-2 text-sm font-medium text-gray-900">Correo Proveedor</label>
                            <input type="text" name="correo" id="correo_proveedor" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300" placeholder="pepito@gmail.com" required>
                        </div>
                    </div>

                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900">Categorías</label>
                        <select id="categoria" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Categoría</option>
                            <option value="Limpieza">Productos Limpieza</option>
                            <option value="Utensilios">Utensilios</option>
                            <option value="Hortalizas">Hortalizas</option>
                            <option value="Vajillas">Vajillas</option>
                        </select>
                    </div>
                    <div>
                        <label for="suministro" class="block mb-2 text-sm font-medium text-gray-900">Suministro</label>
                        <select id="suministro" class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Suministro</option>
                            <option value="Jabon">Jabón</option>
                            <option value="Tenedor">Tenedor</option>
                            <option value="Tomate">Tomate</option>
                            <option value="Plato">Plato</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center mt-4 sm:mt-6">
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-rose-400 border-2 border-rose-300 rounded-lg focus:ring-4 focus:ring-purple-300 hover:bg-rose-300 transition-colors duration-200">
                            Guardar
                        </button>
                    </div>
            </form>
        </div>

        <!-- Table Section -->
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Lista Proveedores</h2>
<div class="relative shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="px-4 py-3">Nombre Empresa</th>
                <th scope="col" class="px-4 py-3">Telefono</th>
                <th scope="col" class="px-4 py-3">Direccion</th>
                <th scope="col" class="px-4 py-3">Correo</th>
                <th scope="col" class="px-4 py-3">Rif</th>
                <th scope="col" class="px-4 py-3">Suministro</th>
                <th scope="col" class="px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Polar</th>
                <td class="px-4 py-3">0412-000000</td>
                <td class="px-4 py-3">Altamira</td>
                <td class="px-4 py-3">pepito@gmail.com</td>
                <td class="px-4 py-3">J-12345678-1</td>
                <td class="px-4 py-3">Tomate</td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-2">
                        <!-- Botón Editar -->
                        <button class="flex items-center text-blue-600 hover:underline mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Botón Eliminar -->
                        <button class="flex items-center text-red-600 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Alimentos del Campo</th>
                <td class="px-4 py-3">0416-123456</td>
                <td class="px-4 py-3">El Recreo</td>
                <td class="px-4 py-3">contacto@campocalidad.com</td>
                <td class="px-4 py-3">J-65432100-1</td>
                <td class="px-4 py-3">Jabon</td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-2">
                        <!-- Botón Editar -->
                        <button class="flex items-center text-blue-600 hover:underline mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-700" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Botón Eliminar -->
                        <button class="flex items-center text-red-600 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
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