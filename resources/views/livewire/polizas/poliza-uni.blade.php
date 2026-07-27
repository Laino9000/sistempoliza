<div>
    <div class="max-w-md mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-5 antialiased text-gray-800">
        <div class="mb-5 flex items-center gap-2.5">
            <div class="p-1.5 bg-gray-950 text-white rounded-lg">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900">Datos del Cliente</h3>
                <p class="text-[11px] text-gray-400">Paso 1: Información titular de la póliza</p>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Documento de
                    Identidad (Identity)</label>
                <input type="text" wire:model="documento" placeholder="Ej: V-12345678"
                    class="w-full px-3 py-2 border @error('documento') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-gray-900 @enderror rounded-xl outline-none text-sm bg-gray-50/50 transition-all">
                @error('documento')
                    <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Primer
                        Nombre</label>
                    <input type="text" wire:model="primerNombre"
                        class="w-full px-3 py-2 border @error('primerNombre') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-gray-900 @enderror rounded-xl outline-none text-sm bg-gray-50/50 transition-all">
                    @error('primerNombre')
                        <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label
                        class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Apellidos</label>
                    <input type="text" wire:model="apellidos"
                        class="w-full px-3 py-2 border @error('apellidos') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-gray-900 @enderror rounded-xl outline-none text-sm bg-gray-50/50 transition-all">
                    @error('apellidos')
                        <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label
                        class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Teléfono</label>
                    <input type="text" wire:model="telephone" placeholder="Ej: +58412..."
                        class="w-full px-3 py-2 border @error('telephone') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-gray-900 @enderror rounded-xl outline-none text-sm bg-gray-50/50 transition-all">
                    @error('telephone')
                        <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Edad</label>
                    <input type="number" wire:model="age" min="1" max="120"
                        class="w-full px-3 py-2 border @error('age') border-rose-400 focus:border-rose-500 @else border-gray-200 focus:border-gray-900 @enderror rounded-xl outline-none text-sm bg-gray-50/50 transition-all">
                    @error('age')
                        <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Foto del
                    Documento ID</label>
                <div class="relative flex items-center justify-center w-full">
                    <label
                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-200 border-dashed rounded-xl cursor-pointer bg-gray-50/30 hover:bg-gray-50 transition-all @error('rutaImagen') border-rose-300 bg-rose-50/10 @enderror">
                        <div class="flex flex-col items-center justify-center pt-3 pb-3 text-center px-4">
                            <svg class="w-5 h-5 mb-1.5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
                            </svg>
                            <p class="text-xs text-gray-500"><span class="font-semibold text-gray-900">Haz clic para
                                    subir</span> o arrastra la foto</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">PNG, JPG o PDF</p>
                        </div>
                        <input type="file" wire:model="rutaImagen" class="hidden" accept="image/*,application/pdf" />
                    </label>
                </div>

                @if ($rutaImagen)
                    <div
                        class="mt-2 flex items-center gap-2 text-xs text-emerald-600 font-medium bg-emerald-50/50 px-3 py-1.5 rounded-lg border border-emerald-100">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Archivo cargado con éxito.</span>
                    </div>
                @endif
                @error('rutaImagen')
                    <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
