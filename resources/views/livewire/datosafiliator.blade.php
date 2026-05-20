    <div>
        <div
            class="min-h-screen bg-white py-12 px-4 flex items-center justify-center font-sans antialiased text-slate-900">
            <div class="max-w-sm w-full">
                <div class="bg-white p-8">

                    <div class="flex flex-col items-center mb-10">
                        <div class="relative mb-4">
                            <img src="https://ui-avatars.com/api/?name=Julieta&background=f8fafc&color=003366&bold=true"
                                class="w-16 h-16 rounded-full border border-slate-100 object-cover" alt="Julieta">
                            <div
                                class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full">
                            </div>
                        </div>
                        <h2 class="text-sm font-bold tracking-[0.2em] text-[#003366] uppercase">
                            Julieta <span class="text-slate-300 font-light mx-1">|</span> <span
                                class="text-[#e30613]">Vida</span>
                        </h2>
                        <p class="text-[9px] font-medium text-slate-400 uppercase tracking-widest mt-1">
                            Asistente de Afiliación
                        </p>
                    </div>

                    <div class="mb-8 text-center">
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Ingresa los datos del <span class="text-slate-900 font-semibold">afiliado</span> y su
                            documento de identidad.
                        </p>
                    </div>

                    <form wire:submit.prevent="guardarAfiliado" class="space-y-5">

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Nombre del
                                Afiliado</label>
                            <input type="text" wire:model.live="nombre" placeholder="Ej: Maria Eugenia" maxlength="20"
                                class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Apellido</label>
                            <input type="text" wire:model.live="apellido" placeholder="Ej: Lopez" maxlength="20"
                                class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Cédula de
                                Identidad</label>

                            <div class="flex gap-2" x-data="{
                                open: false,
                                selected: @entangle('tipo_documento'),
                                options: ['V', 'E', 'J', 'P']
                            }">
                                <div class="relative w-20">
                                    <button type="button" @click="open = !open" @click.away="open = false"
                                        class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] flex items-center justify-between outline-none transition-all"
                                        :class="open ? 'border-[#003366] ring-1 ring-[#003366]/10' : ''">
                                        <span class="text-sm font-bold text-slate-800" x-text="selected || 'V'"></span>
                                        <svg class="h-4 w-4 text-slate-400 transition-transform"
                                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        class="absolute z-50 mt-1 w-full bg-white border border-slate-100 rounded-xl shadow-xl overflow-hidden">
                                        <template x-for="option in options" :key="option">
                                            <div @click="selected = option; open = false"
                                                class="px-4 py-3 text-sm font-medium text-slate-600 hover:bg-[#f8fafc] hover:text-[#003366] cursor-pointer transition-colors flex items-center justify-between"
                                                :class="selected === option ? 'bg-slate-50 text-[#003366] font-bold' : ''">
                                                <span x-text="option"></span>
                                                <svg x-show="selected === option" class="w-3.5 h-3.5"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <input type="text" wire:model.live="cedula" placeholder="00.000.000" maxlength="10"
                                        class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Número de
                                Teléfono</label>

                            <div class="flex gap-2" x-data="{
                                open: false,
                                selected: @entangle('prefijo'),
                                options: [
                                    { code: '+58', label: 'VE' },
                                    { code: '+57', label: 'CO' },
                                    { code: '+1', label: 'US' },
                                    { code: '+34', label: 'ES' }
                                ]
                            }">
                                <div class="relative w-20">
                                    <button type="button" @click="open = !open" @click.away="open = false"
                                        class="w-full py-3 px-3 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] flex items-center justify-between outline-none transition-all"
                                        :class="open ? 'border-[#003366] ring-1 ring-[#003366]/10' : ''">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-bold text-slate-800"
                                                x-text="selected || '+58'"></span>
                                        </div>
                                        <svg class="h-4 w-4 text-slate-400 transition-transform"
                                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        class="absolute z-50 mt-1 w-full bg-white border border-slate-100 rounded-xl shadow-xl overflow-hidden">
                                        <template x-for="option in options" :key="option.code">
                                            <div @click="selected = option.code; open = false"
                                                class="px-4 py-3 text-sm font-medium text-slate-600 hover:bg-[#f8fafc] hover:text-[#003366] cursor-pointer transition-colors flex items-center justify-between"
                                                :class="selected === option.code ? 'bg-slate-50 text-[#003366] font-bold' : ''">
                                                <span x-text="option.code"></span>
                                                <span class="text-[10px] text-slate-400 font-bold"
                                                    x-text="option.label"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <input type="tel" wire:model.live="telefono" placeholder="412 000 0000" maxlength="12"
                                        class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5" x-data="{
                            open: false,
                            search: '',
                            selected: @entangle('edad'),
                            options: Array.from({ length: 83 }, (_, i) => (i + 18).toString()), // Edades de 18 a 100
                            get filteredOptions() {
                                return this.options.filter(i => i.startsWith(this.search))
                            }
                        }">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Edad del
                                Afiliado</label>

                            <div class="relative">
                                <div class="relative">
                                    <input type="text" x-model="search" @click="open = true"
                                        @click.away="open = false"
                                        :placeholder="selected ? selected : 'Selecciona o busca edad...'"
                                        class="w-full py-3 px-4 bg-transparent rounded-lg border border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-400">
                                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">

                                    </div>
                                </div>

                                <div x-show="open && filteredOptions.length > 0" x-transition
                                    class="absolute z-50 mt-1 w-full max-h-48 overflow-y-auto bg-white border border-slate-100 rounded-lg shadow-xl">
                                    <template x-for="option in filteredOptions" :key="option">
                                        <div @click="selected = option; search = ''; open = false"
                                            class="px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#003366] cursor-pointer transition-colors border-b border-slate-50 last:border-b-0"
                                            x-text="option"></div>
                                    </template>
                                </div>

                                <div x-show="open && filteredOptions.length === 0"
                                    class="absolute z-50 mt-1 w-full bg-white border border-slate-100 rounded-lg p-3 text-[10px] text-slate-400 uppercase text-center">
                                    No se encontraron resultados
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Foto de la
                                Cédula</label>

                            <div class="relative">
                                <label
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-200 rounded-xl hover:bg-slate-50 transition-colors cursor-pointer overflow-hidden">

                                    @if ($foto_cedula ?? '')
                                        <img src="{{ $foto_cedula->temporaryUrl() }}"
                                            class="absolute inset-0 w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                            <span class="text-white text-[10px] font-bold uppercase">Cambiar
                                                Foto</span>
                                        </div>
                                    @else
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-6 h-6 mb-2 text-slate-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <p
                                                class="text-[10px] text-slate-400 font-medium uppercase tracking-tighter">
                                                Subir o Tomar Foto</p>
                                        </div>
                                    @endif

                                    <input type="file" class="hidden" wire:model="foto_cedula" accept="image/*"
                                        capture="environment" />
                                </label>
                            </div>
                            @error('foto_cedula')
                                <span class="text-[10px] text-red-500 font-bold ml-1 uppercase">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full mt-4 py-4 bg-[#003366] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg transition-all hover:bg-[#002244] active:scale-[0.98] disabled:bg-slate-100 disabled:text-slate-400 flex items-center justify-center gap-2">

                            <span wire:loading.remove wire:target="guardarAfiliado">Finalizar Registro</span>

                            <span wire:loading wire:target="guardarAfiliado" class="flex items-center gap-2">
                                <span
                                    class="animate-spin h-3 w-3 border-2 border-white/20 border-t-white rounded-full"></span>
                                <span>Procesando</span>
                            </span>

                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </form>

                    <div class="mt-10 flex justify-center items-center gap-2">
                        <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                        <div class="h-1 w-6 rounded-full bg-[#003366]"></div>
                        <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                    </div>
                </div>

                <p class="text-center mt-8 text-[9px] text-slate-300 font-medium uppercase tracking-[0.2em]">
                    Encriptación 256-bit
                </p>
            </div>
        </div>
    </div>
