<div class="p-6 bg-gray-50 min-h-screen">
    @if (session()->has('message'))
        <div
            class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg relative flex justify-between items-center">
            <span>{{ session('message') }}</span>
            <button onclick="this.parentElement.remove()"
                class="font-bold text-green-800 hover:text-green-900">&times;</button>
        </div>
    @endif


    <div class="mb-6 flex items-center justify-between gap-4 w-full">
        <div class="flex-1 max-w-md">
            <input wire:model.live.debounce.300ms="search" type="text"
                placeholder="Buscar por nombre, email o número..."
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-sm">
        </div>

        <button wire:click="create"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition shadow-sm flex items-center justify-center gap-2 whitespace-nowrap shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="hidden sm:inline">Nuevo Usuario</span>
            <span class="sm:hidden">Nuevo</span> </button>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Número</th>
                        <th class="px-6 py-3">Rol</th>
                        <th class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-mono text-gray-500">#{{ $user->id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->number ?? 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->role == '1' ? 'bg-red-100 text-red-800' : ($user->role == '2' ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800') }}">
                                    @if ($user->role == '1')
                                        Administrador
                                    @elseif ($user->role == '2')
                                        Usuario
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div x-data="{ open: false }" @click.away="open = false"
                                    class="relative inline-block text-left">

                                    <button @click="open = !open" type="button"
                                        class="flex items-center text-gray-500 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>

                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 divide-y divide-gray-100"
                                        style="display: none;">
                                        <div class="py-1">
                                            <button wire:click="edit({{ $user->id }})" @click="open = false"
                                                type="button"
                                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center gap-2 transition">
                                                <svg class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </button>
                                        </div>

                                        <div class="py-1">
                                            <button wire:click="delete({{ $user->id }})"
                                                onclick="confirm('¿Estás seguro de eliminar este usuario?') || event.stopImmediatePropagation()"
                                                @click="open = false" type="button"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-900 flex items-center gap-2 transition">
                                                <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                                No se encontraron usuarios que coincidan con la búsqueda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    @if ($isOpen)
        <div x-data="{ show: @entangle('isOpen') }" x-show="show" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 bg-gray-900/40 backdrop-blur-[2px] flex items-center justify-center p-4"
            style="display: none;">
            <div x-show="show" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" @click.away="$wire.resetInputFields()"
                class="bg-white rounded-xl shadow-xl w-full max-w-sm overflow-hidden border border-gray-100 transform transition-all">
                <div class="px-5 pt-4 pb-2 flex justify-between items-center">
                    <h3 class="text-sm font-semibold text-gray-900">
                        {{ $userId ? 'Editar Usuario' : 'Nuevo Usuario' }}
                    </h3>
                    <button type="button" wire:click="resetInputFields"
                        class="text-gray-400 hover:text-gray-600 transition text-lg leading-none">&times;</button>
                </div>

                <form wire:submit.prevent="store">
                    <div class="px-5 pb-4 pt-2 space-y-3">
                        <div>
                            <label
                                class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Nombre</label>
                            <input type="text" wire:model="name"
                                class="w-full px-3 py-1.5 border @error('name') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-blue-500 @enderror rounded-lg outline-none text-sm transition-all bg-gray-50/50">
                            @error('name')
                                <span class="text-rose-600 text-xs mt-0.5 block font-medium">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label
                                class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Email</label>
                            <input type="email" wire:model="email"
                                class="w-full px-3 py-1.5 border @error('email') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-blue-500 @enderror rounded-lg outline-none text-sm transition-all bg-gray-50/50">
                            @error('email')
                                <span class="text-rose-600 text-xs mt-0.5 font-medium block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Teléfono</label>
                                <input type="text" wire:model="number" placeholder="Ej. +123..."
                                    class="w-full px-3 py-1.5 border @error('number') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-blue-500 @enderror rounded-lg outline-none text-sm transition-all bg-gray-50/50">
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Rol</label>
                                <select wire:model="role"
                                    class="w-full px-2.5 py-1.5 border @error('role') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-blue-500 @enderror rounded-lg outline-none text-sm bg-gray-50/50 transition-all">
                                    <option value="">Elegir...</option>
                                    <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                    <option value="user">Usuario</option>
                                </select>
                            </div>
                        </div>
                        @error('number')
                            <span class="text-rose-600 text-xs font-medium block mt-0.5">{{ $message }}</span>
                        @enderror
                        @error('role')
                            <span class="text-rose-600 text-xs font-medium block mt-0.5">{{ $message }}</span>
                        @enderror

                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">
                                Contraseña <span
                                    class="text-gray-400 normal-case font-normal">{{ $userId ? '(Opcional)' : '' }}</span>
                            </label>
                            <input type="password" wire:model="password"
                                class="w-full px-3 py-1.5 border @error('password') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-blue-500 @enderror rounded-lg outline-none text-sm transition-all bg-gray-50/50">
                            @error('password')
                                <span class="text-rose-600 text-xs mt-0.5 font-medium block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="px-5 py-3 bg-gray-50/50 flex justify-end gap-1.5 border-t border-gray-100">
                        <button type="button" wire:click="resetInputFields" wire:loading.attr="disabled"
                            class="px-3 py-1.5 text-gray-500 hover:text-gray-700 rounded-lg text-xs font-medium transition disabled:opacity-50">
                            Cancelar
                        </button>
                        <button type="submit" wire:loading.attr="disabled"
                            class="px-4 py-1.5 bg-gray-900 hover:bg-gray-800 text-black rounded-lg text-xs font-medium transition disabled:opacity-50 flex items-center gap-1.5">
                            <span wire:loading wire:target="store"
                                class="w-3 h-3 border-2 border-rose-600 border-t-transparent rounded-full animate-spin"></span>
                            <span>Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
