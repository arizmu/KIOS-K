<x-app-layouts>
    <div class="base-holiday">
        <div class="flex items-center justify-center min-h-[calc(100vh-100px)]">
            <div class="max-w-4xl w-full px-4">
                <div class="text-center mb-8">
                    <h1 class="text-4xl md:text-5xl font-bold text-base-content mb-4">
                        {{ $appConfig->instansi_name ?? 'Sistem Antrian Kios-K' }}
                    </h1>
                    <p class="text-lg text-base-content/60">
                        Selamat datang! Silakan pilih layanan yang Anda butuhkan
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="card bg-gradient-to-br from-primary to-info text-primary-content shadow-xl hover:shadow-2xl transition-shadow">
                        <div class="card-body text-center p-8">
                            <div
                                class="bg-white/20 h-20 w-20 rounded-full p-2 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                        <rect width="20" height="14" x="2" y="3" rx="2" />
                                        <path d="M8 21h8m-4-4v4" />
                                    </g>
                                </svg>
                            </div>
                            <h2 class="card-title text-2xl mb-2">Lihat Display</h2>
                            <p class="opacity-90 mb-4">
                                Pantau antrian dan nomor yang sedang dilayani
                            </p>
                            <a href="/display" class="btn btn-lg bg-white text-primary hover:bg-white/90 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                        <rect width="20" height="14" x="2" y="3" rx="2" />
                                        <path d="M8 21h8m-4-4v4" />
                                    </g>
                                </svg>
                                Buka Display
                            </a>
                        </div>
                    </div>

                    <div
                        class="card bg-gradient-to-br from-success to-emerald-600 text-success-content shadow-xl hover:shadow-2xl transition-shadow">
                        <div class="card-body text-center p-8">
                            <div
                                class=" bg-white/20 h-20 w-20 rounded-full p-2 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M5 6a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7.17a3.001 3.001 0 0 1 5.66 0H19a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1.17a3.001 3.001 0 0 1-5.66 0zM2 7a3 3 0 0 1 3-3h8a1 1 0 0 1 1 1a1 1 0 1 0 2 0a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2a1 1 0 0 1-1-1a1 1 0 1 0-2 0a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3zm13 2a1 1 0 0 1 1 1v.5a1 1 0 1 1-2 0V10a1 1 0 0 1 1-1m1 4.5a1 1 0 1 0-2 0v.5a1 1 0 1 0 2 0z" />
                                    </g>
                                </svg>
                            </div>
                            <h2 class="card-title text-2xl mb-2">Ambil Antrian</h2>
                            <p class="opacity-90 mb-4">
                                Dapatkan nomor antrian secara cepat dan mudah
                            </p>
                            <a class="btn btn-lg bg-white text-success hover:bg-white/90 w-full"
                                href="{{ route('antrian') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M5 6a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7.17a3.001 3.001 0 0 1 5.66 0H19a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1.17a3.001 3.001 0 0 1-5.66 0zM2 7a3 3 0 0 1 3-3h8a1 1 0 0 1 1 1a1 1 0 1 0 2 0a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2a1 1 0 0 1-1-1a1 1 0 1 0-2 0a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3zm13 2a1 1 0 0 1 1 1v.5a1 1 0 1 1-2 0V10a1 1 0 0 1 1-1m1 4.5a1 1 0 1 0-2 0v.5a1 1 0 1 0 2 0z" />
                                    </g>
                                </svg>
                                Ambil Antrian
                            </a>
                        </div>
                    </div>

                    <div
                        class="card bg-gradient-to-br from-warning to-orange-600 text-warning-content shadow-xl hover:shadow-2xl transition-shadow">
                        <div class="card-body text-center p-8">
                            <div
                                class="bg-white/20 h-20 w-20 rounded-full p-2 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm0-2h12V10H6zm7.413-3.588Q14 15.826 14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17t1.413-.587M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6zM6 20V10z" />
                                </svg>
                            </div>
                            <h2 class="card-title text-2xl mb-2">Login Admin</h2>
                            <p class="opacity-90 mb-4">
                                Akses dashboard untuk mengelola sistem antrian
                            </p>
                            <a href="/login" class="btn btn-lg bg-white text-warning hover:bg-white/90 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path fill="currentColor"
                                        d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm0-2h12V10H6zm7.413-3.588Q14 15.826 14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17t1.413-.587M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6zM6 20V10z" />
                                </svg>
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
