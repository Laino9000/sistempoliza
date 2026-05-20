<div class="min-h-screen bg-white py-12 px-4 flex items-center justify-center font-sans antialiased text-slate-900">
    <div class="max-w-sm w-full">
        <div class="bg-white p-8">

            <div class="flex flex-col items-center mb-10">
                <div class="relative mb-4">
                    <img src="https://ui-avatars.com/api/?name=Andrea&background=f8fafc&color=003366&bold=true"
                        class="w-14 h-14 rounded-full border border-slate-100 object-cover" alt="Andrea">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>
                <h2 class="text-sm font-bold tracking-[0.2em] text-[#003366] uppercase">
                    Método <span class="text-slate-300 font-light mx-1">|</span> <span class="text-[#e30613]">Pago</span>
                </h2>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5 mb-8 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-2 mb-4">
                    <div class="p-1 bg-white rounded-md border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-[#e30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.2em]">Resumen de Póliza</p>
                </div>
                
                <div class="grid grid-cols-2 gap-y-4 mb-4">
                    <div>
                        <p class="text-[9px] text-slate-400 uppercase mb-0.5">Asegurado</p>
                        <p class="text-[11px] font-bold text-[#003366] leading-tight">{{ $nombre }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] text-slate-400 uppercase mb-0.5">Identificación</p>
                        <p class="text-[11px] font-bold text-[#003366]">{{ $identificacion }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] text-slate-400 uppercase mb-0.5">Tipo de Plan</p>
                        <p class="text-[11px] font-bold text-[#003366]">{{ $plan }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] text-slate-400 uppercase mb-0.5">Vence en</p>
                        <p class="text-[11px] font-bold text-[#003366]">{{ $vigencia }}</p>
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-200 flex justify-between items-end">
                    <div>
                        <p class="text-[9px] text-slate-400 uppercase font-bold">Total a pagar</p>
                        <p class="text-[8px] text-slate-400 italic lowercase">Impuestos incluidos*</p>
                    </div>
                    <div class="text-right">
                        <span class="text-lg font-black text-[#e30613] tracking-tight">{{ $monto }} BS.</span>
                    </div>
                </div>
            </div>

            <div class="mb-8 text-center">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.2em] mb-1">Paso Final</p>
                <p class="text-sm text-slate-500 font-light">Elige tu forma de pago:</p>
            </div>

            <form wire:submit.prevent="procesarPago" class="space-y-2">
                <div class="group">
                    <label class="flex flex-col p-5 rounded-2xl border transition-all cursor-pointer {{ $metodoSeleccionado == 'pago_movil' ? 'border-[#e30613]/30 bg-slate-50/30' : 'border-slate-100 hover:border-slate-200' }}"
                           wire:click="seleccionarMetodo('pago_movil')">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 rounded-full {{ $metodoSeleccionado == 'pago_movil' ? 'bg-[#e30613]' : 'bg-slate-200' }}"></div>
                                <div>
                                    <span class="block text-xs font-bold text-[#003366] uppercase tracking-wider">Pago Móvil</span>
                                    <span class="text-[9px] text-slate-400 uppercase tracking-tight">Bolívares (BCV)</span>
                                </div>
                            </div>
                        </div>
                        @if($metodoSeleccionado == 'pago_movil')
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 animate-in fade-in duration-300">
                            <div class="flex justify-between text-[10px] uppercase text-[#003366]">
                                <span class="text-slate-400 font-medium lowercase">Banco</span>
                                <span class="font-bold">Banesco</span>
                            </div>
                            <div class="flex justify-between text-[10px] uppercase text-[#003366]">
                                <span class="text-slate-400 font-medium lowercase">Teléfono</span>
                                <span class="font-bold">0412 000 0000</span>
                            </div>
                        </div>
                        @endif
                    </label>
                </div>

                <div class="group">
                    <label class="flex flex-col p-5 rounded-2xl border transition-all cursor-pointer {{ $metodoSeleccionado == 'zelle' ? 'border-[#e30613]/30 bg-slate-50/30' : 'border-slate-100 hover:border-slate-200' }}"
                           wire:click="seleccionarMetodo('zelle')">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 rounded-full {{ $metodoSeleccionado == 'zelle' ? 'bg-[#e30613]' : 'bg-slate-200' }}"></div>
                                <div>
                                    <span class="block text-xs font-bold text-[#003366] uppercase tracking-wider">Zelle / USD</span>
                                    <span class="text-[9px] text-slate-400 uppercase tracking-tight">Dólares (Zelle)</span>
                                </div>
                            </div>
                        </div>
                        @if($metodoSeleccionado == 'zelle')
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 animate-in fade-in duration-300">
                            <div class="flex justify-between text-[10px] uppercase text-[#003366]">
                                <span class="text-slate-400 font-medium lowercase">Email</span>
                                <span class="font-bold lowercase">pagos@ejemplo.com</span>
                            </div>
                        </div>
                        @endif
                    </label>
                </div>

                <button type="submit"
                    class="w-full mt-8 py-4 bg-[#003366] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-xl transition-all hover:bg-[#e30613] active:scale-[0.98] flex items-center justify-center gap-3">
                    Confirmar suscripción
                </button>
            </form>
        </div>
    </div>
</div>