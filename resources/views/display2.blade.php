<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Puter TTS — Test Antrian</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap"
            rel="stylesheet">
        <style>
            *,
            *::before,
            *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            :root {
                --bg: #0d0d0d;
                --bg2: #161616;
                --bg3: #1e1e1e;
                --border: #2a2a2a;
                --border2: #383838;
                --text: #e8e8e8;
                --text2: #888;
                --text3: #555;
                --accent: #00e5a0;
                --accent2: #00b87d;
                --warn: #f59e0b;
                --danger: #ef4444;
                --info: #3b82f6;
                --mono: 'IBM Plex Mono', monospace;
                --sans: 'IBM Plex Sans', sans-serif;
            }

            body {
                background: var(--bg);
                color: var(--text);
                font-family: var(--sans);
                min-height: 100vh;
                padding: 2rem 1rem;
            }

            .container {
                max-width: 780px;
                margin: 0 auto;
            }

            /* Header */
            .header {
                display: flex;
                align-items: baseline;
                gap: 12px;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid var(--border);
            }

            .header h1 {
                font-family: var(--mono);
                font-size: 18px;
                font-weight: 500;
                color: var(--accent);
            }

            .header span {
                font-size: 12px;
                color: var(--text3);
                font-family: var(--mono);
            }

            /* Cards */
            .card {
                background: var(--bg2);
                border: 1px solid var(--border);
                border-radius: 8px;
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .card-title {
                font-size: 11px;
                font-family: var(--mono);
                color: var(--text3);
                text-transform: uppercase;
                letter-spacing: 0.08em;
                margin-bottom: 12px;
            }

            /* Provider tabs */
            .tabs {
                display: flex;
                gap: 6px;
                flex-wrap: wrap;
            }

            .tab {
                font-family: var(--mono);
                font-size: 12px;
                padding: 6px 14px;
                border: 1px solid var(--border2);
                border-radius: 4px;
                background: transparent;
                color: var(--text2);
                cursor: pointer;
                transition: all 0.15s;
            }

            .tab:hover {
                border-color: var(--accent);
                color: var(--accent);
            }

            .tab.active {
                background: var(--accent);
                border-color: var(--accent);
                color: #000;
                font-weight: 500;
            }

            /* Form elements */
            label {
                font-size: 11px;
                font-family: var(--mono);
                color: var(--text3);
                display: block;
                margin-bottom: 5px;
            }

            select,
            input[type="text"],
            textarea {
                width: 100%;
                background: var(--bg3);
                border: 1px solid var(--border2);
                border-radius: 4px;
                color: var(--text);
                font-family: var(--mono);
                font-size: 13px;
                padding: 8px 10px;
                outline: none;
                transition: border-color 0.15s;
            }

            select:focus,
            input:focus,
            textarea:focus {
                border-color: var(--accent);
            }

            textarea {
                resize: vertical;
                min-height: 80px;
            }

            .grid2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .grid3 {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 10px;
            }

            /* Range slider */
            input[type="range"] {
                -webkit-appearance: none;
                width: 100%;
                height: 4px;
                background: var(--border2);
                border-radius: 2px;
                border: none;
                padding: 0;
                margin-top: 10px;
                cursor: pointer;
            }

            input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none;
                width: 14px;
                height: 14px;
                border-radius: 50%;
                background: var(--accent);
                cursor: pointer;
            }

            /* Buttons */
            .btn {
                font-family: var(--mono);
                font-size: 12px;
                padding: 8px 16px;
                border-radius: 4px;
                border: 1px solid;
                cursor: pointer;
                transition: all 0.15s;
                white-space: nowrap;
            }

            .btn-primary {
                background: var(--accent);
                border-color: var(--accent);
                color: #000;
                font-weight: 500;
            }

            .btn-primary:hover {
                background: var(--accent2);
                border-color: var(--accent2);
            }

            .btn-primary:disabled {
                opacity: 0.3;
                cursor: not-allowed;
            }

            .btn-outline {
                background: transparent;
                border-color: var(--border2);
                color: var(--text2);
            }

            .btn-outline:hover {
                border-color: var(--accent);
                color: var(--accent);
            }

            .btn-danger {
                background: transparent;
                border-color: var(--danger);
                color: var(--danger);
            }

            .btn-danger:hover {
                background: rgba(239, 68, 68, 0.1);
            }

            .row {
                display: flex;
                gap: 8px;
                align-items: center;
                flex-wrap: wrap;
            }

            .mt {
                margin-top: 10px;
            }

            /* Preset buttons */
            .preset {
                font-family: var(--mono);
                font-size: 11px;
                padding: 4px 10px;
                background: var(--bg3);
                border: 1px solid var(--border);
                border-radius: 3px;
                color: var(--text3);
                cursor: pointer;
                transition: all 0.12s;
            }

            .preset:hover {
                border-color: var(--accent);
                color: var(--accent);
            }

            /* Queue list */
            .q-empty {
                font-family: var(--mono);
                font-size: 12px;
                color: var(--text3);
                padding: 8px 0;
            }

            .q-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 12px;
                border: 1px solid var(--border);
                border-radius: 4px;
                margin-bottom: 6px;
                font-size: 13px;
                transition: all 0.2s;
            }

            .q-item.playing {
                border-color: var(--accent);
                background: rgba(0, 229, 160, 0.06);
            }

            .q-item.waiting {
                color: var(--text2);
            }

            .q-meta {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .q-num {
                font-family: var(--mono);
                font-size: 11px;
                color: var(--text3);
                min-width: 20px;
            }

            .q-teks {
                font-size: 13px;
            }

            .badge {
                font-family: var(--mono);
                font-size: 10px;
                padding: 2px 7px;
                border-radius: 3px;
                border: 1px solid;
            }

            .badge-play {
                color: var(--accent);
                border-color: var(--accent);
                background: rgba(0, 229, 160, 0.1);
            }

            .badge-wait {
                color: var(--text3);
                border-color: var(--border);
            }

            .badge-prov {
                color: var(--info);
                border-color: rgba(59, 130, 246, 0.4);
                background: rgba(59, 130, 246, 0.08);
            }

            .del {
                background: none;
                border: none;
                color: var(--text3);
                font-size: 18px;
                line-height: 1;
                cursor: pointer;
                padding: 0 4px;
            }

            .del:hover {
                color: var(--danger);
            }

            /* Status bar */
            .status {
                font-family: var(--mono);
                font-size: 11px;
                color: var(--text3);
                padding: 6px 0 0;
                min-height: 22px;
                border-top: 1px solid var(--border);
                margin-top: 10px;
            }

            .status.active {
                color: var(--accent);
            }

            .status.error {
                color: var(--danger);
            }

            /* Code block */
            pre {
                background: #0a0a0a;
                border: 1px solid var(--border);
                border-radius: 6px;
                padding: 1rem;
                overflow-x: auto;
                font-family: var(--mono);
                font-size: 12px;
                line-height: 1.7;
                color: #aaa;
            }

            .kw {
                color: #c084fc;
            }

            .fn {
                color: var(--accent);
            }

            .str {
                color: #fbbf24;
            }

            .cm {
                color: #555;
                font-style: italic;
            }

            /* Visualizer */
            .viz {
                display: flex;
                align-items: flex-end;
                gap: 3px;
                height: 28px;
            }

            .viz-bar {
                width: 4px;
                background: var(--accent);
                border-radius: 2px;
                opacity: 0.4;
                transition: height 0.1s ease;
            }

            .viz-bar.active {
                opacity: 1;
                animation: pulse 0.6s ease infinite alternate;
            }

            @keyframes pulse {
                from {
                    transform: scaleY(0.3);
                }

                to {
                    transform: scaleY(1);
                }
            }

            /* Divider */
            .divider {
                border: none;
                border-top: 1px solid var(--border);
                margin: 1rem 0;
            }

            /* Speed label */
            .speed-lbl {
                font-family: var(--mono);
                font-size: 11px;
                color: var(--text2);
            }
        </style>
    </head>

    <body>
        <div class="container">

            <div class="header">
                <h1>puter.js TTS</h1>
                <span>test antrian — blade</span>
            </div>

            {{-- ===== PROVIDER ===== --}}
            <div class="card">
                <p class="card-title">Provider</p>
                <div class="tabs" id="tab-group">
                    <button class="tab active" onclick="setProvider(this,'polly')">AWS Polly</button>
                    <button class="tab" onclick="setProvider(this,'openai')">OpenAI</button>
                    <button class="tab" onclick="setProvider(this,'gemini')">Gemini</button>
                </div>

                <hr class="divider">

                {{-- Polly options --}}
                <div id="opt-polly">
                    <div class="grid2">
                        <div>
                            <label>Engine</label>
                            <select id="polly-engine" onchange="refreshCode()">
                                <option value="neural">neural</option>
                                <option value="generative">generative</option>
                                <option value="standard">standard</option>
                            </select>
                        </div>
                        <div>
                            <label>Language</label>
                            <select id="polly-lang" onchange="refreshCode()">
                                <option value="id-ID">Bahasa Indonesia (id-ID)</option>
                                <option value="en-US">English US (en-US)</option>
                                <option value="en-GB">English UK (en-GB)</option>
                                <option value="ja-JP">Japanese (ja-JP)</option>
                                <option value="ko-KR">Korean (ko-KR)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- OpenAI options --}}
                <div id="opt-openai" style="display:none">
                    <div class="grid3">
                        <div>
                            <label>Voice</label>
                            <select id="openai-voice" onchange="refreshCode()">
                                <option value="alloy">alloy</option>
                                <option value="echo">echo</option>
                                <option value="fable">fable</option>
                                <option value="onyx">onyx</option>
                                <option value="nova">nova</option>
                                <option value="shimmer">shimmer</option>
                            </select>
                        </div>
                        <div>
                            <label>Model</label>
                            <select id="openai-model" onchange="refreshCode()">
                                <option value="tts-1">tts-1</option>
                                <option value="tts-1-hd">tts-1-hd (HD)</option>
                            </select>
                        </div>
                        <div>
                            <label>Speed — <span class="speed-lbl" id="openai-speed-lbl">0.9x</span></label>
                            <input type="range" min="0.5" max="2" step="0.1" value="0.9"
                                id="openai-speed"
                                oninput="document.getElementById('openai-speed-lbl').textContent=parseFloat(this.value).toFixed(1)+'x';refreshCode()">
                        </div>
                    </div>
                </div>

                {{-- Gemini options --}}
                <div id="opt-gemini" style="display:none">
                    <div class="grid3">
                        <div>
                            <label>Model</label>
                            <select id="gemini-model" onchange="refreshCode()">
                                <option value="gemini-2.5-flash-preview-tts">2.5 flash</option>
                                <option value="gemini-2.5-pro-preview-tts">2.5 pro</option>
                            </select>
                        </div>
                        <div>
                            <label>Voice</label>
                            <select id="gemini-voice" onchange="refreshCode()">
                                <option value="Puck">Puck</option>
                                <option value="Charon">Charon</option>
                                <option value="Kore">Kore</option>
                                <option value="Fenrir">Fenrir</option>
                                <option value="Aoede">Aoede</option>
                                <option value="Leda">Leda</option>
                                <option value="Orus">Orus</option>
                            </select>
                        </div>
                        <div>
                            <label>Instruksi gaya</label>
                            <input type="text" id="gemini-instr" placeholder="e.g.: ramah, santai"
                                oninput="refreshCode()">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== INPUT ===== --}}
            <div class="card">
                <p class="card-title">Teks</p>
                <textarea id="teks-input" placeholder="Tulis teks yang ingin diucapkan...">Antrian nomor 003, silakan menuju loket 1.</textarea>

                <div class="row mt" style="gap:6px">
                    <button class="preset" onclick="preset('Antrian nomor 001, silakan menuju loket 1.')">🎫 Loket
                        1</button>
                    <button class="preset" onclick="preset('Antrian nomor 002, silakan menuju loket 2.')">🎫 Loket
                        2</button>
                    <button class="preset"
                        onclick="preset('Selamat datang, silakan ambil nomor antrian terlebih dahulu.')">👋
                        Sambutan</button>
                    <button class="preset"
                        onclick="preset('Mohon perhatian, loket 3 sedang tidak aktif. Silakan menuju loket lain.')">⚠️
                        Info</button>
                </div>

                <div class="row mt">
                    <button class="btn btn-primary" onclick="mainkanLangsung()" id="btn-langsung">▶ Putar
                        langsung</button>
                    <button class="btn btn-outline" onclick="tambahAntrian()">+ Tambah ke antrian</button>
                </div>
            </div>

            {{-- ===== ANTRIAN ===== --}}
            <div class="card">
                <p class="card-title">Antrian</p>

                <div id="daftar-antrian">
                    <p class="q-empty">— antrian kosong —</p>
                </div>

                <div class="row mt">
                    <button class="btn btn-primary" onclick="prosesAntrian()" id="btn-mulai">▶ Mulai antrian</button>
                    <button class="btn btn-danger" onclick="hentikan()">■ Stop & reset</button>
                    <div class="viz" id="viz">
                        <div class="viz-bar" style="height:8px"></div>
                        <div class="viz-bar" style="height:14px"></div>
                        <div class="viz-bar" style="height:20px"></div>
                        <div class="viz-bar" style="height:14px"></div>
                        <div class="viz-bar" style="height:8px"></div>
                    </div>
                </div>

                <div class="status" id="status-bar">siap.</div>
            </div>

            {{-- ===== KODE BLADE ===== --}}
            <div class="card">
                <p class="card-title">Generated code — copy paste ke blade kamu</p>
                <pre id="kode-output"></pre>
            </div>

        </div>

        {{-- ===== PUTER.JS ===== --}}
        <script src="https://js.puter.com/v2/"></script>

        <script>
            // ============================================================
            // STATE
            // ============================================================
            let provider = 'polly';
            let queue = [];
            let isPlaying = false;
            let curAudio = null;

            // ============================================================
            // PROVIDER SWITCH
            // ============================================================
            function setProvider(el, prov) {
                provider = prov;
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                el.classList.add('active');
                ['polly', 'openai', 'gemini'].forEach(p => {
                    document.getElementById('opt-' + p).style.display = (p === prov) ? '' : 'none';
                });
                refreshCode();
            }

            // ============================================================
            // AMBIL OPSI SESUAI PROVIDER
            // ============================================================
            function getOpts() {
                if (provider === 'polly') {
                    return {
                        engine: document.getElementById('polly-engine').value,
                        language: document.getElementById('polly-lang').value,
                    };
                }
                if (provider === 'openai') {
                    return {
                        provider: 'openai',
                        model: document.getElementById('openai-model').value,
                        voice: document.getElementById('openai-voice').value,
                        speed: parseFloat(document.getElementById('openai-speed').value),
                    };
                }
                if (provider === 'gemini') {
                    const instr = document.getElementById('gemini-instr').value.trim();
                    const o = {
                        provider: 'gemini',
                        model: document.getElementById('gemini-model').value,
                        voice: document.getElementById('gemini-voice').value,
                    };
                    if (instr) o.instructions = instr;
                    return o;
                }
            }

            // ============================================================
            // PRESET
            // ============================================================
            function preset(teks) {
                document.getElementById('teks-input').value = teks;
            }

            // ============================================================
            // PUTAR LANGSUNG
            // ============================================================
            async function mainkanLangsung() {
                const teks = document.getElementById('teks-input').value.trim();
                if (!teks) return;

                const btn = document.getElementById('btn-langsung');
                btn.disabled = true;
                setStatus('Menghubungi Puter.js...', 'active');
                setViz(true);

                try {
                    const audio = await puter.ai.txt2speech(teks, getOpts());
                    curAudio = audio;
                    audio.play();
                    setStatus('Memutar...', 'active');
                    audio.onended = () => {
                        setStatus('Selesai.', '');
                        btn.disabled = false;
                        setViz(false);
                    };
                    audio.onerror = () => {
                        setStatus('Error memutar audio.', 'error');
                        btn.disabled = false;
                        setViz(false);
                    };
                } catch (e) {
                    setStatus('Error: ' + (e.message || JSON.stringify(e)), 'error');
                    btn.disabled = false;
                    setViz(false);
                }
            }

            // ============================================================
            // TAMBAH KE ANTRIAN
            // ============================================================
            function tambahAntrian() {
                const teks = document.getElementById('teks-input').value.trim();
                if (!teks) return;
                queue.push({
                    teks,
                    prov: provider,
                    opts: getOpts()
                });
                renderQueue();
                setStatus('Ditambahkan ke antrian (' + queue.length + ' item).', '');
            }

            // ============================================================
            // PROSES ANTRIAN
            // ============================================================
            async function prosesAntrian() {
                if (isPlaying || queue.length === 0) {
                    if (queue.length === 0) setStatus('Antrian kosong. Tambahkan teks terlebih dahulu.', 'error');
                    return;
                }
                isPlaying = true;
                renderQueue();

                while (queue.length > 0) {
                    const item = queue[0];
                    setStatus('Memuat: "' + item.teks.substring(0, 50) + (item.teks.length > 50 ? '...' : '') + '"',
                        'active');
                    setViz(true);
                    try {
                        const audio = await puter.ai.txt2speech(item.teks, item.opts);
                        curAudio = audio;
                        renderQueue();
                        await new Promise((res, rej) => {
                            audio.onended = res;
                            audio.onerror = rej;
                            audio.play();
                        });
                    } catch (e) {
                        setStatus('Error pada item: ' + (e.message || e), 'error');
                    }
                    queue.shift();
                    setViz(false);
                    renderQueue();
                    await delay(500);
                }

                isPlaying = false;
                setStatus('Antrian selesai.', '');
                renderQueue();
            }

            // ============================================================
            // HENTIKAN
            // ============================================================
            function hentikan() {
                if (curAudio) {
                    try {
                        curAudio.pause();
                        curAudio.currentTime = 0;
                    } catch (e) {}
                }
                isPlaying = false;
                queue = [];
                setViz(false);
                setStatus('Dihentikan.', '');
                renderQueue();
            }

            // ============================================================
            // RENDER ANTRIAN
            // ============================================================
            function renderQueue() {
                const el = document.getElementById('daftar-antrian');
                if (queue.length === 0) {
                    el.innerHTML = '<p class="q-empty">— antrian kosong —</p>';
                    return;
                }
                el.innerHTML = queue.map((item, i) => {
                    const playing = (i === 0 && isPlaying);
                    return `
        <div class="q-item ${playing ? 'playing' : 'waiting'}">
            <div class="q-meta">
                <span class="q-num">${String(i + 1).padStart(2,'0')}.</span>
                <span class="q-teks">${escHtml(item.teks)}</span>
                <span class="badge badge-prov">${item.prov}</span>
                ${playing ? '<span class="badge badge-play">playing</span>' : '<span class="badge badge-wait">wait</span>'}
            </div>
            <button class="del" onclick="hapus(${i})" title="Hapus">×</button>
        </div>`;
                }).join('');
            }

            function hapus(i) {
                if (isPlaying && i === 0) return;
                queue.splice(i, 1);
                renderQueue();
            }

            // ============================================================
            // STATUS & VISUALIZER
            // ============================================================
            function setStatus(msg, type) {
                const el = document.getElementById('status-bar');
                el.textContent = '> ' + msg;
                el.className = 'status' + (type ? ' ' + type : '');
            }

            function setViz(on) {
                const bars = document.querySelectorAll('.viz-bar');
                bars.forEach(b => on ? b.classList.add('active') : b.classList.remove('active'));
            }

            // ============================================================
            // GENERATED CODE UNTUK BLADE
            // ============================================================
            function refreshCode() {
                const opts = getOpts();
                const optsStr = JSON.stringify(opts, null, 8)
                    .replace(/^{/, '{')
                    .replace(/}$/, '        }');

                const code = `{{-- Tambahkan sebelum </body> --}}
<script src="https://js.puter.com/v2/"><\/script>

<script>
    /**
     * Puter.js TTS — Antrian
     * Provider: ${provider}
     */
    const TTSQueue = {
        queue:   [],
        playing: false,
        audio:   null,

        // Tambah teks ke antrian lalu proses otomatis
        add(teks) {
            this.queue.push(teks);
            if (!this.playing) this._process();
        },

        // Proses satu per satu
        async _process() {
            if (this.queue.length === 0) { this.playing = false; return; }
            this.playing = true;

            const teks = this.queue.shift();
            try {
                const audio = await puter.ai.txt2speech(teks, ${optsStr});
                this.audio = audio;
                await new Promise((res, rej) => {
                    audio.onended = res;
                    audio.onerror = rej;
                    audio.play();
                });
                await new Promise(r => setTimeout(r, 400)); // jeda antar item
            } catch(e) {
                console.error('[TTS] Error:', e);
            }
            this._process();
        },

        // Stop semua
        stop() {
            if (this.audio) { try { this.audio.pause(); } catch(e){} }
            this.queue   = [];
            this.playing = false;
        }
    };

    // ── Contoh pemakaian langsung ──────────────────────────
    // TTSQueue.add('Antrian nomor 001, silakan ke loket 1.');
    // TTSQueue.add('Antrian nomor 002, silakan ke loket 2.');

    // ── Dari tombol di blade ───────────────────────────────
    // <button onclick="TTSQueue.add('Antrian dipanggil')">Panggil</button>

    // ── Dari Livewire event ────────────────────────────────
    // Livewire.on('panggil-antrian', ({ nomor, loket }) => {
    //     TTSQueue.add(\`Antrian nomor \${nomor}, silakan ke loket \${loket}.\`);
    // });

    // ── Dari Alpine.js ─────────────────────────────────────
    // @click="TTSQueue.add('teks kamu')"
<\/script>`;

                document.getElementById('kode-output').textContent = code;
            }

            // ============================================================
            // HELPERS
            // ============================================================
            function delay(ms) {
                return new Promise(r => setTimeout(r, ms));
            }

            function escHtml(s) {
                return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }

            // Init
            refreshCode();
        </script>
    </body>

</html>
