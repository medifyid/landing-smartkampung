<div class="bg-gradient-to-br from-blue-50 via-white to-green-50 min-h-screen font-inter">
    <main id="main-content" class="max-w-7xl mx-auto px-6 py-12">
        <div class="relative max-w-xl mx-auto mb-10">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>

            <input type="text" wire:model.live="term" placeholder="Cari rumah sakit atau klinik..." class="form-control">
        </div>

        <section id="hospital-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

            @foreach ($facilites as $index => $facility)
                <div id="hospital-card-{{ $index }}" wire:key="{{ $index }}"
                    class="group relative bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-100/50 hover:border-medical-blue/30 hover:-translate-y-1">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-medical-light-blue/30 to-medical-light-green/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative z-10 flex flex-col justify-between items-end h-full">
                        @if (file_exists(public_path($facility->logo_rs ?? null)))
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-slate-100 to-sky-100 rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg">
                                <img src="{{ asset($facility->logo_rs) }}" alt="{{ $facility->nama_rs }}"
                                    class="w-12 h-12 object-contain" />
                            </div>
                        @else
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-medical-blue to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg">
                                <i class="fa-solid fa-hospital text-white text-2xl"></i>
                            </div>
                        @endif
                        <div class="text-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $facility->nama_rs }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $facility->keterangan }}</p>
                        </div>
                        <button
                            class="w-full bg-gradient-to-r from-medical-blue to-blue-600 hover:from-blue-700 hover:to-blue-800 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fa-solid fa-arrow-right mr-2"></i>
                            Pilih RS
                        </button>
                    </div>
                </div>
            @endforeach

        </section>

    </main>
</div>
