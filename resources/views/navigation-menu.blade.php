<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-[100]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transform hover:scale-105 transition duration-300">
                        <img src="/image/logo_vida.png" class="block h-16 w-auto" alt="Vida Logo">
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" 
                        class="text-[#003366] font-bold hover:text-[#e30613] border-[#e30613] transition-colors duration-300">
                        {{ __('Panel Principal') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-xl">
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-100 text-sm leading-4 font-bold rounded-xl text-[#003366] bg-gray-50 hover:bg-white hover:shadow-sm transition ease-in-out duration-150">
                                        <span class="w-2 h-2 rounded-full bg-[#e30613] mr-2"></span>
                                        {{ Auth::user()->currentTeam->name }}
                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60 bg-white rounded-2xl shadow-xl border-none">
                                    <div class="block px-4 py-3 text-xs font-black uppercase tracking-widest text-gray-400">
                                        {{ __('Administrar Equipo') }}
                                    </div>
                                    <x-dropdown-link class="hover:bg-red-50 hover:text-[#e30613]" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Ajustes de Equipo') }}
                                    </x-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-[#e30613] rounded-xl focus:outline-none focus:ring-2 focus:ring-red-200 transition p-0.5 shadow-sm">
                                    <img class="size-9 rounded-[10px] object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name ?? '' }}" />
                                </button>
                            @elseif (Auth::user()->name)
                                <span class="inline-flex rounded-xl">
                                    <button type="button" class="inline-flex items-center px-4 py-2 bg-[#003366] text-white rounded-xl font-bold hover:bg-[#002244] transition">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                    </button>
                                </span>
                            @else
                                <span class="inline-flex rounded-xl">
                                    <button type="button" class="inline-flex items-center px-4 py-2 bg-[#003366] text-white rounded-xl font-bold hover:bg-[#002244] transition">
                                        {{ __('Ingresar') }}
                                        <svg class="ms-2 size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="  shadow-2xl">
                                <div class="block px-4 py-3 text-xs font-black uppercase tracking-widest text-gray-400 bg-gray-50">
                                    {{ __('Mi Cuenta') }}
                                </div>
                                <x-dropdown-link href="{{ route('profile.show') }}" class="font-semibold hover:bg-red-50 hover:text-[#e30613]">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" class="font-bold text-red-600 hover:bg-red-50" @click.prevent="$root.submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-[#003366] bg-gray-100 hover:bg-[#e30613] hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100 animate-fade-in-down">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" 
                class="rounded-xl font-bold text-[#003366] active:bg-red-50 active:text-[#e30613]">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>