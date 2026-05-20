<div>
    <header class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-[#003366] italic tracking-tight uppercase">Panel Principal</h1>
            <p class="text-gray-400 text-sm font-medium">Hola de nuevo, {{ Auth::user()->name }} 👋</p>
        </div>

        <div class=" items-center space-x-4">
            <div class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-2 px-4">
                <div class="h-2 w-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-bold text-gray-500 uppercase">Sistema Activo</span>
            </div>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">

        <div
            class="group relative bg-white/70 backdrop-blur-xl rounded-[3rem] p-1 transition-all duration-500 hover:shadow-[0_40px_80px_-20px_rgba(227,6,19,0.2)]">
            <div class="bg-white rounded-[2.8rem] p-8 h-full border border-gray-100 relative overflow-hidden">
                <span
                    class="absolute -right-4 -bottom-6 text-9xl font-black text-gray-50 italic opacity-50 group-hover:opacity-100 group-hover:-translate-y-4 transition-all duration-700 select-none">48</span>

                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-10">
                        <div class="relative">
                            <div
                                class="absolute inset-0 bg-[#e30613] blur-lg opacity-20 group-hover:opacity-40 transition-opacity">
                            </div>
                            <div
                                class="relative bg-gradient-to-br from-[#e30613] to-[#ff4d5a] p-4 rounded-2xl shadow-lg transform group-hover:rotate-6 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="text-[10px] font-black text-[#e30613] bg-red-50 px-3 py-1 rounded-full uppercase tracking-tighter shadow-sm border border-red-100">Hot
                                +12%</span>
                        </div>
                    </div>

                    <p class="text-[11px] font-black text-[#003366]/40 uppercase tracking-[0.3em] mb-2">Pólizas
                        Hoy</p>
                    <div class="flex flex-col">
                        <h3 class="text-6xl font-black text-[#003366] italic tracking-tighter leading-none">48
                        </h3>
                        <span class="mt-2 text-xs font-bold text-gray-400">Emisiones activas</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="group relative bg-[#003366] rounded-[3rem] p-1 transition-all duration-500 hover:shadow-[0_40px_80px_-20px_rgba(0,51,102,0.6)]">
            <div class="bg-[#003366] rounded-[2.8rem] p-8 h-full border border-white/10 relative overflow-hidden">
                <div
                    class="absolute -left-20 -top-20 w-64 h-64 bg-red-600/20 rounded-full blur-[80px] group-hover:translate-x-20 group-hover:translate-y-20 transition-all duration-1000">
                </div>

                <div class="relative z-10 h-full flex flex-col">
                    <div class="flex justify-between items-center mb-10">
                        <div
                            class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20 group-hover:bg-white group-hover:scale-110 transition-all duration-500">
                            <svg class="w-6 h-6 text-white group-hover:text-[#003366]" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-green-400 shadow-[0_0_15px_rgba(74,222,128,0.5)] animate-pulse">
                        </div>
                    </div>

                    <p class="text-[11px] font-black text-blue-300 uppercase tracking-[0.3em] mb-2">Total
                        Usuarios</p>
                    <div class="mt-auto">
                        <h3 class="text-6xl font-black text-white italic tracking-tighter leading-none mb-4">
                            1,240</h3>
                        <div class="flex items-center gap-2">
                            <div class="flex -space-x-3">
                                <img class="w-8 h-8 rounded-full border-2 border-[#003366]"
                                    src="https://ui-avatars.com/api/?name=J&bg=e30613&color=fff" alt="">
                                <img class="w-8 h-8 rounded-full border-2 border-[#003366]"
                                    src="https://ui-avatars.com/api/?name=A&bg=003366&color=fff" alt="">
                                <div
                                    class="w-8 h-8 rounded-full border-2 border-[#003366] bg-gray-800 flex items-center justify-center text-[10px] text-white font-bold">
                                    +5</div>
                            </div>
                            <span class="text-[10px] text-blue-200/50 font-bold uppercase">Online ahora</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="flex-1 bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 border border-white p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8">
            <button
                class="bg-gray-50 text-[#003366] font-bold py-2 px-6 rounded-xl hover:bg-[#e30613] hover:text-white transition-all duration-300 text-sm shadow-sm">
                + Nueva Orden
            </button>
        </div>

        <h3 class="text-xl font-black text-[#003366] italic mb-6">Actividad de hoy</h3>

        <div
            class="border-2 border-dashed border-gray-100 rounded-[2rem] h-[calc(100%-4rem)] flex items-center justify-center">
            <div class="text-center">
                <div class="bg-gray-50 p-6 rounded-full inline-block mb-4">
                    <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <p class="text-gray-300 font-medium">No hay registros recientes para mostrar.</p>
            </div>
        </div>
    </div>
</div>
