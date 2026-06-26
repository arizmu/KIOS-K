<x-app-layouts>
    <x-app-headers />
    <div class="base-holiday" x-data="DashboardIndex()">
    <div  class="min-h-screen bg-gradient-to-br from-base-100 via-base-50 to-primary/5">
        <div class="mx-auto p-4 md:p-6 lg:p-8">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                        <span class="icon-[tabler--dashboard] size-6 text-white"></span>
                    </div>
                    <h1
                        class="text-3xl font-bold bg-gradient-to-r from-base-content to-base-content/60 bg-clip-text text-transparent">
                        Dashboard Kiosk</h1>
                </div>
                <p class="text-base-content/60 ml-1">Selamat datang di sistem antrian kiosk modern</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                <div
                    class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                    <div class="card-body p-5">
                        <div class="flex items-start justify-between">
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-base-content/60 uppercase tracking-wider">Antrian
                                    Hari Ini</p>
                                <p class="text-4xl font-bold bg-gradient-to-r from-primary to-primary/60 bg-clip-text text-transparent"
                                    x-text="statistikHello.antriHariIni"></p>
                                <div class="flex items-center gap-1 text-xs text-success mt-2">
                                    <span class="icon-[tabler--trending-up] size-3"></span>
                                    <span>jumlah kunjungan hari ini</span>
                                </div>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl">
                                <span class="icon-[tabler--users] size-7 text-primary"></span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-base-200">
                            <div class="w-full bg-base-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-primary to-primary/70 h-2 rounded-full"
                                    style="width:100%"></div>
                            </div>
                            {{-- <p class="text-xs text-base-content/60 mt-1">75% dari target harian</p> --}}
                        </div>
                    </div>
                </div>

                <div
                    class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-success/20">
                    <div class="card-body p-5">
                        <div class="flex items-start justify-between">
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-base-content/60 uppercase tracking-wider">Terlayani
                                </p>
                                <p class="text-4xl font-bold bg-gradient-to-r from-success to-success/60 bg-clip-text text-transparent"
                                    x-text="statistikHello.terlayani">
                                    89</p>
                                <div class="flex items-center gap-1 text-xs text-success mt-2">
                                    <span class="icon-[tabler--check-circle] size-3"></span>
                                    <span>jumlah pengunjung yang dilayani</span>
                                </div>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-success/10 to-success/5 rounded-xl">
                                <span class="icon-[tabler--check-circle] size-7 text-success"></span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-base-200">
                            <div class="w-full bg-base-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-success to-success/70 h-2 rounded-full"
                                    style="width: 100%"></div>
                            </div>
                            {{-- <p class="text-xs text-base-content/60 mt-1">70% selesai dilayani</p> --}}
                        </div>
                    </div>
                </div>

                <div
                    class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-warning/20">
                    <div class="card-body p-5">
                        <div class="flex items-start justify-between">
                            <div class="space-y-1">
                                <p class="text-xs font-medium text-base-content/60 uppercase tracking-wider">Belum
                                    Terlayani</p>
                                <p
                                    class="text-4xl font-bold bg-gradient-to-r from-warning to-warning/60 bg-clip-text text-transparent" x-text="statistikHello.belumTerlayani">
                                    38</p>
                                <div class="flex items-center gap-1 text-xs text-warning mt-2">
                                    <span class="icon-[tabler--clock] size-3"></span>
                                    <span>jumlah menunggu dan belum terlayani</span>
                                </div>
                            </div>
                            <div class="p-3 bg-gradient-to-br from-warning/10 to-warning/5 rounded-xl">
                                <span class="icon-[tabler--clock] size-7 text-warning"></span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-base-200">
                            <div class="w-full bg-base-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-warning to-warning/70 h-2 rounded-full"
                                    style="width: 100%"></div>
                            </div>
                            {{-- <p class="text-xs text-base-conte  nt/60 mt-1">30% masih menunggu</p> --}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
                <div class="lg:col-span-2">
                    <div
                    class="card bg-gradient-to-br from-base-100 to-primary/5 shadow-lg border-2 border-transparent hover:border-primary/20">
                    <div class="card-body p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                    <span class="icon-[tabler--calendar-week] size-6 text-white"></span>
                                </div>
                                <div>
                                    <h2 class="card-title text-base font-bold">Statistik Minggu Ini</h2>
                                    <p class="text-xs text-base-content/60">20 - 26 Juni 2026</p>
                                </div>
                            </div>
                            <button class="btn btn-ghost btn-sm">
                                <span class="icon-[tabler--dots-vertical] size-4"></span>
                            </button>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div
                                class="text-center p-4 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl border border-primary/10 hover:shadow-md transition-all duration-300">
                                <div class="flex justify-center mb-2">
                                    <div class="p-2 bg-primary/20 rounded-lg">
                                        <span class="icon-[tabler--users] size-5 text-primary"></span>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold text-primary mb-1" x-text="statistikMingguan.totalantrian">0</div>
                                <div class="text-xs text-base-content/60">Total Antrian</div>
                                <div class="flex items-center justify-center gap-1 mt-2 text-xs text-success">
                                    <span class="icon-[tabler--trending-up] size-3"></span>
                                    <span>+8%</span>
                                </div>
                            </div>
                            <div
                                class="text-center p-4 bg-gradient-to-br from-success/10 to-success/5 rounded-xl border border-success/10 hover:shadow-md transition-all duration-300">
                                <div class="flex justify-center mb-2">
                                    <div class="p-2 bg-success/20 rounded-lg">
                                        <span class="icon-[tabler--check] size-5 text-success"></span>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold text-success mb-1">
                                    <span x-text="statistikMingguan.terlayani">0</span>
                                </div>
                                <div class="text-xs text-base-content/60">Terlayani</div>
                                <div class="flex items-center justify-center gap-1 mt-2 text-xs text-success">
                                    <span class="icon-[tabler--trending-up] size-3"></span>
                                    {{-- <span>+12%</span> --}}
                                </div>
                            </div>
                            <div
                                class="text-center p-4 bg-gradient-to-br from-error/10 to-error/5 rounded-xl border border-error/10 hover:shadow-md transition-all duration-300">
                                <div class="flex justify-center mb-2">
                                    <div class="p-2 bg-error/20 rounded-lg">
                                        <span class="icon-[tabler--user-x] size-5 text-error"></span>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold text-error mb-1">
                                    <span x-text="statistikMingguan.tidakterlayani">0</span>
                                </div>
                                <div class="text-xs text-base-content/60">Tidak Hadir</div>
                                <div class="flex items-center justify-center gap-1 mt-2 text-xs text-error">
                                    <span class="icon-[tabler--trending-down] size-3"></span>
                                    {{-- <span>-3%</span> --}}
                                </div>
                            </div>
                            <div
                                class="text-center p-4 bg-gradient-to-br from-info/10 to-info/5 rounded-xl border border-info/10 hover:shadow-md transition-all duration-300">
                                <div class="flex justify-center mb-2">
                                    <div class="p-2 bg-info/20 rounded-lg">
                                        <span class="icon-[tabler--percentage] size-5 text-info"></span>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold text-info mb-1">
                                    <span x-text="statistikMingguan.persentase" class="pr-2">0</span>%
                                </div>
                                <div class="text-xs text-base-content/60">Tingkat Layanan</div>
                                <div class="flex items-center justify-center gap-1 mt-2 text-xs text-success">
                                    <span class="icon-[tabler--trending-up] size-3"></span>
                                    {{-- <span>+2%</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-base-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-base-content/60">Performa minggu ini</span>
                                {{-- <div class="flex items-center gap-2">
                                    <span class="badge badge-success badge-sm">Excellent</span>
                                    <span class="text-sm font-bold text-success">A+</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-1 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div
                        class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                        <div class="card-body p-5">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-lg">
                                    <span class="icon-[tabler--user] size-4 text-white"></span>
                                </div>
                                <h2 class="card-title text-sm font-semibold">Profil Pengguna</h2>
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="avatar online">
                                    <div class="w-14 rounded-full ring-2 ring-primary/30">
                                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png"
                                            alt="avatar" />
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-base-content" x-text="xprofile.name">User</h3>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="badge badge-primary badge-xs">Teller</span>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="icon-[tabler--mail] size-4 text-base-content/60"></span>
                                    <span class="text-base-content/80" x-text="xprofile.email">admin@kiosk.com</span>
                                </div>
                                {{-- <div class="flex items-center gap-2 text-sm">
                                <span class="icon-[tabler--clock] size-4 text-base-content/60"></span>
                                <span class="text-base-content/80">Login: 07/06 14:30</span>
                            </div> --}}
                            </div>
                            <button class="btn btn-primary btn-sm w-full">
                                <span class="icon-[tabler--settings] size-4"></span>
                                Kelola Akun
                            </button>
                        </div>
                    </div>

                    <x-x-loket />

                    <div
                        class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-warning/20">
                        <div class="card-body p-5">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="p-2 bg-gradient-to-br from-warning to-warning/70 rounded-lg">
                                    <span class="icon-[tabler--chart-pie] size-4 text-white"></span>
                                </div>
                                <h2 class="card-title text-sm font-semibold">Statistik Teller</h2>
                            </div>
                            <div class="space-y-3">
                                <div class="p-3 bg-gradient-to-r from-base-200 to-base-100 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="icon-[tabler--users-group] size-4 text-base-content"></span>
                                            <span class="text-sm font-medium">Total Teller</span>
                                        </div>
                                        <span class="text-2xl font-bold text-base-content" x-text="statistikTeller.totalTeller">0</span>
                                    </div>
                                </div>
                                <div
                                    class="p-3 bg-gradient-to-r from-success/10 to-success/5 rounded-lg border-l-4 border-success">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="icon-[tabler--circle-check] size-4 text-success"></span>
                                            <span class="text-sm font-medium text-success">Teller Aktif</span>
                                        </div>
                                        <span class="text-2xl font-bold text-success" x-text="statistikTeller.tellerAktif">0</span>
                                    </div>
                                    <div class="w-full bg-success/20 rounded-full h-1.5 mt-2">
                                        <div class="bg-success h-1.5 rounded-full" x-bind:style="'width: ' + (statistikTeller.totalTeller > 0 ? (statistikTeller.tellerAktif / statistikTeller.totalTeller * 100) : 0) + '%'"></div>
                                    </div>
                                </div>
                                <div
                                    class="p-3 bg-gradient-to-r from-error/10 to-error/5 rounded-lg border-l-4 border-error">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="icon-[tabler--circle-x] size-4 text-error"></span>
                                            <span class="text-sm font-medium text-error">Teller Non-Aktif</span>
                                        </div>
                                        <span class="text-2xl font-bold text-error" x-text="statistikTeller.tellerNonAktif">0</span>
                                    </div>
                                    <div class="w-full bg-error/20 rounded-full h-1.5 mt-2">
                                        <div class="bg-error h-1.5 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function toggleTeller(action, btn) {
            const statusBadge = btn.closest('.card').querySelector('.badge');

            if (action === 'open') {
                statusBadge.className = 'badge badge-soft badge-success mb-3';
                statusBadge.textContent = 'Aktif';
            } else {
                statusBadge.className = 'badge badge-soft badge-error mb-3';
                statusBadge.textContent = 'Tutup';
            }
            alert(action === 'open' ? 'Teller berhasil dibuka!' : 'Teller berhasil ditutup!');
        }

        function DashboardIndex() {
            return {
                xprofile: {
                    name: '',
                    username: '',
                    email: ''
                },
                statistikHello: {
                    antriHariIni: 0,
                    terlayani: 0,
                    belumTerlayani: 0,
                    rataWaktu: 0
                },
                statistikTeller: {
                    totalTeller: 0,
                    tellerAktif: 0,
                    tellerNonAktif: 0
                },
                statistikMingguan: {
                    totalantrian: 0,
                    terlayani: 0,
                    tidakterlayani: 0,
                    persentase: 0
                },

                async profile() {
                    const users = await this.$getProfile();
                    const data = users.response;
                    this.xprofile = {
                        name: data.name,
                        username: data.name,
                        email: data.email
                    }
                },

                async getStatistikHello() {
                    const ress = await fetch('/statistik-hello');
                    const response = await ress.json();
                    const data = response.response;
                    this.statistikHello = {
                        antriHariIni: data.totalantrian ?? 0,
                        terlayani: data.terlayani ?? 0,
                        belumTerlayani: data.belumlayani ?? 0,
                        rataWaktu: data.ratawaktu ?? 0
                    };
                },

                async getStatistikTeller() {
                    const ress = await fetch('/statistik-teller');
                    const response = await ress.json();
                    const data = response.response;
                    this.statistikTeller = {
                        totalTeller: data.totalteller ?? 0,
                        tellerAktif: data.telleraktif ?? 0,
                        tellerNonAktif: data.tellernonaktif ?? 0
                    };
                },

                async getStatistikMingguan() {
                    const ress = await fetch('/statistik-mingguan');
                    const response = await ress.json();
                    const data = response.response;
                    this.statistikMingguan = {
                        totalantrian: data.totalantrian ?? 0,
                        terlayani: data.terlayani ?? 0,
                        tidakterlayani: data.tidakterlayani ?? 0,
                        persentase: data.persentase ?? 0
                    };
                },

                init() {
                    this.profile();
                    this.getStatistikHello();
                    this.getStatistikTeller();
                    this.getStatistikMingguan();
                }
            }
        }
    </script>
</x-app-layouts>
