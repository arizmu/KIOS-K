<x-app-layouts>
    @push('css')
        <style>
            * {
                font-family: 'Inter', sans-serif;
            }

            .marquee {
                overflow: hidden;
                white-space: nowrap;
            }

            .marquee-content {
                display: inline-block;
                animation: marquee 20s linear infinite;
            }

            @keyframes marquee {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }

            .pulse-number {
                animation: pulse 2s ease-in-out infinite;
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }
            }

            .gradient-header {
                background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #1e40af 100%);
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            }

            .current-number {
                background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
                box-shadow: 0 25px 50px -12px rgba(220, 38, 38, 0.5);
            }

            .serving-number {
                background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            }

            .card-gradient-1 {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            }

            .card-gradient-2 {
                background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            }
        </style>
    @endpush
    <div x-data="diplayIndex()" class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen overflow-hidden">
        <div class="h-screen flex flex-col">
            <header class="gradient-header shadow-2xl py-4 px-8 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-10 h-10 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">
                            {{ $appConfig->instansi_name ?? 'Kiosk Antrian' }}</h1>
                        <p class="text-blue-100 text-lg">Sistem Antrian Terintegrasi</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-white text-xl font-semibold" id="clock">00:00:00</div>
                    <div class="text-blue-100 text-lg" id="date">Senin, 7 Juni 2026</div>
                </div>
            </header>

            <div class="flex p-6 gap-6">
                <div class="w-4/4 flex gap-6 min-h-[770px]">
                    <div class="w-2/4 glass-effect rounded-3xl shadow-2xl overflow-hidden flex flex-col">
                        <div class="bg-gradient-to-r from-blue-800 to-blue-500 py-3 px-6">
                            <h2 class="text-white text-2xl font-bold text-center">Nomor Antrian Dipanggil</h2>
                        </div>
                        <div class="flex-1 flex items-center justify-center p-8 ">
                            <div class="text-center">
                                <div
                                    class="current-number w-110 h-110 rounded-full flex items-center justify-center mx-auto pulse-number">
                                    <div>
                                        <div class="text-white text-9xl font-bold" x-text="currentNumber"></div>
                                    </div>
                                </div>
                                <div class="text-center mt-16">
                                    <p class="text-gray-600 text-xl mt-6 font-medium">Silakan menuju loket</p>
                                    <p class="text-blue-600 text-4xl font-bold mt-2" x-text="currentLoket"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 glass-effect rounded-3xl shadow-2xl overflow-hidden flex flex-col">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 py-3 px-6">
                            <h2 class="text-white text-2xl font-bold text-center">
                                Jumlah Antrian Tunggu
                            </h2>
                        </div>
                        <div class="flex-1 flex items-center justify-center p-8">
                            <div class="text-center">
                                <div
                                    class="bg-info w-80 h-80 rounded-full flex items-center justify-center mx-auto pulse-number">
                                    <div>
                                        <div class="text-white text-8xl font-bold" x-text="jumlahAntrian"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 glass-effect rounded-3xl shadow-2xl overflow-hidden flex flex-col">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 py-3 px-6">
                            <h2 class="text-white text-2xl font-bold text-center">
                                Jumlah Antrian Dilayani
                            </h2>
                        </div>
                        <div class="flex-1 flex items-center justify-center p-8">
                            <div class="text-center">
                                <div
                                    class=" bg-success w-80 h-80 rounded-full flex items-center justify-center mx-auto pulse-number">
                                    <div>
                                        <div class="text-white text-8xl font-bold" x-text="jumlahDilayani"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <footer class="fixed bottom-0 left-0 right-0 bg-gradient-to-r from-slate-800 to-slate-900 shadow-2xl">
            <div class="flex items-center">
                <div class="bg-red-600 px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                        <span class="text-white text-lg font-bold">INFO</span>
                    </div>
                </div>
                <div class="marquee flex-1 py-4 px-6">
                    <div class="marquee-content text-white text-xl">
                        {{ 'Selamat datang | Jam operasional: Senin - Jumat (08:00 - 17:00) | Sabtu (08:00 - 13:00) | Mohon menunggu nomor antrian Anda dipanggil | Terima kasih atas kesabaran Anda' }}
                    </div>
                </div>
            </div>
        </footer>

    </div>
    </div>
    @push('js')
        <script>
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;

                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                document.getElementById('date').textContent = now.toLocaleDateString('id-ID', options);
            }

            updateClock();
            setInterval(updateClock, 1000);

            function diplayIndex() {
                return {
                    currentNumber: 0,
                    currentLoket: "-",
                    isSpeaking: false,
                    jumlahAntrian: 0,
                    jumlahDilayani: 0,
                    _cachedVoice: null,
                    _voicesLoaded: false,
                    _keepAliveTimer: null,

                    // ─── [NEW] Speech queue ───────────────────────────────────────────
                    _queue: [],

                    isSpeechSupported() {
                        return 'speechSynthesis' in window;
                    },

                    loadVoices() {
                        return new Promise((resolve) => {
                            const synth = window.speechSynthesis;
                            const tryGet = () => {
                                const voices = synth.getVoices();
                                if (voices.length === 0) return null;
                                let voice = voices.find(v => v.lang === 'id-ID');
                                if (!voice) voice = voices.find(v => v.name.toLowerCase().includes('indonesian'));
                                if (!voice) voice = voices[0];
                                console.log('🎙️ [Voice] Voice dipilih:', voice?.name, '|', voice?.lang);
                                return voice;
                            };
                            const immediate = tryGet();
                            if (immediate) {
                                this._cachedVoice = immediate;
                                this._voicesLoaded = true;
                                resolve(immediate);
                                return;
                            }
                            console.warn('⏳ [Voice] Menunggu onvoiceschanged...');
                            synth.onvoiceschanged = () => {
                                const voice = tryGet();
                                if (voice) {
                                    this._cachedVoice = voice;
                                    this._voicesLoaded = true;
                                    console.log('✅ [Voice] Voices ready:', voice.name);
                                    resolve(voice);
                                }
                            };
                        });
                    },

                    startKeepAlive() {
                        this._keepAliveTimer = setInterval(() => {
                            if (window.speechSynthesis.paused) {
                                console.warn('🔄 [KeepAlive] synth paused, resume()');
                                window.speechSynthesis.resume();
                            }
                        }, 10000);
                    },

                    stopKeepAlive() {
                        if (this._keepAliveTimer) {
                            clearInterval(this._keepAliveTimer);
                            this._keepAliveTimer = null;
                        }
                    },

                    // ─── [NEW] Proses item pertama dari queue ─────────────────────────
                    _processQueue() {
                        if (this._queue.length === 0) {
                            console.log('✅ [Queue] Antrian kosong, selesai');
                            return;
                        }

                        if (!this._voicesLoaded || !this._cachedVoice) {
                            console.warn('⚠️ [Queue] Voice belum siap, skip');
                            return;
                        }

                        const synth = window.speechSynthesis;
                        if (synth.paused) synth.resume();

                        // Ambil teks pertama dari antrian
                        const text = this._queue[0];
                        console.log(`📋 [Queue] Memproses: "${text}" | sisa: ${this._queue.length}`);

                        setTimeout(() => {
                            const utterance = new SpeechSynthesisUtterance(text);
                            utterance.lang = 'id-ID';
                            utterance.rate = 0.85;
                            utterance.pitch = 0.75;
                            utterance.volume = 1.0;
                            utterance.voice = this._cachedVoice;

                            utterance.onstart = () => {
                                this.isSpeaking = true;
                                console.log(`🔊 [Voice] Mulai: "${text}"`);
                            };

                            utterance.onend = () => {
                                this.isSpeaking = false;
                                // Hapus item yang baru selesai, lanjut ke berikutnya
                                this._queue.shift();
                                console.log(`✅ [Voice] Selesai | sisa antrian: ${this._queue.length}`);
                                this._processQueue();
                            };

                            utterance.onerror = (e) => {
                                this.isSpeaking = false;
                                console.error(`❌ [Voice] Error: ${e.error} | text: "${text}"`);
                                // Tetap lanjut ke antrian berikutnya meski error
                                this._queue.shift();
                                this._processQueue();
                            };

                            synth.speak(utterance);
                        }, 150);
                    },

                    // ─── [CHANGED] speak() sekarang hanya push ke queue ──────────────
                    speak(text) {
                        if (!this.isSpeechSupported()) {
                            console.error('❌ [Voice] Browser tidak support Web Speech API');
                            return;
                        }

                        this._queue.push(text);
                        console.log(`➕ [Queue] Ditambahkan: "${text}" | total: ${this._queue.length}`);

                        // Kalau tidak sedang berbicara, langsung proses
                        // Kalau sedang berbicara, onend() yang akan trigger _processQueue()
                        if (!this.isSpeaking) {
                            this._processQueue();
                        }
                    },

                    panggilSuara(noAntrian, loket) {
                        const nomorSpasi = String(noAntrian).split('').join(' ');
                        const kalimat = `Nomor antrian ${nomorSpasi}, silakan menuju ${loket}`;
                        console.log('📢 [Voice] Enqueue:', kalimat);
                        this.speak(kalimat);
                    },

                    isCalling() {
                        echo.private('panggil-antrian')
                            .listen('.antrian', (data) => {
                                console.log('📡 [Echo] Data diterima:', data);
                                if (data?.antrian) {
                                    const noAntrian = data.antrian.no_antrian;
                                    const loket = data.antrian.loket ?? 'Loket 1';
                                    this.currentNumber = noAntrian;
                                    this.currentLoket = loket;
                                    this.panggilSuara(noAntrian, loket);
                                } else {
                                    console.warn('⚠️ [Echo] Struktur data tidak sesuai:', data);
                                }
                            })
                            .error((error) => {
                                console.error('❌ [Echo] Gagal join channel:', error);
                            });
                    },

                    async getDisplayData() {
                        try {
                            setInterval(async () => {
                                const url = "/display-data";
                                const ress = await axios.get(url);
                                const data = ress.data.response;
                                this.jumlahAntrian = data.jumlahantrian;
                                this.jumlahDilayani = data.jumlahdilayani;
                            }, 5000);
                        } catch (error) {
                            console.error('❌ [Display] Gagal mengambil data:', error);
                        }
                    },

                    async init() {
                        this.getDisplayData();
                        if (!this.isSpeechSupported()) {
                            console.error('❌ [Voice] Browser tidak mendukung Web Speech API');
                            return;
                        }
                        await this.loadVoices();
                        this.startKeepAlive();
                        this.isCalling();
                    }
                }
            }
        </script>
    @endpush

</x-app-layouts>
