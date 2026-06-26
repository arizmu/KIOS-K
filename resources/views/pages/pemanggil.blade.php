<x-app-layouts>
    <x-app-headers />
    <div x-data="pemanggilAntrian()" class="base-holiday">
        <div class="min-h-screen bg-gradient-to-br from-base-100 via-base-50 to-primary/5">
            <div class="mx-auto p-4 md:p-6 lg:p-8">
                <div class="flex items-center gap-3 mb-8">
                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-white">
                            <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" d="M7.829 16.171a20.9 20.9 0 0 1-4.846-7.614c-.573-1.564-.048-3.282 1.13-4.46l.729-.728a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.42.42a1.81 1.81 0 0 0 0 2.56l3.84 3.841a1.81 1.81 0 0 0 2.56 0l.421-.42a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.728.728c-1.178 1.179-2.896 1.704-4.46 1.131a20.9 20.9 0 0 1-7.614-4.846Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-base-content to-base-content/60 bg-clip-text text-transparent">Pemanggil Antrian</h1>
                        <p class="text-base-content/60">Kelola pemanggilan antrian kiosk secara real-time</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mb-6">
                    <div class="lg:col-span-2 flex flex-col gap-4 md:gap-6">
                        <div class="card bg-primary text-primary-content shadow-xl overflow-hidden relative border-2 border-white/10" x-show="panelCall.id" x-transition:enter="transition-all duration-500 ease-out" x-transition:enter-start="opacity-0 scale-95 -translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition-all duration-300 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent pointer-events-none"></div>
                            <div class="card-body p-6 md:p-8 relative z-10">
                                <div class="flex flex-col md:flex-row justify-between gap-4">
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <div class="p-1.5 bg-white/15 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="text-white">
                                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" d="M7.829 16.171a20.9 20.9 0 0 1-4.846-7.614c-.573-1.564-.048-3.282 1.13-4.46l.729-.728a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.42.42a1.81 1.81 0 0 0 0 2.56l3.84 3.841a1.81 1.81 0 0 0 2.56 0l.421-.42a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.728.728c-1.178 1.179-2.896 1.704-4.46 1.131a20.9 20.9 0 0 1-7.614-4.846Z" />
                                                </svg>
                                            </div>
                                            <h2 class="card-title text-base opacity-80">Nomor Antrian Dipanggil</h2>
                                        </div>
                                        <div class="text-8xl font-bold tracking-wider" x-text="panelCall.no_antrian ?? '000'">000</div>
                                        <div class="flex items-center gap-2">
                                            <div class="p-1 bg-white/15 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="text-white">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M4 21V7l8-5l8 5v14M4 21l8-5l8 5M4 7l8 5l8-5M12 12v3" />
                                                </svg>
                                            </div>
                                            <span class="text-xl font-medium">Loket 1</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-row md:flex-col gap-2 self-end">
                                        <button @click="panggilUlang()" class="btn btn-error btn-soft flex-1 md:flex-none gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" d="M7.829 16.171a20.9 20.9 0 0 1-4.846-7.614c-.573-1.564-.048-3.282 1.13-4.46l.729-.728a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.42.42a1.81 1.81 0 0 0 0 2.56l3.84 3.841a1.81 1.81 0 0 0 2.56 0l.421-.42a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.728.728c-1.178 1.179-2.896 1.704-4.46 1.131a20.9 20.9 0 0 1-7.614-4.846Z" />
                                            </svg>
                                            Panggil Ulang
                                        </button>
                                        <button @click="selesaiLayanan" type="button" class="btn btn-success btn-soft flex-1 md:flex-none gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="m18 7l-1.41-1.41l-6.34 6.34l1.41 1.41zm4.24-1.41L11.66 16.17L7.48 12l-1.41 1.41L11.66 19l12-12zM.41 13.41L6 19l1.41-1.41L1.83 12z" />
                                            </svg>
                                            Selesai
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                            <div class="card-body p-5">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.75V6m0 12v1.25m-7.25-7H6m12 0h1.25M5.636 5.636l.884.884m10.844-.884l-.884.884M5.636 18.364l.884-.884m10.844.884l-.884-.884M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="card-title text-base font-bold">Antrian Menunggu</h2>
                                            <p class="text-xs text-base-content/60">Daftar antrian yang siap dipanggil</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary btn-soft btn-sm gap-1" @click="LoadAntrians">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M5.463 4.433A9.96 9.96 0 0 1 12 2c5.523 0 10 4.477 10 10c0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228zm13.074 15.134A9.96 9.96 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772z" />
                                        </svg>
                                        Refresh
                                    </button>
                                </div>
                                <div class="w-full rounded-xl border border-base-200 overflow-hidden">
                                    <div class="overflow-x-auto max-h-[500px]">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr class="bg-gradient-to-r from-primary/5 to-primary/10">
                                                    <th class="text-xs uppercase tracking-wider">No. Antrian</th>
                                                    <th class="text-xs uppercase tracking-wider">Pengunjung</th>
                                                    <th class="text-xs uppercase tracking-wider">Waktu Ambil</th>
                                                    <th class="text-xs uppercase tracking-wider">Keterangan</th>
                                                    <th class="text-xs uppercase tracking-wider">Status</th>
                                                    <th class="text-end text-xs uppercase tracking-wider">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-if="loading">
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <div class="flex justify-center items-center min-h-[150px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5" />
                                                                    <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                                                        <animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate" />
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template x-if="!loading && antrians.length === 0">
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="flex justify-center items-center min-h-[150px]">
                                                                <div class="flex flex-col items-center gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                                        <path fill="currentColor" d="M18.047 3.013A1 1 0 0 0 17 4.012V14a1 1 0 0 0 1 1h9.988a1 1 0 0 0 1-1.047C28.71 8.037 23.962 3.29 18.046 3.013M19 13V5.118A9.51 9.51 0 0 1 26.882 13zm-4-5.988a1 1 0 0 0-1.047-1C7.855 6.3 3 11.333 3 17.5C3 23.851 8.149 29 14.5 29c6.168 0 11.201-4.855 11.487-10.953A1 1 0 0 0 24.988 17H17.5a2.5 2.5 0 0 1-2.5-2.5zM5 17.5c0-4.736 3.466-8.663 8-9.382V14.5a4.5 4.5 0 0 0 4.5 4.5h6.382c-.719 4.534-4.646 8-9.382 8A9.5 9.5 0 0 1 5 17.5" />
                                                                    </svg>
                                                                    <h3 class="font-semibold text-base-content/60">Tidak ada antrian</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template x-for="(antrian, index) in antrians" :key="antrian.id">
                                                    <tr class="hover:bg-base-200/50 transition-colors duration-150"">
                                                        <td>
                                                            <strong class="text-base" x-text="antrian.no_antrian"></strong>
                                                        </td>
                                                        <td>
                                                            <template x-if="antrian.nama">
                                                                <span class="badge badge-soft badge-warning" x-text="antrian.nama"></span>
                                                            </template>
                                                            <template x-if="!antrian.nama">
                                                                <span class="badge badge-soft badge-info">Umum</span>
                                                            </template>
                                                        </td>
                                                        <td class="text-sm" x-text="formatTanggal(antrian.created_at)"></td>
                                                        <td>
                                                            <span class="text-sm" x-text="antrian.catatan ?? '-'"></span>
                                                        </td>
                                                        <td>
                                                            <span class="uppercase font-semibold badge badge-sm" :class="{
                                                            'badge-secondary' : antrian.status == 'open',
                                                            'badge-success' : antrian.status == 'done',
                                                            'badge-warning' : antrian.status == 'pending', 
                                                            'badge-info' : antrian.status == 'called',  
                                                        }" x-text="antrian.status"></span>
                                                        </td>
                                                        <td class="text-end">
                                                            <button @click="panggilAntrian(antrian)" class="btn btn-sm btn-info btn-soft gap-1" aria-label="Panggil">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" d="M7.829 16.171a20.9 20.9 0 0 1-4.846-7.614c-.573-1.564-.048-3.282 1.13-4.46l.729-.728a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.42.42a1.81 1.81 0 0 0 0 2.56l3.84 3.841a1.81 1.81 0 0 0 2.56 0l.421-.42a2.11 2.11 0 0 1 2.987 0l1.707 1.707a2.11 2.11 0 0 1 0 2.987l-.728.728c-1.178 1.179-2.896 1.704-4.46 1.131a20.9 20.9 0 0 1-7.614-4.846Z" />
                                                                </svg>
                                                                Panggil
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 md:gap-6">
                        <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                            <div class="card-body p-5">
                                <div class="text-center space-y-4">
                                    <div class="flex justify-center">
                                        <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-white">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6l4 2m6-2c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h3 class="card-title text-sm font-semibold">Waktu & Tanggal</h3>
                                    <div class="text-3xl font-bold text-primary" id="current-time">14:30:45</div>
                                    <div class="text-base text-base-content/60 border-t border-base-200 pt-3" id="current-date">07 Juni 2026</div>
                                </div>
                            </div>
                        </div>

                        <x-x-loket />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function pemanggilAntrian() {
                return {
                    loading: false,
                    antrians: [],
                    filterForam: {
                        'key': ""
                    },
                    tellers: [],
                    panelStatus: false,
                    panelCall: {
                        'id': "",
                        'name': "",
                        "no_antrian": "",
                    },


                    async LoadAntrians() {
                        this.antrians = [];
                        this.loading = true;
                        setTimeout(() => {
                            console.log("Two seconds have passed!");
                        }, 12000);

                        try {
                            const url = "/pemanggil/antrian"
                            const params = new URLSearchParams(this.filterForam).toString();
                            const response = await fetch(`${url}?${params}`, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                }
                            });
                            const data = await response.json();
                            const antrians = data.data;
                            this.antrians = antrians;
                            this.loading = false;
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    },

                    formatTanggal(item) {
                        const date = new Date(item);
                        const formattedDate = date.toLocaleDateString('id-ID', {
                            // weekday: 'long',
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric'
                        });
                        const formattedTime = date.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        return `${formattedDate}, ${formattedTime} WITA`;
                    },

                    async panggilAntrian(item) {
                        try {
                            this.panelCall = {};
                            const itemdata = item;
                            this.panelCall = itemdata;
                            const url = "/pemanggil/panggil-antrian/" + itemdata.id
                            const response = await axios.post(url, this.panelCall);
                            const data = await response.json();
                            alert(data.metadata.message);
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    },

                    async panggilUlang() {
                        try {
                            const itemdata = this.panelCall;
                            const url = "/pemanggil/panggil-antrian/" + itemdata.id
                            const response = await fetch(url, {
                                method: 'post',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': this.$getCsrfToken()
                                }
                            })
                            const data = await response.json();
                            if (data.metadata.status !== "200") {
                                alert(data.metadata.message);
                                return;
                            }
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    },

                    async selesaiLayanan() {
                        try {
                            const data = this.panelCall;
                            const url = `/pemanggil/selesai-layanan/${data.id}`;
                            const response = await axios.get(url);
                            const result = response.data;
                            console.log(result)

                        } catch (error) {
                            console.error('Error:', error);
                        }

                    },

                    init() {
                        this.LoadAntrians();
                    },

                    setupEchoListeners() {
                        echo.private('panggil-antrian')
                            .listen('.antrian', (data) => {
                                console.log('Panggil Antrian Broadcast:', data);
                                if (data && data.no_antrian) {
                                    document.querySelector('.text-8xl').textContent = data.no_antrian;
                                    if (data.loket) {
                                        document.querySelector('.text-xl').textContent = data.loket;
                                    }
                                }
                            });
                    }
                }
            }

            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID');
                const dateString = now.toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
                document.getElementById('current-time').textContent = timeString;
                document.getElementById('current-date').textContent = dateString;
            }

            setInterval(updateTime, 1000);
            updateTime();
        </script>
    @endpush
</x-app-layouts>
