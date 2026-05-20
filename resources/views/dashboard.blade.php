<x-app-layout>
    <div class="flex  bg-[#f8fafc] font-sans antialiased" x-data="{ sidebarOpen: false }">

        <div class="fixed inset-y-0 left-0  w-72 m-4 transition-all duration-300 transform lg:translate-x-0 lg:static"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <aside class="flex flex-col  bg-[#003366] rounded-[2.5rem] shadow-2xl border border-white/10">
                <div class="p-10 text-center relative overflow-hidden group">
                    <div
                        class="absolute -top-10 -left-10 w-32 h-32 bg-red-500/10 rounded-full blur-3xl group-hover:bg-red-500/20 transition-all duration-500">
                    </div>

                    <div class="relative inline-block">
                        <div
                            class="bg-white rounded-[2rem] p-6 shadow-[0_20px_50px_rgba(0,0,0,0.1)] 
                                    border border-gray-50 transform -rotate-3 group-hover:rotate-0 
                                    group-hover:scale-110 transition-all duration-500 ease-out
                                    relative z-10">

                            <img src="/image/logo_vida.png" alt="Vida Logo"
                                class="h-16 w-auto object-contain transition-transform duration-500 group-hover:scale-105" />
                        </div>

                        <div
                            class="absolute -bottom-2 -right-2 w-8 h-8 bg-[#e30613] rounded-lg shadow-lg 
                                    transform rotate-12 group-hover:rotate-45 transition-all duration-700 
                                    flex items-center justify-center border-4 border-white z-20">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-200/60">
                            Medicina Prepagada
                        </span>
                    </div>
                </div>

                <nav class="flex-1 px-6 space-y-2 mt-4">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-blue-300/50 font-bold px-4 mb-4">Menú
                        Principal</p>

                    <a href="{{ route('dashboard') }}"
                        class="group flex items-center px-4 py-4 text-blue-100/80 hover:text-white hover:bg-white/10 rounded-[1.5rem] transition-all duration-300 relative overflow-hidden">
                        <div
                            class="absolute left-0 w-1 h-0 group-hover:h-8 bg-[#e30613] transition-all duration-300 rounded-r-full">
                        </div>

                        <div
                            class="p-2.5 bg-white/5 rounded-xl mr-4 group-hover:bg-[#e30613] group-hover:shadow-[0_0_15px_rgba(227,6,19,0.4)] transition-all duration-300">
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold tracking-wide group-hover:translate-x-1 transition-transform duration-300">Inicio</span>
                            <span
                                class="text-[10px] text-blue-300/50 font-medium group-hover:translate-x-1 transition-transform duration-300">Panel
                                principal</span>
                        </div>

                        <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 text-white/30"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <a href="{{ route('polizas') }}"
                        class="group flex items-center px-4 py-4 text-blue-100/80 hover:text-white hover:bg-white/10 rounded-[1.5rem] transition-all duration-300 relative overflow-hidden">
                        <div
                            class="absolute left-0 w-1 h-0 group-hover:h-8 bg-[#e30613] transition-all duration-300 rounded-r-full">
                        </div>

                        <div
                            class="p-2.5 bg-white/5 rounded-xl mr-4 group-hover:bg-[#e30613] group-hover:shadow-[0_0_15px_rgba(227,6,19,0.4)] transition-all duration-300">
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold tracking-wide group-hover:translate-x-1 transition-transform duration-300">Pólizas</span>
                            <span
                                class="text-[10px] text-blue-300/50 font-medium group-hover:translate-x-1 transition-transform duration-300">Gestión
                                de seguros</span>
                        </div>

                        <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 text-white/30"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <a href="#"
                        class="group flex items-center px-4 py-4 text-blue-100/80 hover:text-white hover:bg-white/10 rounded-[1.5rem] transition-all duration-300 relative overflow-hidden">
                        <div
                            class="absolute left-0 w-1 h-0 group-hover:h-8 bg-[#e30613] transition-all duration-300 rounded-r-full">
                        </div>

                        <div
                            class="p-2.5 bg-white/5 rounded-xl mr-4 group-hover:bg-[#e30613] group-hover:shadow-[0_0_15px_rgba(227,6,19,0.4)] transition-all duration-300">
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold tracking-wide group-hover:translate-x-1 transition-transform duration-300">Consultas</span>
                            <span
                                class="text-[10px] text-blue-300/50 font-medium group-hover:translate-x-1 transition-transform duration-300">Historial
                                médico</span>
                        </div>

                        <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 text-white/30"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <a href="#"
                        class="group flex items-center px-4 py-4 text-blue-100/80 hover:text-white hover:bg-white/10 rounded-[1.5rem] transition-all duration-300 relative overflow-hidden">
                        <div
                            class="absolute left-0 w-1 h-0 group-hover:h-8 bg-[#e30613] transition-all duration-300 rounded-r-full">
                        </div>

                        <div
                            class="p-2.5 bg-white/5 rounded-xl mr-4 group-hover:bg-[#e30613] group-hover:shadow-[0_0_15px_rgba(227,6,19,0.4)] transition-all duration-300">
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold tracking-wide group-hover:translate-x-1 transition-transform duration-300">
                                Usuarios
                            </span>
                            <span
                                class="text-[10px] text-blue-300/50 font-medium group-hover:translate-x-1 transition-transform duration-300">
                                Gestión de personal
                            </span>
                        </div>

                        <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 text-white/30"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </nav>

                <div class="p-6">
                    <div class="bg-white/5 rounded-[2rem] p-4 border border-white/10 text-center">
                        <img class="h-16 w-16 rounded-2xl mx-auto border-2 border-[#e30613] p-0.5 shadow-lg shadow-red-500/20"
                            src="{{ Auth::user()->profile_photo_url }}" alt="">
                        <p class="text-white mt-3 font-bold text-sm">{{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="text-[10px] text-red-400 font-black uppercase tracking-widest mt-2 hover:text-red-300 transition-colors italic">Desconectar</button>
                        </form>
                    </div>
                </div>
            </aside>
        </div>

        <div class="flex-1 flex flex-col p-4 lg:p-8 overflow-hidden">
       
            @if (empty($slot))
                <livewire:dashboard />
            @else 
                {{ $slot }}
            @endif
        </div>
    </div>
</x-app-layout>
