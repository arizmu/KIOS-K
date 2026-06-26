<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Antrian</title>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet">
        <style>
            *,
            *::before,
            *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            :root {
                --bg: #f5f4f0;
                --surface: #ffffff;
                --border: #e2e0d8;
                --text: #1a1916;
                --text2: #6b6860;
                --text3: #b0ada4;
                --accent: #1a6b45;
                --accent-l: #e8f4ee;
                --accent-b: #c3e6d0;
                --warn: #92400e;
                --warn-l: #fef3c7;
                --danger: #991b1b;
                --danger-l: #fee2e2;
                --radius: 12px;
                --shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
            }

            body {
                background: var(--bg);
                font-family: 'Sora', sans-serif;
                color: var(--text);
                min-height: 100vh;
                padding: 2rem 1rem 4rem;
            }

            .page {
                max-width: 860px;
                margin: 0 auto;
            }

            /* ── HEADER ── */
            .header {
                text-align: center;
                margin-bottom: 2.5rem;
            }

            .header h1 {
                font-size: 28px;
                font-weight: 700;
                letter-spacing: -0.5px;
            }

            .header p {
                font-size: 14px;
                color: var(--text2);
                margin-top: 4px;
            }

            /* ── LAYOUT ── */
            .layout {
                display: grid;
                grid-template-columns: 1fr 340px;
                gap: 1.25rem;
            }

            @media (max-width: 680px) {
                .layout {
                    grid-template-columns: 1fr;
                }
            }

            /* ── CARD ── */
            .card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: var(--radius);
                padding: 1.5rem;
                box-shadow: var(--shadow);
            }

            .card-title {
                font-size: 11px;
                font-weight: 600;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: var(--text3);
                margin-bottom: 1rem;
            }

            /* ── DISPLAY ANTRIAN ── */
            .display-box {
                background: var(--text);
                border-radius: 10px;
                padding: 2rem 1.5rem;
                text-align: center;
                margin-bottom: 1.25rem;
            }

            .display-label {
                font-size: 11px;
                color: #6b6860;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                margin-bottom: 8px;
            }

            .display-nomor {
                font-size: 72px;
                font-weight: 700;
                color: #ffffff;
                line-height: 1;
                letter-spacing: -2px;
            }

            .display-loket {
                font-size: 14px;
                color: #9ca3af;
                margin-top: 8px;
            }

            /* ── STATUS BADGE ── */
            .status-row {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 1rem;
            }

            .dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: var(--text3);
                flex-shrink: 0;
            }

            .dot.active {
                background: var(--accent);
                box-shadow: 0 0 0 3px var(--accent-b);
                animation: blink 1.2s ease infinite;
            }

            @keyframes blink {

                0%,
                100% {
                    opacity: 1
                }

                50% {
                    opacity: 0.4
                }
            }

            .status-txt {
                font-size: 13px;
                color: var(--text2);
            }

            /* ── WAVE VISUALIZER ── */
            .wave {
                display: flex;
                align-items: center;
                gap: 3px;
                height: 24px;
                margin-left: auto;
            }

            .wave-bar {
                width: 3px;
                background: var(--accent);
                border-radius: 2px;
                height: 4px;
                transition: height 0.15s ease;
            }

            .wave-bar.on {
                animation: wave 0.6s ease infinite alternate;
            }

            .wave-bar.on:nth-child(2) {
                animation-delay: 0.1s;
            }

            .wave-bar.on:nth-child(3) {
                animation-delay: 0.2s;
            }

            .wave-bar.on:nth-child(4) {
                animation-delay: 0.1s;
            }

            @keyframes wave {
                from {
                    height: 4px;
                }

                to {
                    height: 20px;
                }
            }

            /* ── TOMBOL PANGGIL ── */
            .btn-panggil {
                width: 100%;
                padding: 14px;
                background: var(--accent);
                border: none;
                border-radius: 8px;
                color: #fff;
                font-family: 'Sora', sans-serif;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.15s;
            }

            .btn-panggil:hover:not(:disabled) {
                background: #155937;
            }

            .btn-panggil:active:not(:disabled) {
                transform: scale(0.98);
            }

            .btn-panggil:disabled {
                opacity: 0.45;
                cursor: not-allowed;
            }

            .btn-ulang {
                width: 100%;
                padding: 10px;
                background: transparent;
                border: 1px solid var(--border);
                border-radius: 8px;
                color: var(--text2);
                font-family: 'Sora', sans-serif;
                font-size: 13px;
                cursor: pointer;
                margin-top: 8px;
                transition: all 0.15s;
            }

            .btn-ulang:hover:not(:disabled) {
                border-color: var(--accent);
                color: var(--accent);
            }

            .btn-ulang:disabled {
                opacity: 0.35;
                cursor: not-allowed;
            }

            /* ── FORM INPUT ── */
            .form-group {
                margin-bottom: 12px;
            }

            .form-group label {
                font-size: 12px;
                color: var(--text2);
                display: block;
                margin-bottom: 5px;
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 9px 12px;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: var(--bg);
                font-family: 'Sora', sans-serif;
                font-size: 13px;
                color: var(--text);
                outline: none;
                transition: border-color 0.15s;
            }

            .form-group input:focus,
            .form-group select:focus {
                border-color: var(--accent);
            }

            .row2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            /* ── RIWAYAT ── */
            .history-list {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .history-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 12px;
                background: var(--bg);
                border: 1px solid var(--border);
                border-radius: 8px;
                font-size: 13px;
                transition: background 0.15s;
            }

            .history-item.latest {
                background: var(--accent-l);
                border-color: var(--accent-b);
            }

            .history-item .h-nomor {
                font-weight: 600;
                font-size: 15px;
            }

            .history-item .h-loket {
                font-size: 12px;
                color: var(--text2);
            }

            .history-item .h-time {
                font-size: 11px;
                color: var(--text3);
            }

            .history-empty {
                font-size: 13px;
                color: var(--text3);
                text-align: center;
                padding: 1rem 0;
            }

            /* ── ANTRIAN MENUNGGU ── */
            .queue-list {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .queue-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 12px;
                border: 1px solid var(--border);
                border-radius: 8px;
                font-size: 13px;
            }

            .queue-item.next {
                border-color: var(--warn);
                background: var(--warn-l);
            }

            .queue-label {
                font-size: 11px;
                font-weight: 600;
                letter-spacing: 0.05em;
                color: var(--warn);
            }

            .badge-loket {
                font-size: 11px;
                padding: 2px 8px;
                background: var(--accent-l);
                color: var(--accent);
                border-radius: 20px;
                font-weight: 600;
            }

            .del-q {
                background: none;
                border: none;
                color: var(--text3);
                font-size: 18px;
                cursor: pointer;
                padding: 0 2px;
                line-height: 1;
            }

            .del-q:hover {
                color: var(--danger);
            }

            .q-empty {
                font-size: 13px;
                color: var(--text3);
                text-align: center;
                padding: 0.75rem 0;
            }

            /* ── VOICE CONFIG ── */
            .voice-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .voice-card {
                padding: 10px 12px;
                border: 1.5px solid var(--border);
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.12s;
                text-align: center;
            }

            .voice-card:hover {
                border-color: var(--accent);
            }

            .voice-card.selected {
                border-color: var(--accent);
                background: var(--accent-l);
            }

            .voice-card .v-name {
                font-size: 13px;
                font-weight: 600;
            }

            .voice-card .v-desc {
                font-size: 11px;
                color: var(--text2);
                margin-top: 2px;
            }

            /* ── TEMPLATE TEKS ── */
            .tpl-list {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .tpl-item {
                padding: 9px 12px;
                border: 1px solid var(--border);
                border-radius: 8px;
                font-size: 12px;
                color: var(--text2);
                cursor: pointer;
                transition: all 0.12s;
                line-height: 1.5;
            }

            .tpl-item:hover {
                border-color: var(--accent);
                color: var(--text);
                background: var(--accent-l);
            }

            .tpl-item.active {
                border-color: var(--accent);
                background: var(--accent-l);
                color: var(--accent);
            }

            /* ── DIVIDER ── */
            hr {
                border: none;
                border-top: 1px solid var(--border);
                margin: 1rem 0;
            }

            /* ── ALERT ── */
            .alert {
                padding: 10px 14px;
                border-radius: 8px;
                font-size: 12px;
                line-height: 1.5;
                margin-bottom: 1rem;
            }

            .alert-info {
                background: #eff6ff;
                color: #1e40af;
                border: 1px solid #bfdbfe;
            }

            .alert-warn {
                background: var(--warn-l);
                color: var(--warn);
                border: 1px solid #fde68a;
            }
        </style>
    </head>

    <body>
        <div class="page">

            <div class="header">
                <h1>Sistem Antrian</h1>
                <p>Powered by Puter.js · Gemini TTS · Tanpa API Key</p>
            </div>

            <div class="layout">

                {{-- ════════════════════════════════
             KOLOM KIRI — PANEL UTAMA
        ════════════════════════════════ --}}
                <div>

                    {{-- Display nomor antrian --}}
                    <div class="card" style="margin-bottom:1.25rem">
                        <div class="display-box">
                            <div class="display-label">Nomor antrian</div>
                            <div class="display-nomor" id="disp-nomor">—</div>
                            <div class="display-loket" id="disp-loket">Belum ada panggilan</div>
                        </div>

                        <div class="status-row">
                            <div class="dot" id="status-dot"></div>
                            <span class="status-txt" id="status-txt">Siap memanggil.</span>
                            <div class="wave" id="wave">
                                <div class="wave-bar"></div>
                                <div class="wave-bar"></div>
                                <div class="wave-bar"></div>
                                <div class="wave-bar"></div>
                                <div class="wave-bar"></div>
                            </div>
                        </div>

                        <button class="btn-panggil" id="btn-panggil" onclick="panggilBerikutnya()">
                            Panggil Antrian Berikutnya
                        </button>
                        <button class="btn-ulang" id="btn-ulang" onclick="ulangiPanggilan()" disabled>
                            ↺ Ulangi panggilan terakhir
                        </button>
                    </div>

                    {{-- Tambah antrian manual --}}
                    <div class="card" style="margin-bottom:1.25rem">
                        <p class="card-title">Tambah Antrian</p>

                        <div class="row2">
                            <div class="form-group" style="margin:0">
                                <label>Nomor antrian</label>
                                <input type="number" id="inp-nomor" placeholder="001" min="1" max="999">
                            </div>
                            <div class="form-group" style="margin:0">
                                <label>Loket tujuan</label>
                                <select id="inp-loket">
                                    <option value="1">Loket 1</option>
                                    <option value="2">Loket 2</option>
                                    <option value="3">Loket 3</option>
                                    <option value="4">Loket 4</option>
                                    <option value="5">Loket 5</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-top:10px;display:flex;gap:8px">
                            <button class="btn-ulang" style="margin:0;flex:1" onclick="tambahSatu()">+ Tambah</button>
                            <button class="btn-ulang" style="margin:0;flex:1" onclick="tambahOtomatis()">⚡ Auto
                                +10</button>
                        </div>
                    </div>

                    {{-- Riwayat --}}
                    <div class="card">
                        <p class="card-title">Riwayat Dipanggil</p>
                        <div class="history-list" id="history-list">
                            <p class="history-empty">Belum ada riwayat.</p>
                        </div>
                    </div>

                </div>

                {{-- ════════════════════════════════
             KOLOM KANAN — SIDEBAR
        ════════════════════════════════ --}}
                <div>

                    {{-- Antrian menunggu --}}
                    <div class="card" style="margin-bottom:1.25rem">
                        <p class="card-title">Menunggu <span id="q-count" style="color:var(--accent)">0</span></p>
                        <div class="queue-list" id="queue-list">
                            <p class="q-empty">Antrian kosong.</p>
                        </div>
                    </div>

                    {{-- Pilih suara --}}
                    <div class="card" style="margin-bottom:1.25rem">
                        <p class="card-title">Suara (Gemini)</p>
                        <div class="voice-grid" id="voice-grid">
                            <div class="voice-card selected" onclick="pilihVoice(this,'Kore')">
                                <div class="v-name">Kore</div>
                                <div class="v-desc">Formal, jelas</div>
                            </div>
                            <div class="voice-card" onclick="pilihVoice(this,'Aoede')">
                                <div class="v-name">Aoede</div>
                                <div class="v-desc">Hangat, ramah</div>
                            </div>
                            <div class="voice-card" onclick="pilihVoice(this,'Puck')">
                                <div class="v-name">Puck</div>
                                <div class="v-desc">Energik</div>
                            </div>
                            <div class="voice-card" onclick="pilihVoice(this,'Fenrir')">
                                <div class="v-name">Fenrir</div>
                                <div class="v-desc">Tegas, wibawa</div>
                            </div>
                            <div class="voice-card" onclick="pilihVoice(this,'Charon')">
                                <div class="v-name">Charon</div>
                                <div class="v-desc">Dalam, berwibawa</div>
                            </div>
                            <div class="voice-card" onclick="pilihVoice(this,'Leda')">
                                <div class="v-name">Leda</div>
                                <div class="v-desc">Lembut, sopan</div>
                            </div>
                        </div>
                    </div>

                    {{-- Template teks --}}
                    <div class="card" style="margin-bottom:1.25rem">
                        <p class="card-title">Template Teks</p>
                        <div class="tpl-list">
                            <div class="tpl-item active"
                                onclick="pilihTemplate(this, 'Antrian nomor {nomor}, silakan menuju loket {loket}.')">
                                Antrian nomor {nomor}, silakan menuju loket {loket}.
                            </div>
                            <div class="tpl-item"
                                onclick="pilihTemplate(this, 'Nomor antrian {nomor}, loket {loket}, silakan.')">
                                Nomor antrian {nomor}, loket {loket}, silakan.
                            </div>
                            <div class="tpl-item"
                                onclick="pilihTemplate(this, 'Dengan hormat, kepada nomor antrian {nomor}, mohon segera menuju loket {loket}.')">
                                Dengan hormat, nomor {nomor} mohon ke loket {loket}.
                            </div>
                            <div class="tpl-item"
                                onclick="pilihTemplate(this, 'Nomor {nomor}, Anda dipanggil. Silakan ke loket {loket}.')">
                                Nomor {nomor}, Anda dipanggil ke loket {loket}.
                            </div>
                        </div>
                    </div>

                    {{-- Instruksi Gemini --}}
                    <div class="card">
                        <p class="card-title">Gaya Suara</p>
                        <div class="form-group" style="margin-bottom:8px">
                            <label>Instruksi untuk Gemini</label>
                            <input type="text" id="inp-instruksi" placeholder="Contoh: sopan dan jelas"
                                value="Bicara dengan nada sopan, jelas, dan tidak terlalu cepat.">
                        </div>
                        <div class="alert alert-info" style="margin:0;font-size:11px">
                            Instruksi ini mengatur cara Gemini berbicara. Ubah sesuai kebutuhan.
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- ══════════════════════════════════════════════════════
     PUTER.JS — Gemini TTS
     Tidak butuh API Key. User login dengan akun Puter gratis.
══════════════════════════════════════════════════════ --}}
        <script src="https://js.puter.com/v2/"></script>

        <script>
            // ══════════════════════════════════════════
            // STATE
            // ══════════════════════════════════════════
            let antrianList = []; // [{nomor, loket}]
            let historyList = []; // [{nomor, loket, waktu}]
            let lastPanggil = null; // {nomor, loket, teks}
            let selectedVoice = 'Kore';
            let selectedTemplate = 'Antrian nomor {nomor}, silakan menuju loket {loket}.';
            let isPlaying = false;
            let nomorAuto = 1;

            // ══════════════════════════════════════════
            // PILIH VOICE
            // ══════════════════════════════════════════
            function pilihVoice(el, voice) {
                selectedVoice = voice;
                document.querySelectorAll('.voice-card').forEach(c => c.classList.remove('selected'));
                el.classList.add('selected');
            }

            // ══════════════════════════════════════════
            // PILIH TEMPLATE
            // ══════════════════════════════════════════
            function pilihTemplate(el, tpl) {
                selectedTemplate = tpl;
                document.querySelectorAll('.tpl-item').forEach(t => t.classList.remove('active'));
                el.classList.add('active');
            }

            // ══════════════════════════════════════════
            // TAMBAH ANTRIAN MANUAL
            // ══════════════════════════════════════════
            function tambahSatu() {
                const nomor = parseInt(document.getElementById('inp-nomor').value) || nomorAuto++;
                const loket = document.getElementById('inp-loket').value;
                antrianList.push({
                    nomor: String(nomor).padStart(3, '0'),
                    loket
                });
                renderQueue();
                document.getElementById('inp-nomor').value = '';
            }

            // ══════════════════════════════════════════
            // TAMBAH OTOMATIS 10 ANTRIAN
            // ══════════════════════════════════════════
            function tambahOtomatis() {
                for (let i = 0; i < 10; i++) {
                    const loket = (i % 5) + 1;
                    antrianList.push({
                        nomor: String(nomorAuto++).padStart(3, '0'),
                        loket: String(loket)
                    });
                }
                renderQueue();
            }

            // ══════════════════════════════════════════
            // PANGGIL BERIKUTNYA
            // ══════════════════════════════════════════
            async function panggilBerikutnya() {
                if (isPlaying) return;
                if (antrianList.length === 0) {
                    setStatus('Antrian kosong. Tambahkan nomor antrian terlebih dahulu.', 'warn');
                    return;
                }

                const item = antrianList.shift();
                await panggil(item);
            }

            // ══════════════════════════════════════════
            // ULANGI PANGGILAN TERAKHIR
            // ══════════════════════════════════════════
            async function ulangiPanggilan() {
                if (!lastPanggil || isPlaying) return;
                await speakTTS(lastPanggil.teks);
            }

            // ══════════════════════════════════════════
            // PANGGIL ITEM
            // ══════════════════════════════════════════
            async function panggil(item) {
                isPlaying = true;
                setBtnState(true);

                // Ganti {nomor} dan {loket} di template
                const teks = selectedTemplate
                    .replace(/\{nomor\}/g, item.nomor)
                    .replace(/\{loket\}/g, 'loket ' + item.loket);

                // Update display
                document.getElementById('disp-nomor').textContent = item.nomor;
                document.getElementById('disp-loket').textContent = 'Menuju Loket ' + item.loket;

                // Simpan last & history
                lastPanggil = {
                    ...item,
                    teks
                };
                historyList.unshift({
                    ...item,
                    waktu: waktuSekarang()
                });
                if (historyList.length > 20) historyList.pop();

                renderQueue();
                renderHistory();

                // Speak
                await speakTTS(teks);

                isPlaying = false;
                setBtnState(false);
                renderQueue();
            }

            // ══════════════════════════════════════════
            // GEMINI TTS — inti fungsi
            // ══════════════════════════════════════════
            async function speakTTS(teks) {
                const instruksi = document.getElementById('inp-instruksi').value.trim() ||
                    'Bicara dengan nada sopan, jelas, dan tidak terlalu cepat.';

                setStatus('Menghubungi Gemini TTS...', 'active');
                setWave(true);

                try {
                    const audio = await puter.ai.txt2speech(teks, {
                        provider: 'gemini',
                        model: 'gemini-2.5-flash-preview-tts',
                        voice: selectedVoice,
                        instructions: instruksi
                    });

                    setStatus('Memutar: "' + teks.substring(0, 55) + (teks.length > 55 ? '...' : '') + '"', 'active');

                    await new Promise((resolve, reject) => {
                        audio.onended = resolve;
                        audio.onerror = reject;
                        audio.play();
                    });

                    setStatus('Selesai. Antrian tersisa: ' + antrianList.length, '');

                } catch (err) {
                    console.error('[TTS] Error:', err);
                    setStatus('Gagal: ' + (err.message || 'Cek koneksi atau login Puter.'), 'warn');
                }

                setWave(false);
            }

            // ══════════════════════════════════════════
            // HAPUS DARI ANTRIAN
            // ══════════════════════════════════════════
            function hapusAntrian(i) {
                antrianList.splice(i, 1);
                renderQueue();
            }

            // ══════════════════════════════════════════
            // RENDER ANTRIAN
            // ══════════════════════════════════════════
            function renderQueue() {
                const el = document.getElementById('queue-list');
                document.getElementById('q-count').textContent = antrianList.length;

                if (antrianList.length === 0) {
                    el.innerHTML = '<p class="q-empty">Antrian kosong.</p>';
                    return;
                }

                el.innerHTML = antrianList.map((item, i) => `
            <div class="queue-item ${i === 0 ? 'next' : ''}">
                <div>
                    ${i === 0 ? '<div class="queue-label">BERIKUTNYA</div>' : ''}
                    <div style="font-weight:600;font-size:14px">${item.nomor}</div>
                </div>
                <div style="display:flex;align-items:center;gap:8px">
                    <span class="badge-loket">Loket ${item.loket}</span>
                    <button class="del-q" onclick="hapusAntrian(${i})" title="Hapus">×</button>
                </div>
            </div>
        `).join('');
            }

            // ══════════════════════════════════════════
            // RENDER HISTORY
            // ══════════════════════════════════════════
            function renderHistory() {
                const el = document.getElementById('history-list');
                if (historyList.length === 0) {
                    el.innerHTML = '<p class="history-empty">Belum ada riwayat.</p>';
                    return;
                }
                el.innerHTML = historyList.map((item, i) => `
            <div class="history-item ${i === 0 ? 'latest' : ''}">
                <div>
                    <div class="h-nomor">${item.nomor}</div>
                    <div class="h-loket">Loket ${item.loket}</div>
                </div>
                <div class="h-time">${item.waktu}</div>
            </div>
        `).join('');
            }

            // ══════════════════════════════════════════
            // HELPERS
            // ══════════════════════════════════════════
            function setStatus(msg, type) {
                const dot = document.getElementById('status-dot');
                const txt = document.getElementById('status-txt');
                txt.textContent = msg;
                dot.className = 'dot' + (type === 'active' ? ' active' : '');
                txt.style.color = type === 'warn' ? 'var(--warn)' : '';
            }

            function setWave(on) {
                document.querySelectorAll('.wave-bar').forEach(b => {
                    on ? b.classList.add('on') : b.classList.remove('on');
                });
            }

            function setBtnState(playing) {
                document.getElementById('btn-panggil').disabled = playing;
                document.getElementById('btn-ulang').disabled = playing || !lastPanggil;
            }

            function waktuSekarang() {
                return new Date().toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
            }

            // ══════════════════════════════════════════
            // INIT — isi contoh antrian
            // ══════════════════════════════════════════
            (function init() {
                for (let i = 1; i <= 8; i++) {
                    antrianList.push({
                        nomor: String(i).padStart(3, '0'),
                        loket: String((i % 3) + 1)
                    });
                    nomorAuto = i + 1;
                }
                renderQueue();
                renderHistory();
            })();
        </script>
    </body>

</html>
