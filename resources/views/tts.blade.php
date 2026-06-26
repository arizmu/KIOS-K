<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini TTS</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: system-ui, sans-serif;
            background: #f9f9f8;
            color: #1a1a1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e5e3;
            border-radius: 14px;
            padding: 2rem;
            width: 100%;
            max-width: 520px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        h2 {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .sub {
            font-size: 12px;
            color: #888;
            margin-bottom: 1.5rem;
        }

        label {
            font-size: 12px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            height: 110px;
            padding: 10px 12px;
            border: 1px solid #e0e0de;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            color: #1a1a1a;
            background: #fafaf9;
            resize: vertical;
            outline: none;
            transition: border-color 0.15s;
        }
        textarea:focus { border-color: #3b82f6; background: #fff; }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin: 12px 0;
        }

        select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #e0e0de;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            color: #1a1a1a;
            background: #fafaf9;
            outline: none;
            cursor: pointer;
        }
        select:focus { border-color: #3b82f6; }

        .btn-speak {
            width: 100%;
            padding: 11px;
            margin-top: 4px;
            background: #1a1a1a;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s, opacity 0.15s;
        }
        .btn-speak:hover:not(:disabled) { background: #333; }
        .btn-speak:disabled { opacity: 0.4; cursor: not-allowed; }

        /* Status */
        .status {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            min-height: 22px;
            font-size: 12px;
            color: #888;
        }

        .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #d1d5db;
            flex-shrink: 0;
            transition: background 0.2s;
        }
        .dot.loading { background: #f59e0b; animation: pulse 1s infinite; }
        .dot.playing  { background: #22c55e; animation: pulse 1s infinite; }
        .dot.error    { background: #ef4444; animation: none; }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.3; }
        }

        /* Wave bars */
        .wave {
            display: flex;
            align-items: center;
            gap: 2px;
            height: 18px;
            margin-left: auto;
        }
        .bar {
            width: 3px;
            background: #22c55e;
            border-radius: 2px;
            height: 3px;
            transition: height 0.1s;
        }
        .bar.on { animation: bar-wave 0.5s ease infinite alternate; }
        .bar.on:nth-child(2) { animation-delay: 0.1s; }
        .bar.on:nth-child(3) { animation-delay: 0.2s; }
        .bar.on:nth-child(4) { animation-delay: 0.1s; }
        @keyframes bar-wave { from { height: 3px; } to { height: 16px; } }

        hr { border: none; border-top: 1px solid #f0f0ee; margin: 1.25rem 0; }

        /* Instruksi toggle */
        .toggle-instr {
            font-size: 12px;
            color: #3b82f6;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            font-family: inherit;
            margin-bottom: 8px;
            display: block;
        }
        .instr-box {
            display: none;
            margin-bottom: 12px;
        }
        .instr-box.show { display: block; }
        .instr-box input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #e0e0de;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            color: #1a1a1a;
            outline: none;
        }
        .instr-box input:focus { border-color: #3b82f6; }
    </style>
</head>
<body>

<div class="card">
    <h2>Gemini Text to Speech</h2>
    <p class="sub">Gratis · Tanpa API Key · Powered by Puter.js</p>

    <label for="teks">Teks yang akan diucapkan</label>
    <textarea id="teks" placeholder="Tulis teks di sini...">Antrian nomor 001, silakan menuju loket 1.</textarea>

    <div class="row">
        <div>
            <label for="voice">Suara</label>
            <select id="voice">
                <option value="Kore">Kore — formal, jelas</option>
                <option value="Aoede">Aoede — hangat</option>
                <option value="Puck">Puck — energik</option>
                <option value="Fenrir">Fenrir — tegas</option>
                <option value="Charon">Charon — berwibawa</option>
                <option value="Leda">Leda — lembut</option>
            </select>
        </div>
        <div>
            <label for="model">Model</label>
            <select id="model">
                <option value="gemini-2.5-flash-preview-tts">2.5 Flash (cepat)</option>
                <option value="gemini-2.5-pro-preview-tts">2.5 Pro (kualitas)</option>
            </select>
        </div>
    </div>

    <button class="toggle-instr" onclick="toggleInstr()">+ Gaya bicara (opsional)</button>
    <div class="instr-box" id="instr-box">
        <input type="text" id="instruksi"
            placeholder="Contoh: bicara pelan, sopan, dan jelas"
            value="Bicara dengan nada sopan, jelas, dan tidak terlalu cepat.">
    </div>

    <button class="btn-speak" id="btn-speak" onclick="speak()">
        Ucapkan
    </button>

    <div class="status">
        <div class="dot" id="dot"></div>
        <span id="status-txt">Siap.</span>
        <div class="wave" id="wave">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</div>

{{-- Puter.js — tidak butuh API key --}}
<script src="https://js.puter.com/v2/"></script>

<script>
    // ─────────────────────────────────────────
    // Toggle instruksi gaya bicara
    // ─────────────────────────────────────────
    function toggleInstr() {
        const box = document.getElementById('instr-box');
        box.classList.toggle('show');
    }

    // ─────────────────────────────────────────
    // Fungsi utama TTS
    // ─────────────────────────────────────────
    async function speak() {
        const teks      = document.getElementById('teks').value.trim();
        const voice     = document.getElementById('voice').value;
        const model     = document.getElementById('model').value;
        const instruksi = document.getElementById('instruksi')?.value.trim() || '';

        if (!teks) {
            setStatus('Tulis teks terlebih dahulu.', 'error');
            return;
        }

        setBusy(true);
        setStatus('Menghubungi Gemini...', 'loading');

        try {
            // Opsi Gemini TTS
            const opts = {
                provider: 'gemini',
                model:    model,
                voice:    voice,
            };
            if (instruksi) opts.instructions = instruksi;

            const audio = await puter.ai.txt2speech(teks, opts);

            setStatus('Memutar...', 'playing');
            setWave(true);

            await new Promise((resolve, reject) => {
                audio.onended = resolve;
                audio.onerror = reject;
                audio.play();
            });

            setStatus('Selesai.', '');
        } catch (err) {
            console.error('[GeminiTTS]', err);
            setStatus('Gagal: ' + (err.message || 'Cek koneksi / login Puter.'), 'error');
        }

        setBusy(false);
        setWave(false);
    }

    // ─────────────────────────────────────────
    // Helpers UI
    // ─────────────────────────────────────────
    function setStatus(msg, type) {
        document.getElementById('status-txt').textContent = msg;
        const dot = document.getElementById('dot');
        dot.className = 'dot' + (type ? ' ' + type : '');
    }

    function setBusy(busy) {
        document.getElementById('btn-speak').disabled = busy;
    }

    function setWave(on) {
        document.querySelectorAll('.bar').forEach(b => {
            on ? b.classList.add('on') : b.classList.remove('on');
        });
    }
</script>

</body>
</html>