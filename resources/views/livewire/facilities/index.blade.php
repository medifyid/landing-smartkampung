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
                        @php
                            $path = $facility->logo_rs; // misal "logo-rs/rs-a.png"
                            $isLocal = file_exists(public_path($path));
                            $isUrl = filter_var($path, FILTER_VALIDATE_URL);
                        @endphp
                        @if ($isLocal)
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-slate-100 to-sky-100 rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg">
                                <img src="{{ asset($facility->logo_rs) }}" alt="{{ $facility->nama_rs }}"
                                    class="w-12 h-12 object-contain" />
                            </div>
                        @elseif ($isUrl)
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-slate-100 to-sky-100 rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg">
                                <img src="{{ $facility->logo_rs }}" alt="{{ $facility->nama_rs }}"
                                    class="w-12 h-12 object-contain" />
                            </div>
                        @else
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-medical-blue to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-6 fill-white">
                                    <path
                                        d="M14.916 2.404a.75.75 0 0 1-.32 1.011l-.596.31V17a1 1 0 0 1-1 1h-2.26a.75.75 0 0 1-.75-.75v-3.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.5a.75.75 0 0 1-.75.75h-3.5a.75.75 0 0 1 0-1.5H2V9.957a.75.75 0 0 1-.596-1.372L2 8.275V5.75a.75.75 0 0 1 1.5 0v1.745l10.404-5.41a.75.75 0 0 1 1.012.319ZM15.861 8.57a.75.75 0 0 1 .736-.025l1.999 1.04A.75.75 0 0 1 18 10.957V16.5h.25a.75.75 0 0 1 0 1.5h-2a.75.75 0 0 1-.75-.75V9.21a.75.75 0 0 1 .361-.64Z" />
                                </svg>

                            </div>
                        @endif
                        <div class="text-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $facility->nama_rs }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $facility->keterangan }}</p>
                        </div>
                        <a href="{{ $facility->url_rs }}?medify_landingpage_key={{ custom_encrypt('medify-landingpage:' . $facility->nama_rs) }}"
                            target="_blank"
                            class="w-full flex items-center justify-center bg-gradient-to-r from-medical-blue text-center to-blue-600 hover:from-blue-700 hover:to-blue-800 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-5 mr-2">
                                <path fill-rule="evenodd"
                                    d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Pilih RS
                        </a>
                    </div>
                </div>
            @endforeach

        </section>

    </main>
</div>
