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
                    Confirmar <span class="text-slate-300 font-light mx-1">|</span> <span
                        class="text-[#e30613]">Pago</span>
                </h2>
            </div>

            <div class="mb-8 text-center">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.2em] mb-1">Verificación</p>
                <p class="text-sm text-slate-500 font-light">Ingresa los datos de tu transferencia</p>
            </div>

            <form wire:submit.prevent="confirmarPago" class="space-y-5">

                <div class="space-y-1.5">
                    <label
                        class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Referencia</label>
                    <input type="text" wire:model="reference_number" placeholder="Últimos 6 u 8 dígitos"
                        maxlength="8"
                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:outline-none focus:border-[#003366]/20 transition-all placeholder:text-slate-300 text-[#003366] font-medium">
                    @error('reference_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Monto
                        Pagado</label>
                    <input type="text" wire:model="amount" placeholder="Ej: 25.00" maxlength="30"
                        class="w-full p-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:outline-none focus:border-[#003366]/20 transition-all placeholder:text-slate-300 text-[#003366] font-medium">
                    @error('amount')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Soporte de
                        pago</label>
                    <div class="relative group">
                        <input type="file" wire:model="foto_pago" id="fileInput" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div
                            class="flex flex-col items-center justify-center p-8 border-2 border-dashed border-slate-100 rounded-3xl group-hover:border-[#e30613]/20 group-hover:bg-slate-50/50 transition-all duration-300">

                            <div
                                class="w-24 h-24 bg-slate-50 rounded-2xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform overflow-hidden">
                                <img id="previewImg" src="https://via.placeholder.com/150" alt="Vista previa"
                                    class="w-full h-full object-cover">
                            </div>

                            <span id="fileName"
                                class="text-[9px] text-slate-400 uppercase font-bold tracking-tighter">Subir captura o
                                PDF</span>
                        </div>
                        @error('foto_pago')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-[#003366] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-2xl transition-all hover:bg-[#e30613] hover:shadow-lg hover:shadow-red-500/10 active:scale-[0.97] flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Confirmar Reporte
                    </button>

                    <button type="button"
                        class="w-full mt-4 text-[9px] text-slate-300 uppercase font-bold tracking-widest hover:text-slate-400 transition-colors">
                        Cancelar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {

                previewImg.src = e.target.result;

                fileName.textContent = file.name;
            }

            reader.readAsDataURL(file);
        }
    });
</script>
