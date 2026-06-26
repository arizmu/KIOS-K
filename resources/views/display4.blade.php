
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows TTS Web App</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f2f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            resize: vertical;
        }
        select, button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button {
            background: #0078d4;
            color: white;
            border: none;
            transition: background 0.2s;
        }
        button:hover {
            background: #005a9e;
        }
        button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .controls {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .controls button {
            flex: 1;
        }
        .stop-btn {
            background: #d32f2f;
        }
        .stop-btn:hover {
            background: #b71c1c;
        }
        .range-group {
            margin-top: 15px;
        }
        .range-group label {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #555;
        }
        input[type="range"] {
            width: 100%;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎙️ Text to Speech (Windows TTS)</h2>
        
        <textarea id="textInput" placeholder="Ketik teks di sini...">Halo, ini adalah contoh text to speech menggunakan suara bawaan Windows.</textarea>
        
        <div class="range-group">
            <label>Kecepatan: <span id="rateValue">1</span></label>
            <input type="range" id="rate" min="0.5" max="2" step="0.1" value="1">
        </div>
        
        <div class="range-group">
            <label>Nada (Pitch): <span id="pitchValue">1</span></label>
            <input type="range" id="pitch" min="0.5" max="2" step="0.1" value="1">
        </div>
        
        <div class="range-group">
            <label>Volume: <span id="volumeValue">1</span></label>
            <input type="range" id="volume" min="0" max="1" step="0.1" value="1">
        </div>
        
        <select id="voiceSelect">
            <option value="">Memuat daftar suara...</option>
        </select>
        
        <div class="controls">
            <button id="speakBtn" onclick="speak()">🔊 Bicara</button>
            <button id="stopBtn" class="stop-btn" onclick="stop()">⏹️ Stop</button>
        </div>
        
        <p id="status" style="margin-top:15px; color:#666; font-size:14px;"></p>
    </div>

    <script>
        const synth = window.speechSynthesis;
        const voiceSelect = document.getElementById('voiceSelect');
        const textInput = document.getElementById('textInput');
        const rate = document.getElementById('rate');
        const pitch = document.getElementById('pitch');
        const volume = document.getElementById('volume');
        const status = document.getElementById('status');
        let voices = [];

        // Update nilai slider
        rate.oninput = () => document.getElementById('rateValue').textContent = rate.value;
        pitch.oninput = () => document.getElementById('pitchValue').textContent = pitch.value;
        volume.oninput = () => document.getElementById('volumeValue').textContent = volume.value;

        // Muat daftar suara
        function loadVoices() {
            voices = synth.getVoices();
            
            // Filter suara Indonesia dan English (Windows biasanya punya)
            const preferredVoices = voices.filter(v => 
                v.lang.startsWith('id') || 
                v.lang.startsWith('en') ||
                v.name.includes('Microsoft')
            );
            
            voiceSelect.innerHTML = '';
            
            // Tambahkan semua suara yang tersedia
            voices.forEach((voice, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = `${voice.name} (${voice.lang})`;
                
                // Tandai suara default Windows
                if (voice.default) option.textContent += ' ⭐';
                
                voiceSelect.appendChild(option);
            });
            
            // Pilih suara Indonesia jika ada, atau suara Microsoft pertama
            const idVoice = voices.findIndex(v => v.lang.startsWith('id'));
            const msVoice = voices.findIndex(v => v.name.includes('Microsoft'));
            voiceSelect.value = idVoice !== -1 ? idVoice : (msVoice !== -1 ? msVoice : 0);
            
            status.textContent = `${voices.length} suara tersedia`;
        }

        // Beberapa browser membutuhkan event untuk memuat suara
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = loadVoices;
        }
        loadVoices(); // Coba langsung

        function speak() {
            if (synth.speaking) {
                synth.cancel(); // Hentikan yang sedang berjalan
            }

            const text = textInput.value.trim();
            if (!text) {
                status.textContent = 'Silakan masukkan teks terlebih dahulu!';
                return;
            }

            const utterance = new SpeechSynthesisUtterance(text);
            
            // Pilih suara
            const selectedVoice = voices[voiceSelect.value];
            if (selectedVoice) {
                utterance.voice = selectedVoice;
                utterance.lang = selectedVoice.lang;
            }

            // Atur parameter
            utterance.rate = parseFloat(rate.value);
            utterance.pitch = parseFloat(pitch.value);
            utterance.volume = parseFloat(volume.value);

            // Event handlers
            utterance.onstart = () => {
                status.textContent = '🔊 Sedang membaca...';
                document.getElementById('speakBtn').disabled = true;
            };
            
            utterance.onend = () => {
                status.textContent = '✅ Selesai membaca';
                document.getElementById('speakBtn').disabled = false;
            };
            
            utterance.onerror = (e) => {
                status.textContent = '❌ Error: ' + e.error;
                document.getElementById('speakBtn').disabled = false;
            };

            synth.speak(utterance);
        }

        function stop() {
            if (synth.speaking) {
                synth.cancel();
                status.textContent = '⏹️ Dibatalkan';
                document.getElementById('speakBtn').disabled = false;
            }
        }

        // Shortcut keyboard
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'Enter') speak();
            if (e.key === 'Escape') stop();
        });
    </script>
</body>
</html>