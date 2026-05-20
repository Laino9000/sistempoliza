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
                    Julieta <span class="text-slate-300 font-light mx-1">|</span> <span
                        class="text-[#e30613]">Seguridad</span>
                </h2>
            </div>

            <div class="flex justify-center mb-8">
                <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center relative">
                    <div class="absolute inset-0 bg-slate-100 rounded-full animate-ping opacity-20"></div>
                    <svg class="w-8 h-8 text-[#003366] relative z-10" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                </div>
            </div>

            <div class="mb-8 text-center">
                <p class="text-sm text-slate-500 leading-relaxed">
                    Enviaremos un <span
                        class="text-slate-900 font-semibold underline decoration-slate-200 underline-offset-4">código de
                        verificación</span> a tu celular.
                </p>
            </div>

            <form wire:submit.prevent="enviarCodigo" class="space-y-6">
                <div class="space-y-2">
                    <div class="flex items-center justify-between ml-1">
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            Número de Celular
                        </label>
                        <span
                            class="flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-[9px] font-black text-emerald-600 uppercase tracking-tighter border border-emerald-100">
                            <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            Vía WhatsApp
                        </span>
                    </div>

                    <div class="relative flex items-center">
                        <input type="" wire:model.live="numero" maxlength="13" placeholder="4120000000"
                            class="{{ $this->getIsValidProperty() ? 'text-slate-800 border-[#014180]' : 'text-red-600 border-[#ef3333]' }} w-full py-3 pl-3 pr-10 rounded-lg bg-transparent border-2 border-slate-200  transition-colors outline-none text-base font-medium  placeholder-slate-300 tracking-[0.05em]">

                        <div class="absolute right-2 text-emerald-500 opacity-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                    </div>

                </div>

                <button type="submit"
                    class="w-full mt-6 py-4 bg-[#e30613] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg transition-all hover:bg-[#c40510] active:scale-[0.98] disabled:bg-slate-100 disabled:text-slate-400 flex items-center justify-center gap-2"
                    {{ !$this->getIsValidProperty() ? 'disabled' : '' }}>

                    <span wire:loading.remove>Enviar Código</span>
                    <span wire:loading class="flex items-center gap-2">
                        
                        <span>Enviar Código</span>
                    </span>

                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </form>

            <div class="mt-12 flex justify-center items-center gap-2">
                <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                <div class="h-1 w-6 rounded-full bg-[#e30613]"></div>
                <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                <div class="h-1 w-1 rounded-full bg-slate-200"></div>
            </div>
        </div>

        <p class="text-center mt-8 text-[9px] text-slate-300 font-medium uppercase tracking-[0.2em]">
            Paso 2 de 4: Validación de Identidad
        </p>
    </div>
</div>
