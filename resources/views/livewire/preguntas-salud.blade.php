<div>
    <div class="min-h-screen bg-white py-12 px-4 flex items-center justify-center font-sans antialiased text-slate-900">
        <div class="max-w-sm w-full">
            <div class="bg-white p-8">

                <div class="flex flex-col items-center mb-10">
                    <div class="relative mb-4">
                        <img src="https://ui-avatars.com/api/?name=Andrea&background=f8fafc&color=003366&bold=true"
                            class="w-14 h-14 rounded-full border border-slate-100 object-cover" alt="Andrea">
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full">
                        </div>
                    </div>
                    <h2 class="text-sm font-bold tracking-[0.2em] text-[#003366] uppercase">
                        Declaración <span class="text-slate-300 font-light mx-1">|</span> <span
                            class="text-[#e30613]">Salud</span>
                    </h2>
                </div>

                <div class="mb-8">
                    <p class="text-sm text-slate-500 leading-relaxed text-center">
                        Para brindarte la mejor cobertura, ¿padeces o has padecido alguna de estas condiciones?
                    </p>
                </div>

                <form wire:submit.prevent="guardarSalud" class="space-y-3">

                    <label
                        class="relative flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition-all group">
                        <input type="checkbox" wire:model="condiciones" value="tension" class="sr-only peer">
                        <div
                            class="w-5 h-5 rounded-md border border-slate-300 bg-white flex items-center justify-center peer-checked:bg-[#003366] peer-checked:border-[#003366] transition-all">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="ml-4 text-xs font-semibold text-slate-600 group-hover:text-[#003366]">Hipertensión
                            o Tensión Alta</span>
                    </label>

                    <label
                        class="relative flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition-all group">
                        <input type="checkbox" wire:model="condiciones" value="diabetes" class="sr-only peer">
                        <div
                            class="w-5 h-5 rounded-md border border-slate-300 bg-white flex items-center justify-center peer-checked:bg-[#003366] peer-checked:border-[#003366] transition-all">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="ml-4 text-xs font-semibold text-slate-600 group-hover:text-[#003366]">Diabetes o
                            Azúcar en Sangre</span>
                    </label>

                    <label
                        class="relative flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition-all group">
                        <input type="checkbox" wire:model="condiciones" value="corazon" class="sr-only peer">
                        <div
                            class="w-5 h-5 rounded-md border border-slate-300 bg-white flex items-center justify-center peer-checked:bg-[#003366] peer-checked:border-[#003366] transition-all">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="ml-4 text-xs font-semibold text-slate-600 group-hover:text-[#003366]">Afecciones
                            Cardíacas</span>
                    </label>

                    <label
                        class="relative flex items-center p-4 rounded-xl border border-slate-100 bg-slate-50/50 cursor-pointer hover:bg-slate-50 transition-all group">
                        <input type="checkbox" wire:model="ninguna" class="sr-only peer">
                        <div
                            class="w-5 h-5 rounded-md border border-slate-300 bg-white flex items-center justify-center peer-checked:bg-emerald-500 peer-checked:border-emerald-500 transition-all">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span
                            class="ml-4 text-xs font-bold text-slate-400 peer-checked:text-emerald-600 uppercase tracking-widest">Ninguna
                            de las anteriores</span>
                    </label>

                    <button type="submit"
                        class="w-full mt-8 py-4 bg-[#003366] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg transition-all hover:bg-[#002244] active:scale-[0.98] flex items-center justify-center gap-2">
                        Continuar registro
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </form>

                <div class="mt-10 flex justify-center items-center gap-2">
                    <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                    <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                    <div class="h-1 w-6 rounded-full bg-[#003366]"></div>
                    <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                </div>
            </div>
        </div>
    </div>
</div>
