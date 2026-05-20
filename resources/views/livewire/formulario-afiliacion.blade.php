<style>

</style>
<div class="min-h-screen bg-white py-12 px-4 flex items-center justify-center font-sans antialiased text-slate-900">
    <div class="max-w-sm w-full">
        <div class="bg-white p-8">

            <div class="flex flex-col items-center mb-12">

                <div class="card">
                    <div class="globo">
                        Hola soy julieta tu asistente de afiliacion
                    </div>
                </div>
                <div class="relative mb-4">
                    <div>
                        <img src="https://ui-avatars.com/api/?name=Andrea&background=f8fafc&color=003366&bold=true"
                            class="w-16 h-16 rounded-full border border-slate-100 object-cover" alt="Andrea">

                        <div
                            class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full">
                        </div>
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

            <div class="mb-10 text-center">
                <p class="text-sm text-slate-500 leading-relaxed">
                    Ingresa los datos del <span class="text-slate-900 font-semibold">titular de pago</span> para
                    continuar.
                </p>
            </div>

            <form wire:submit.prevent="siguiente" class="space-y-6">
                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold uppercase tracking-wider ml-1">Nombre</label>
                    <input type="text" wire:model.live="nombre" placeholder="Ej: Juan Antonio"
                        class="w-full  py-3 pr-3 pl-3 bg-transparent rounded-lg border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold  uppercase tracking-wider ml-1">Apellido</label>
                    <input type="text" wire:model.live="apellido" placeholder="Ej: Pérez García"
                        class="w-full py-3 pr-3 pl-3 rounded-lg bg-transparent border-b border-slate-200 focus:border-[#003366] transition-colors outline-none text-sm font-medium text-slate-800 placeholder-slate-300">
                </div>

                <button type="submit"
                    class="w-full mt-8 py-4 bg-[#003366] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg transition-all hover:bg-[#002244] active:scale-[0.98] disabled:bg-slate-100 disabled:text-slate-400 flex items-center justify-center gap-2"
                    {{ !$this->getIsValidProperty() ? 'disabled' : '' }}>

                    <span wire:loading.remove wire:target="siguiente">Continuar</span>

                    <span wire:loading wire:target="siguiente" class="flex items-center gap-2">
                        <span class="animate-spin h-3 w-3 border-2 border-white/20 border-t-white rounded-full"></span>
                        <span>Procesando</span>
                    </span>

                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </form>

            <div class="mt-12 flex justify-center items-center gap-2">
                <div class="h-1 w-6 rounded-full bg-[#003366]"></div>
                <div class="h-1 w-1 rounded-full bg-slate-200"></div>
                <div class="h-1 w-1 rounded-full bg-slate-200"></div>
            </div>
        </div>

        <p class="text-center mt-8 text-[9px] text-slate-300 font-medium uppercase tracking-[0.2em]">
            Encriptación 256-bit
        </p>
    </div>
</div>
