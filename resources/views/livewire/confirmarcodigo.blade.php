<div class="min-h-screen bg-white py-12 px-4 flex items-center justify-center font-sans text-slate-900">
    <div class="max-w-sm w-full bg-white p-8">


        <div class="flex flex-col items-center mb-10">
            <img src="https://ui-avatars.com/api/?name=Andrea&background=f8fafc&color=003366&bold=true"
                class="w-14 h-14 rounded-full border border-slate-100 object-cover mb-2" alt="Andrea">
            <h2 class="text-sm font-bold tracking-[0.2em] text-[#003366] uppercase">
                Verificar <span class="text-slate-300 font-light mx-1">|</span>
                <span class="text-[#e30613]">Código</span>
            </h2>
        </div>

 
        <div class="mb-8 text-center px-4">
            <p class="text-sm text-slate-500 leading-relaxed">
                Introduce el <span class="text-slate-900 font-semibold">código de 4 dígitos</span> enviado a tu celular.
            </p>
        </div>

   
        <form wire:submit.prevent="validarCodigo" class="space-y-8">

      
            <div class="flex justify-center gap-3">
                @for ($i = 0; $i < 4; $i++)
                    <input type="text" maxlength="1"
                        class="w-12 h-14 text-center text-xl font-bold text-[#003366] bg-slate-50 border-2 border-slate-100 rounded-xl focus:border-[#e30613] focus:bg-white outline-none transition-all"
                        wire:model="codigo.{{ $i }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g,''); if(this.value.length==1) { this.nextElementSibling?.focus(); }">
                @endfor
            </div>


            <div class="text-center">
                <button type="button"
                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest hover:text-[#003366] transition-colors"
                    wire:click="reenviarCodigo" id="btnReenviar" disabled>
                    Reenviar código en <span class="text-[#e30613]" id="timeCounter">60</span>
                </button>
            </div>


 
            <button type="submit"
                class="w-full py-4 bg-[#e30613] text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-lg transition-all hover:bg-[#c40510] active:scale-[0.98] shadow-lg shadow-red-500/10 flex items-center justify-center gap-2">
                Validar Identidad
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </button>

        </form>

      
        <div class="mt-12 flex justify-center items-center gap-2">
            <div class="h-1 w-1 rounded-full bg-slate-200"></div>
            <div class="h-1 w-1 rounded-full bg-slate-200"></div>
            <div class="h-1 w-6 rounded-full bg-[#e30613]"></div>
            <div class="h-1 w-1 rounded-full bg-slate-200"></div>
        </div>

       
        <p class="text-center mt-8 text-[9px] text-slate-300 font-medium uppercase tracking-[0.2em]">
            Paso 3 de 4: Confirmación de Acceso
        </p>

    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('btnReenviar');
        const counter = document.getElementById('timeCounter');
        let timeLeft = 60;
        let timer;

        function startTimer() {
            
            clearInterval(timer);
            timeLeft = 60;
            counter.textContent = timeLeft;
            btn.disabled = true;

            timer = setInterval(() => {
                if (timeLeft > 0) {
                    timeLeft--;
                    counter.textContent = timeLeft < 10 ? '0' + timeLeft : timeLeft;
                } else {
                    clearInterval(timer);
                    btn.disabled = false;
                }
            }, 1000);
        }

        
        startTimer();

        
        btn.addEventListener('click', function() {
            startTimer();
        });
    });
</script>
