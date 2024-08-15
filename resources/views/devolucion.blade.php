@extends('layouts.layout')

@section('content')
<section class="bg-white ">
    <div class="py-8 px-16 max-w-4x4">
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Devoluciones</h2>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

        <div class="bg-gray-300 p-6 rounded-lg shadow-md mb-4">
            <form action="{{route('devolucion.create')}}" method="post">
                @csrf
                <div class="grid gap-4 px-18  sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="fecha_devolucion" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Devolucion</label>
                            <div class="relative">
                                <input type="date" name="fecha_devolucion" id="fecha_devolucion"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300"required>
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="idRecepcion_mercancia" class="block mb-2 text-sm font-medium text-gray-900">Nº Recepcion Mercancia</label>
                            <select id="Recepciones_mercancias_idRecepcion_mercancia" name="recepcion"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Recepcion Mercancia</option>
                            @foreach ( $rec as $item )
                            <option value="{{$item->idRecepcion_mercancia}}">{{$item->idRecepcion_mercancia}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2 flex space-x-4">
                    <div class="w-full">
                            <label for="suministro" class="block mb-2 text-sm font-medium text-gray-900">Suministro</label>
                            <select id="Suministros_idSuministro" name="suministro"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Suministro</option>
                            @foreach ($sum as $item )
                                <option value="{{$item->idSuministro}}">{{$item->nombre_suministro}}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="w-full">
                            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
                            <select id="status" name="status"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Estado</option>
                            <option value="Defectuoso">Defectuoso</option>
                            <option value="Dañado">Dañado</option>
                            <option value="Error en el pedido">Error en el pedido</option>
                        </select>
                        </div>

                        <div class="w-full">
                         <label for="cantidad_devuelta" class="block mb-2 text-sm font-medium text-gray-900">Cantidad a Devolver</label>
                     <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z" clip-rule="evenodd"></path>
                     </svg>
                            </div>
                         <input type="number" name="cantidad_devuelta" id="cantidad_devuelta"
                         class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" required>
                  </div>
                </div>
                </div>

                    <div class="w-full">
                            <label for="motivo"
                                class="block mb-2 text-sm font-medium text-gray-900">Motivo</label>
                            <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            </div>
                                <input type="text" name="motivo" id="motivo"
                                    class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full pl-10 p-2.5 hover:border-rose-300" required>
                            </div>
                        </div>

                    <div>
                        <label for="empleado" class="block mb-2 text-sm font-medium text-gray-900">Empleado</label>
                        <select id="Emplados_idEmplados" name="empleado"
                            class="bg-white border border-rose-200 text-black-900 text-sm rounded-lg focus:ring-primary-600 focus:border-rose-300 block w-full p-2.5 hover:border-rose-300">
                            <option selected>Seleccione Empleado</option>
                            @foreach ( $emp as $item )
                                <option value="{{$item->idEmpleados}}">{{$item->nombre_empleado}} {{$item->apellido_empleado}}</option>
                            @endforeach
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
        <h2 class="mb-4 text-3xl font-semibold text-gray-900">Registro Devoluciones</h2>
        <div class="relative shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                   
                    <tr>
                        <th scope="col" class="px-4 py-3">Fecha de Devolucion</th>
                        <th scope="col" class="px-4 py-3">Nº Recepcion</th>
                        <th scope="col" class="px-4 py-3">Suministro</th>
                        <th scope="col" class="px-4 py-3">Estado</th>
                        <th scope="col" class="px-4 py-3">Cantidad Devuelta</th>
                        <th scope="col" class="px-4 py-3">Motivo</th>
                        <th scope="col" class="px-4 py-3">Empleado</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                   
                    
                </thead>
                <tbody>
                    @foreach ( $devo as $item )
                    <tr class="bg-white border-b">
                        <td class="px-4 py-3 text-gray-900">{{$item->fecha_devolucion}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->idRecepcion_mercancia}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->nombre_suministro}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->status}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->cantidad_devuelta}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->motivo}}</td>
                        <td class="px-4 py-3 text-gray-900">{{$item->nombre_empleado}} {{$item->apellido_empleado}}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
