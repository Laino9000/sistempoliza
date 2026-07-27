<div>
    <h1 class="text-3xl font-black text-[#003366] italic tracking-tight uppercase">Panel Principal</h1>
    <p class="text-gray-400 text-sm font-medium">Polizas</p>

    <div class="flex items-center gap-4 mt-6">
       
        <a href="{{ route('cargaUnidades') }}"
            class="bg-[#003366] text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-blue-900/20 hover:bg-[#002244] transition-all active:scale-95 uppercase tracking-wide">
            Nueva Póliza
        </a>
        
        <a href="{{ route('cargaMasiva') }}"
            class="border-2 border-[#003366] text-[#003366] px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-[#003366] hover:text-white transition-all active:scale-95 uppercase tracking-wide">
            Pólizas Masivas
        </a>
    </div>

    <div class="mt-8 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="w-full text-left border-collapse">

            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider">Nº Póliza</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider">Asegurado</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider">Vencimiento</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-4 text-xs font-bold text-[#003366] uppercase tracking-wider text-right">Acción
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($polizas as $poliza)
                    <tr class="hover:bg-blue-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                            @if ($poliza->policy_number)
                                {{ $poliza->policy_number }}
                            @else
                                Sin Número
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $poliza->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $poliza->asegurdado->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($poliza->end_date)->translatedFormat('Y M d') }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Activa
                            </span>
                        </td>
                        <td>
                            <button class="p-2 bg-amber-300 rounded-xl font-medium"
                                wire:click="toggleMenu({{ $poliza->id }})">
                                Opciones
                            </button>

                            @if ($openMenuId === $poliza->id)
                                <div
                                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Ver
                                        Detalle</a>
                                    <button wire:click="descargarPdf({{ $poliza->id }})"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                        Descargar PDF
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
