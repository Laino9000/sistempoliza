<div>
    <h1 class="text-3xl font-black text-[#003366] italic tracking-tight uppercase">Carga Masiva</h1>
    <p class="text-gray-400 text-sm font-medium">Sube tu archivoo CSV para procesar las pólizas</p>



    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6 w-full">


        <div x-data="{ nombre: '', peso: '' }">
            <div class="flex items-center justify-center w-full">
                <label
                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-[#003366] border-dashed rounded-2xl cursor-pointer transition-colors
                {{ $cargado ? 'bg-gray-100 cursor-not-allowed opacity-60' : 'bg-blue-50/50 hover:bg-blue-50' }}">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <template x-if="!nombre">
                            <div class="flex flex-col items-center">
                                <svg class="w-10 h-10 mb-3 {{ $cargado ? 'text-gray-400' : 'text-[#003366]' }}"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm {{ $cargado ? 'text-gray-400' : 'text-[#003366]' }}">
                                    <span class="font-bold">Haz clic para subir</span> o arrastra y suelta
                                </p>
                                <p class="text-xs text-gray-500">Excel, CSV (Máx. 10MB)</p>
                            </div>
                        </template>
                        <template x-if="nombre">
                            <div class="flex flex-col items-center">
                                <svg class="w-10 h-10 mb-3 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="mb-2 text-sm text-[#003366] font-bold text-center break-all max-w-[250px]"
                                    x-text="nombre"></p>
                                <p class="text-xs text-gray-500" x-text="peso"></p>
                            </div>
                        </template>
                    </div>
                    <input type="file" wire:model="archivo" accept=".xlsx, .xls, .csv" class="hidden"
                        {{ $cargado ? 'disabled' : '' }}
                        @change="
                        if(!{{ $cargado ? 'true' : 'false' }}) {
                            let file = $event.target.files[0];
                            if(file) {
                                nombre = file.name;
                                let bytes = file.size;
                                if(bytes < 1024) peso = bytes + ' B';
                                else if(bytes < 1048576) peso = (bytes/1024).toFixed(2) + ' KB';
                                else peso = (bytes/1048576).toFixed(2) + ' MB';
                            }
                        }
                    " />
                </label>
            </div>
            <div class="min-h-[24px] mt-1.5 flex items-center">
                @error('archivo')
                    <div class="flex items-center gap-2 text-xs font-medium text-red-400 tracking-wide animate-fade-in">
                        <span
                            class="w-1.5 h-1.5 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)] shrink-0"></span>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div x-data="{ nombre: '', peso: '' }">
            <label
                class="flex flex-col items-center justify-center w-full h-48 border-2 border-[#003366] border-dashed rounded-2xl cursor-pointer transition-colors
            {{ $cargado ? 'bg-gray-100 cursor-not-allowed opacity-60' : 'bg-blue-50/50 hover:bg-blue-50' }}">

                <template x-if="!nombre">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-10 h-10 mb-3 {{ $cargado ? 'text-gray-400' : 'text-[#003366]' }}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 19V5a2 2 0 012-2h4l2 2h4a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M12 10v6" />
                        </svg>
                        <p class="mb-2 text-sm {{ $cargado ? 'text-gray-400' : 'text-[#003366]' }}">
                            <span class="font-bold">Haz clic para subir</span> o arrastra y suelta
                        </p>
                        <p class="text-xs text-gray-500">Archivo ZIP con imágenes (Máx. 50MB)</p>
                    </div>
                </template>

                <template x-if="nombre">
                    <div class="flex flex-col items-center">
                        <svg class="w-10 h-10 mb-3 text-orange-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="mb-2 text-sm text-[#003366] font-bold text-center break-all max-w-[250px]"
                            x-text="nombre"></p>
                        <p class="text-xs text-gray-500" x-text="peso"></p>
                    </div>
                </template>

                <input type="file" wire:model="archivoZIP" accept=".zip" class="hidden"
                    {{ $cargado ? 'disabled' : '' }}
                    @change="
                    if(!{{ $cargado ? 'true' : 'false' }}) {
                        let file = $event.target.files[0];
                        if(file) {
                            nombre = file.name;
                            let bytes = file.size;
                            if(bytes < 1024) peso = bytes + ' B';
                            else if(bytes < 1048576) peso = (bytes/1024).toFixed(2) + ' KB';
                            else peso = (bytes/1048576).toFixed(2) + ' MB';
                        }
                    }
                " />
            </label>
            <div class="min-h-[24px] mt-1.5 flex items-center">
                @error('archivoZIP')
                    <div class="flex items-center gap-2 text-xs font-medium text-red-400 tracking-wide animate-fade-in">
                        <span
                            class="w-1.5 h-1.5 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)] shrink-0"></span>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>


    </div>

    @if ($cargado)
        <button wire:click="limpiar"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md border border-gray-300 bg-white text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50 font-medium text-xs tracking-wide transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-400">

            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>

            <span>Limpiar</span>
        </button>
    @endif



    <div class="mt-10">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-[#003366] uppercase tracking-wider">Revisión de Datos</h2>

            <div>
                <button wire:click="cargarPolizas"
                    class="bg-sky-950 text-white px-4 py-2 rounded-lg font-bold text-xs hover:bg-sky-900 transition-all uppercase shadow-md">
                    Cargar todo
                </button>
                @if ($datos)
                    <button wire:click="procesarArchivo"
                        class="bg-orange-600 text-white px-4 py-2 rounded-lg font-bold text-xs hover:bg-orange-700 transition-all uppercase shadow-md">
                        Procesar archivo
                    </button>
                @endif
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase">Fila</th>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase">Asegurado</th>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase">Documento</th>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase">Edad</th>
                        <th class=" text-xs font-bold text-[#003366] uppercase">Telefono</th>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase text-center">Imagen</th>
                        <th class="px-4 text-xs font-bold text-[#003366] uppercase text-right">Costo</th>
                        <th class="px-6 py-3 text-xs font-bold text-[#003366] uppercase text-right">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $montoTotal = 0;
                    @endphp
                    @forelse($datos as $fila)
                        @php
                           
                            if (($fila->Edad ?? 0) <= 50) {
                                $pagar = 25;
                            } elseif ($fila->Edad <= 70) {
                                $pagar = 50;
                            } elseif ($fila->Edad <= 85) {
                                $pagar = 75;
                            } elseif ($fila->Edad <= 120) {
                                $pagar = 100;
                            } else {
                                $pagar = 0;
                            }

                          
                            $montoTotal += $pagar;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $fila->Asegurado ?? '' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $fila->Documento ?? '' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $fila->Edad ?? '' }}</td>
                            <td class=" text-sm text-gray-700">{{ $fila->Telefono ?? '' }}</td>
                            <td class="px-6 py-4 text-sm text-center">
                                @if ($fila->tiene_imagen ?? false)
                                    <span class="text-xs font-bold text-green-600 bg-green-100 px-2 py-1 rounded">
                                        ✅ Imagen
                                    </span>
                                @else
                                    <span class="text-xs font-bold text-red-600 bg-red-100 px-2 py-1 rounded">
                                        ❌ Sin imagen
                                    </span>
                                @endif
                            </td>
                            <td class=" text-sm text-gray-700 text-right font-medium">
                                ${{ number_format($pagar, 2) }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-xs font-bold text-green-600 bg-green-100 px-2 py-1 rounded">
                                    Listo
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-400">
                                No hay datos para mostrar. Sube un archivo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if ($datos && count($datos) > 0)
                    <tfoot class="bg-gray-50 border-t-2 border-gray-200">
                        <tr>
                            <td colspan="6"
                                class=" text-sm font-bold text-[#003366] text-right uppercase tracking-wider">
                                Total General:
                            </td>
                            <td class=" text-sm font-black text-orange-600 text-right bg-orange-50/50">
                                ${{ number_format($montoTotal, 2) }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>

</div>
