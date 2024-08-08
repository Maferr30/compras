@extends('layouts.layout')

@section('content')
<section class="bg-white dark:bg-white-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900 dark:text-black">Proveedores</h2>
        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-6">
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nombre_empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre Empresa</label>
                        <input type="text" name="nombre_empresa" id="nombre_empresa" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-black-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500" placeholder="Empresas Polar" required>
                    </div>
                    <div class="w-full">
                        <label for="telefono_proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Telefono Proveedor</label>
                        <input type="text" name="telefono" id="telefono_proveedor" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500" placeholder="0412-000000" required>
                    </div>
                    <div class="w-full">
                        <label for="direccion_empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Direccion Empresa</label>
                        <input type="text" name="direccion" id="direccion_empresa" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500" placeholder="Altamira" required>
                    </div>
                    <div class="w-full">
                        <label for="correo_proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Correo Proveedor</label>
                        <input type="text" name="correo" id="correo_proveedor" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500" placeholder="pepito@gmail.com" required>
                    </div>
                    <div class="w-full">
                        <label for="rif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Rif</label>
                        <input type="text" name="rif" id="rif" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500" placeholder="J-12345678-1" required>
                    </div>
                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Categorias</label>
                        <select id="categoria" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500">
                            <option selected>Seleccione Categoria</option>
                            <option value="Limpieza">Productos Limpieza</option>
                            <option value="Utensilios">Utensilio</option>
                            <option value="Hortalizas">Hortaliza</option>
                            <option value="Vajillas">Vajilla</option>
                        </select>
                    </div>
                    <div>
                        <label for="suministro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Suministro</label>
                        <select id="suministro" class="bg-white border border-purple-300 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-purple-600 dark:placeholder-black-700 dark:text-black hover:border-purple-500">
                            <option selected>Seleccione Suministro</option>
                            <option value="Jabon">Jabon</option>
                            <option value="Tenedor">Tenedor</option>
                            <option value="Tomate">Tomate</option>
                            <option value="Plato">Plato</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center mt-4 sm:mt-6">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-purple-500 border-2 border-purple-500 rounded-lg focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-900 hover:bg-purple-600 transition-colors duration-200">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Table Section -->
        <div class="relative shadow-md sm:rounded-lg">
            <h2 class="mb-4 text-3xl font-semibold text-gray-900 dark:text-black">Lista Proveedores</h2>
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Polar</th>
                        <td class="px-4 py-3">0412-000000</td>
                        <td class="px-4 py-3">Altamira</td>
                        <td class="px-4 py-3">pepito@gmail.com</td>
                        <td class="px-4 py-3">J-12345678-1</td>
                        <td class="px-4 py-3">Tomate</td>
                        <td class="px-4 py-3">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Alimentos del Campo</th>
                        <td class="px-4 py-3">0416-123456</td>
                        <td class="px-4 py-3">El Recreo</td>
                        <td class="px-4 py-3">contacto@campocalidad.com</td>
                        <td class="px-4 py-3">J-65432100-1</td>
                        <td class="px-4 py-3">Jabon</td>
                        <td class="px-4 py-3">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
