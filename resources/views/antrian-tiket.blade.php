<x-app-layouts>
    @push('css')
        <style>
            * {
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }



            .app-container {
                max-width: 500px;
                width: 100%;
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                padding: 20px;
            }

            h1 {
                text-align: center;
                color: #2c3e50;
                margin-top: 0;
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #34495e;
            }

            input,
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
            }



            .btn-print {
                background: #e67e22;
            }

            .preview-ticket {
                margin-top: 30px;
                border-top: 2px dashed #bdc3c7;
                padding-top: 15px;
            }

            .preview-ticket h3 {
                text-align: center;
                color: #2c3e50;
            }

            .ticket-card {
                background: #fef9e4;
                border: 1px solid #f1c40f;
                border-radius: 12px;
                padding: 15px;
                font-family: monospace;
                font-size: 14px;
            }

            .ticket-card p {
                margin: 8px 0;
            }

            .print-area {
                display: none;
            }


            /* CSS untuk cetak */
            @media print {
                body * {
                    visibility: hidden;
                }

                .print-area,
                .print-area * {
                    visibility: visible;
                    text-align: center;
                }

                .print-area {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    margin: 0;
                    padding: 10px;
                }

                .print-area {
                    display: block;
                }

                button,
                .no-print {
                    display: none !important;
                }

                .ticket-card {
                    box-shadow: none;
                    border: 1px solid #000;
                }
            }
        </style>
    @endpush
    <div x-data="antrianTiket()" @class([
        'flex',
        'items-center',
        'justify-center',
        'min-h-screen',
        'bg-gradient-to-br',
        'from-base-200',
        'to-blue-300',
    ])>
        <div @class(['container', 'mx-auto', 'px-4', 'py-8'])>
            <!-- Header -->
            <div @class(['text-center', 'mb-8'])>
                <h1 @class(['text-4xl', 'font-bold', 'mb-2', 'text-primary'])>Pengambilan Tiket Antrian</h1>
                <p @class(['text-secondary', 'text-lg'])>Silakan pilih layanan yang Anda butuhkan</p>
            </div>

            <!-- Main Content Grid -->
            <div @class(['max-w-xl', 'mx-auto'])>
                <!-- Left: Form Section (60%) -->
                <div @class(['lg:col-span-3', 'space-y-6'])>
                    <!-- Service Type Selection -->
                    {{-- <div @class(['card', 'bg-base-100', 'shadow-xl'])>
                        <div @class(['card-body'])>
                            <h2 @class(['card-title', 'text-2xl', 'mb-4'])>Pilih Tipe Layanan</h2>
                            <div @class(['grid', 'grid-cols-1', 'md:grid-cols-3', 'gap-4'])>
                                <!-- Umum -->
                                <div @class(['cursor-pointer', 'hover:scale-105', 'transition-transform'])>
                                    <div @class(['card', 'bg-gradient-to-br', 'from-primary', 'to-primary/80', 'text-primary-content', 'shadow-lg'])>
                                        <div @class(['card-body', 'text-center', 'p-6'])>
                                            <div @class(['avatar', 'placeholder', 'mx-auto', 'mb-3'])>
                                                <div @class(['bg-white/20', 'w-16', 'rounded-full', 'p-2', 'flex', 'items-center', 'justify-center'])>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <h3 @class(['font-bold', 'text-xl', 'mb-1'])>Umum</h3>
                                            <p @class(['text-sm', 'opacity-80'])>A-001, A-002...</p>
                                            <div @class(['badge', 'badge-lg', 'badge-outline', 'border-white/30', 'mt-3'])>A</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Priority -->
                                <div @class(['cursor-pointer', 'hover:scale-105', 'transition-transform'])>
                                    <div @class(['card', 'bg-gradient-to-br', 'from-warning', 'to-amber-500', 'text-warning-content', 'shadow-lg'])>
                                        <div @class(['card-body', 'text-center', 'p-6'])>
                                            <div @class(['avatar', 'placeholder', 'mx-auto', 'mb-3'])>
                                                <div @class(['bg-white/20', 'w-16', 'rounded-full', 'p-2', 'flex', 'items-center', 'justify-center'])>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <h3 @class(['font-bold', 'text-xl', 'mb-1'])>Priority</h3>
                                            <p @class(['text-sm', 'opacity-80'])>B-001, B-002...</p>
                                            <div @class(['badge', 'badge-lg', 'badge-outline', 'border-white/30', 'mt-3'])>B</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BPJS -->
                                <div @class(['cursor-pointer', 'hover:scale-105', 'transition-transform'])>
                                    <div @class(['card', 'bg-gradient-to-br', 'from-success', 'to-emerald-600', 'text-success-content', 'shadow-lg'])>
                                        <div @class(['card-body', 'text-center', 'p-6'])>
                                            <div @class(['avatar', 'placeholder', 'mx-auto', 'mb-3'])>
                                                <div @class(['bg-white/20', 'w-16', 'rounded-full', 'p-2', 'flex', 'items-center', 'justify-center'])>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <h3 @class(['font-bold', 'text-xl', 'mb-1'])>BPJS</h3>
                                            <p @class(['text-sm', 'opacity-80'])>C-001, C-002...</p>
                                            <div @class(['badge', 'badge-lg', 'badge-outline', 'border-white/30', 'mt-3'])>C</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Visitor Information -->
                    <div @class(['card', 'bg-base-100', 'shadow-xl'])>
                        <div @class(['card-body'])>
                            <h2 @class(['card-title', 'text-2xl', 'mb-4'])>Informasi Pengunjung</h2>
                            <div @class(['form-control'])>
                                <label @class(['label'])>
                                    <span @class(['label-text', 'text-base', 'font-medium'])>Nama Lengkap (Opsional)</span>
                                </label>
                                <input x-model="form.nama" type="text" placeholder="Masukkan nama Anda"
                                    @class(['input', 'input-bordered', 'input-lg', 'w-full']) />
                            </div>
                            <div @class(['form-control', 'mt-4'])>
                                <label @class(['label'])>
                                    <span @class(['label-text', 'text-base', 'font-medium'])>Tujuan (Opsional)</span>
                                </label>
                                <textarea x-model="form.catatan" @class(['textarea', 'textarea-bordered', 'h-24']) placeholder="Keterangan tambahan jika diperlukan"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div @class(['flex', 'gap-4'])>
                        <button @click="tiketBaru" @class([
                            'btn',
                            'btn-primary',
                            'btn-lg',
                            'flex-1',
                            'h-16',
                            'text-lg',
                            'shadow-xl',
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9V2h12v7" />
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                <path d="M6 14h12v8H6z" />
                            </svg>
                            Cetak Tiket
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div @class(['print-area'])>
            <div @class(['ticket-card'])>
                {{-- <p><strong>{{ config('app.name') }}</strong></p> --}}
                <p><strong>TIKET ANTRIAN</strong></p>
                <p>-----------------------</p>
                <p>
                    <span style="font-size: 8pt">No. Antrian:</span>
                    <br>
                    <strong x-text="tiket.noAntrian" style="font-size: 16pt"></strong>
                </p>
                <template x-if="tiket.nama">
                    <p>
                        <span style="">Atas Nama</span>
                        <br>
                        <strong x-text="tiket.nama" style="font-size: 16pt"></strong>
                    </p>
                </template>
                <p>
                    <span x-text="tiket.tanggal" style="font-size: 8pt"></span>
                </p>
                <p>-----------------------</p>
                <p style="font-size: 8pt">Terima kasih, tunggu panggilan.</p>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function antrianTiket() {
                return {
                    form: {
                        nama: '',
                        catatan: ''
                    },
                    tiket: {
                        nama: '',
                        noAntrian: '',
                        catatan: '',
                        tanggal: ''
                    },
                    init() {},
                    async tiketBaru() {
                        // clear tiket variable
                        this.tiket = {
                            nama: '',
                            noAntrian: '',
                            catatan: '',
                            tanggal: ''
                        };
                        try {
                            const url = "/create-ticket";
                            const setAction = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify(this.form)
                            });

                            const response = await setAction.json();
                            const data = response.data;
                            this.tiket = {
                                nama: data.nama,
                                noAntrian: data.no_antrian,
                                catatan: data.catatan,
                                tanggal: this.formatDate(data.tanggal)
                            };
                            localStorage.removeItem('tiket');
                            localStorage.setItem('tiket', JSON.stringify(this.tiket));
                            this.$nextTick(() => {
                                window.print();
                            });
                        } catch (error) {
                            console.error('Error:', error);
                        } finally {
                            this.form.nama = '';
                            this.form.catatan = '';
                        }
                    },

                    async createTiket() {
                        try {
                            const url = "/create-tiket-new";
                            const response = await this.$httpPost(url, this.form);
                            const data = response;
                            console.log(data);
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    cetakUlang() {
                        if (!this.tiket.noAntrian) {
                            alert('Belum ada tiket yang tercetak. Buat antrian baru dulu.');
                            return;
                        }
                        this.printTiket();
                    },

                    formatDate(dateString) {
                        const date = new Date(dateString);

                        const tanggal = date.toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        const jam = new Date().toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });

                        return `${tanggal}, ${jam} WITA`;

                    }
                }
            }
        </script>
    @endpush
</x-app-layouts>
