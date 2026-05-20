<x-guest-layout>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-slate-50 to-red-50">
        <div
            class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-[0_10px_40px_rgba(0,0,0,0.08)] overflow-hidden sm:rounded-2xl border border-gray-100">

            <div class="flex justify-center items-center h-32">
                <a href="/">
                    <img src="/image/logo_vida.png" alt="Vida Logo" class="w-56">
                </a>
            </div>

            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-[#003366]">Bienvenido</h2>
                <p class="text-sm text-gray-500">Ingresa tus credenciales para continuar</p>
            </div>

            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg border border-green-200">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Correo Electrónico') }}"
                        class="text-xs uppercase tracking-wider font-semibold text-gray-600 mb-1" />
                    <x-input id="email"
                        class="block mt-1 w-full bg-gray-50 border-gray-200 focus:bg-white focus:border-[#e30613] focus:ring-[#e30613] rounded-xl shadow-sm transition-all duration-200"
                        type="text" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-5">
                    <x-label for="password" value="{{ __('Contraseña') }}"
                        class="text-xs uppercase tracking-wider font-semibold text-gray-600 mb-1" />
                    <x-input id="password"
                        class="block mt-1 w-full bg-gray-50 border-gray-200 focus:bg-white focus:border-[#e30613] focus:ring-[#e30613] rounded-xl shadow-sm transition-all duration-200"
                        type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember"
                            class="rounded text-[#e30613] focus:ring-[#e30613]" />
                        <span class="ms-2 text-sm text-gray-500 font-medium">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#003366] font-semibold hover:text-[#e30613] transition-colors duration-200"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu clave?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-8">
                    <button
                        class="w-full inline-flex justify-center items-center px-6 py-3 bg-[#e30613] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-[#c40510] active:bg-[#a3040d] focus:outline-none focus:ring-2 focus:ring-[#e30613] focus:ring-offset-2 transition-all duration-200 shadow-lg shadow-red-200 transform hover:-translate-y-0.5">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-400">© {{ date('Y') }} Vida Medicina Prepagada. Todos los derechos
                    reservados.</p>
            </div>
        </div>
    </div>
</x-guest-layout>

