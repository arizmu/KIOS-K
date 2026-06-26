<x-app-layouts>
    <x-app-headers />
    <div x-data="AppConfig" class="base-holiday">
        <div class="mx-auto p-4">

            {{-- Page Header --}}
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-base-content">Pengaturan Aplikasi</h1>
                    <p class="text-base-content/60">Kelola profil instansi dan tampilan kiosk</p>
                </div>
                <div x-show="saveSuccess" x-transition class="alert alert-success max-w-xs py-2">
                    <span class="icon-[tabler--check] size-4"></span>
                    <span class="text-sm">Pengaturan berhasil disimpan!</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ============================================ --}}
                {{-- LEFT COLUMN: Logo & Tema --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-1 flex flex-col gap-6">

                    {{-- Logo Card --}}
                    <div class="card border border-base-200 shadow-sm">
                        <div class="card-header">
                            <h2 class="card-title text-base">
                                <span class="icon-[tabler--photo] size-5 text-primary"></span>
                                Logo Instansi
                            </h2>
                        </div>
                        <div class="card-body flex flex-col items-center gap-4">

                            {{-- Logo Preview --}}
                            <div
                                class="relative w-36 h-36 rounded-2xl border-2 border-dashed border-base-300 bg-base-200 flex items-center justify-center overflow-hidden group">
                                <template x-if="logoPreview || form.logo">
                                    <img :src="logoPreview || '/storage/' + form.logo" alt="Logo Instansi"
                                        class="w-full h-full object-contain p-2" />
                                </template>
                                <template x-if="!logoPreview && !form.logo">
                                    <div class="text-center text-base-content/40">
                                        <span class="icon-[tabler--building] size-14 block mx-auto mb-1"></span>
                                        <span class="text-xs">Belum ada logo</span>
                                    </div>
                                </template>
                            </div>

                            {{-- Upload Button --}}
                            <div class="w-full flex flex-col gap-2">
                                <label for="logo-upload"
                                    class="btn btn-outline btn-primary btn-sm w-full cursor-pointer">
                                    <span class="icon-[tabler--upload] size-4"></span>
                                    <span x-text="isUploadingLogo ? 'Mengunggah...' : 'Pilih Logo'"></span>
                                </label>
                                <input id="logo-upload" type="file" class="hidden"
                                    accept="image/jpeg,image/png,image/jpg,image/gif" @change="handleLogoChange"
                                    :disabled="isUploadingLogo" />

                                <template x-if="form.logo">
                                    <button type="button" @click="deleteLogo()"
                                        class="btn btn-outline btn-error btn-sm w-full" :disabled="isUploadingLogo">
                                        <span class="icon-[tabler--trash] size-4"></span>
                                        Hapus Logo
                                    </button>
                                </template>
                            </div>

                            <p class="text-xs text-base-content/50 text-center">
                                Format: JPG, PNG, GIF<br>Maks. 2MB
                            </p>
                        </div>
                    </div>

                </div>

                {{-- ============================================ --}}
                {{-- RIGHT COLUMN: Form Profil & Sosmed --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-2 flex flex-col gap-6">

                    {{-- Profil Instansi Card --}}
                    <div class="card border border-base-200 shadow-sm">
                        <div class="card-header">
                            <h2 class="card-title text-base">
                                <span class="icon-[tabler--building-estate] size-5 text-primary"></span>
                                Profil Instansi
                            </h2>
                        </div>
                        <div class="card-body space-y-4">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{-- Nama Instansi --}}
                                <div class="md:col-span-2">
                                    <label class="label-text mb-1 block" for="instansi_name">
                                        Nama Instansi <span class="text-error">*</span>
                                    </label>
                                    <input id="instansi_name" type="text" x-model="form.instansi_name"
                                        placeholder="Contoh: Dinas Kependudukan Kota Maros" class="input w-full"
                                        :class="errors.instansi_name ? 'input-error' : ''" />
                                    <span x-show="errors.instansi_name" class="text-error text-xs mt-1"
                                        x-text="errors.instansi_name"></span>
                                </div>

                                {{-- Nomor Telepon --}}
                                <div>
                                    <label class="label-text mb-1 block" for="instansi_phone">Nomor Telepon</label>
                                    <div class="input w-full flex items-center gap-2">
                                        <span class="icon-[tabler--phone] size-4 text-base-content/50 shrink-0"></span>
                                        <input id="instansi_phone" type="tel" x-model="form.instansi_phone"
                                            placeholder="0411-xxxxxx" class="grow bg-transparent outline-none" />
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="label-text mb-1 block" for="instansi_email">Email</label>
                                    <div class="input w-full flex items-center gap-2">
                                        <span class="icon-[tabler--mail] size-4 text-base-content/50 shrink-0"></span>
                                        <input id="instansi_email" type="email" x-model="form.instansi_email"
                                            placeholder="info@instansi.go.id"
                                            class="grow bg-transparent outline-none" />
                                    </div>
                                </div>

                                {{-- Alamat --}}
                                <div class="md:col-span-2">
                                    <label class="label-text mb-1 block" for="instansi_address">Alamat</label>
                                    <textarea id="instansi_address" x-model="form.instansi_address" rows="3"
                                        placeholder="Jl. Contoh No. 1, Maros, Sulawesi Selatan" class="textarea w-full"></textarea>
                                </div>

                                {{-- Footer Text --}}
                                <div class="md:col-span-2">
                                    <label class="label-text mb-1 block" for="footer_text">
                                        Teks Running Text (Footer Display)
                                    </label>
                                    <textarea id="footer_text" x-model="form.footer_text" rows="2"
                                        placeholder="Selamat datang | Jam operasional: Senin - Jumat 08:00 - 17:00 | ..." class="textarea w-full"></textarea>
                                    <p class="text-xs text-base-content/50 mt-1">Teks ini akan ditampilkan sebagai
                                        running text di layar display antrian.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Sosial Media Card --}}
                    <div class="card border border-base-200 shadow-sm">
                        <div class="card-header">
                            <h2 class="card-title text-base">
                                <span class="icon-[tabler--share] size-5 text-primary"></span>
                                Media Sosial
                            </h2>
                        </div>
                        <div class="card-body space-y-4">

                            {{-- Facebook --}}
                            <div>
                                <label class="label-text mb-1 block" for="social_facebook">Facebook</label>
                                <div class="input w-full flex items-center gap-2">
                                    <svg class="size-4 shrink-0 text-blue-600" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    <input id="social_facebook" type="url" x-model="form.social_media_facebook"
                                        placeholder="https://facebook.com/instansi"
                                        class="grow bg-transparent outline-none" />
                                </div>
                            </div>

                            {{-- Instagram --}}
                            <div>
                                <label class="label-text mb-1 block" for="social_instagram">Instagram</label>
                                <div class="input w-full flex items-center gap-2">
                                    <svg class="size-4 shrink-0 text-pink-600" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                                    </svg>
                                    <input id="social_instagram" type="url" x-model="form.social_media_instagram"
                                        placeholder="https://instagram.com/instansi"
                                        class="grow bg-transparent outline-none" />
                                </div>
                            </div>

                            {{-- Twitter / X --}}
                            <div>
                                <label class="label-text mb-1 block" for="social_twitter">Twitter / X</label>
                                <div class="input w-full flex items-center gap-2">
                                    <svg class="size-4 shrink-0 text-base-content" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                    <input id="social_twitter" type="url" x-model="form.social_media_twitter"
                                        placeholder="https://twitter.com/instansi"
                                        class="grow bg-transparent outline-none" />
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Save Button --}}
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="loadConfig()" class="btn btn-ghost" :disabled="isSaving">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 512 512">
                                <path d="M0 0h512v512H0z" fill="none" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M426.667 106.667v42.666L358 149.33c36.077 31.659 58.188 77.991 58.146 128.474c-.065 78.179-53.242 146.318-129.062 165.376s-154.896-15.838-191.92-84.695C58.141 289.63 72.637 204.42 130.347 151.68a85.33 85.33 0 0 0 33.28 30.507a124.59 124.59 0 0 0-46.294 97.066c1.05 69.942 58.051 126.088 128 126.08c64.072 1.056 118.71-46.195 126.906-109.749c6.124-47.483-15.135-92.74-52.236-118.947L320 256h-42.667V106.667zM202.667 64c23.564 0 42.666 19.103 42.666 42.667s-19.102 42.666-42.666 42.666S160 130.231 160 106.667S179.103 64 202.667 64" />
                            </svg>

                            Reset
                        </button>
                        <button type="button" @click="saveConfig()" class="btn btn-primary min-w-32"
                            :disabled="isSaving">
                            <span x-show="isSaving" class="loading loading-spinner loading-sm"></span>
                            <svg x-show="!isSaving" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="currentColor"
                                    d="M18 15h-2v2h2m0-6h-2v2h2m2 6h-8v-2h2v-2h-2v-2h2v-2h-2V9h8M10 7H8V5h2m0 6H8V9h2m0 6H8v-2h2m0 6H8v-2h2M6 7H4V5h2m0 6H4V9h2m0 6H4v-2h2m0 6H4v-2h2m6-10V3H2v18h20V7z" />
                            </svg>

                            <span x-text="isSaving ? 'Menyimpan...' : 'Simpan Pengaturan'"></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function AppConfig() {
                return {
                    form: {
                        instansi_name: '',
                        instansi_address: '',
                        instansi_phone: '',
                        instansi_email: '',
                        logo: null,
                        active_theme: 'default',
                        footer_text: '',
                        social_media_facebook: '',
                        social_media_instagram: '',
                        social_media_twitter: '',
                    },
                    errors: {},
                    isSaving: false,
                    isUploadingLogo: false,
                    saveSuccess: false,
                    logoPreview: null,
                    themes: [{
                            value: 'default',
                            label: 'Default',
                            icon: '🌐'
                        },
                        {
                            value: 'dark',
                            label: 'Dark',
                            icon: '🌙'
                        },
                        {
                            value: 'light',
                            label: 'Light',
                            icon: '☀️'
                        },
                        {
                            value: 'corporate',
                            label: 'Corporate',
                            icon: '🏢'
                        },
                        {
                            value: 'modern',
                            label: 'Modern',
                            icon: '✨'
                        },
                        {
                            value: 'classic',
                            label: 'Classic',
                            icon: '📋'
                        },
                    ],

                    async loadConfig() {
                        try {
                            const res = await fetch('/app-config/data', {
                                headers: {
                                    'Accept': 'application/json'
                                }
                            });
                            if (!res.ok) throw new Error('Gagal memuat konfigurasi');
                            const data = await res.json();
                            this.form = {
                                instansi_name: data.instansi_name ?? '',
                                instansi_address: data.instansi_address ?? '',
                                instansi_phone: data.instansi_phone ?? '',
                                instansi_email: data.instansi_email ?? '',
                                logo: data.logo ?? null,
                                active_theme: data.active_theme ?? 'default',
                                footer_text: data.footer_text ?? '',
                                social_media_facebook: data.social_media_facebook ?? '',
                                social_media_instagram: data.social_media_instagram ?? '',
                                social_media_twitter: data.social_media_twitter ?? '',
                            };
                            this.logoPreview = null;
                        } catch (e) {
                            console.error(e);
                        }
                    },

                    validate() {
                        this.errors = {};
                        if (!this.form.instansi_name || this.form.instansi_name.trim() === '') {
                            this.errors.instansi_name = 'Nama instansi wajib diisi.';
                        }
                        return Object.keys(this.errors).length === 0;
                    },

                    async saveConfig() {
                        if (!this.validate()) return;

                        this.isSaving = true;
                        // timer 5 detik untuk reset saveSuccess
                        setTimeout(() => {
                            this.saveSuccess = false;
                        }, 5000);
                        try {
                            const res = await fetch('/app-config/update', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                },
                                body: JSON.stringify(this.form),
                            });
                            if (!res.ok) {
                                const err = await res.json();
                                throw new Error(err.message || 'Gagal menyimpan');
                            }
                            this.saveSuccess = true;
                        } catch (e) {
                            alert(e.message);
                        } finally {
                            this.isSaving = false;
                        }
                    },

                    handleLogoChange(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        // Validate size (max 2MB)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Ukuran file terlalu besar. Maksimal 2MB.');
                            event.target.value = '';
                            return;
                        }

                        // Live preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.logoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);

                        // Upload immediately
                        this.uploadLogo(file);
                    },

                    async uploadLogo(file) {
                        this.isUploadingLogo = true;
                        const formData = new FormData();
                        formData.append('logo', file);

                        try {
                            const res = await fetch('/app-config/upload-logo', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                    'Accept': 'application/json',
                                },
                                body: formData,
                            });
                            if (!res.ok) {
                                const err = await res.json();
                                throw new Error(err.message || 'Upload gagal');
                            }
                            const data = await res.json();
                            this.form.logo = data.logo;
                            this.saveSuccess = true;
                            setTimeout(() => this.saveSuccess = false, 5000);
                        } catch (e) {
                            alert('Upload logo gagal: ' + e.message);
                            this.logoPreview = null;
                        } finally {
                            this.isUploadingLogo = false;
                            document.getElementById('logo-upload').value = '';
                        }
                    },

                    async deleteLogo() {
                        if (!confirm('Hapus logo instansi? Tindakan ini tidak dapat dibatalkan.')) return;

                        this.isUploadingLogo = true;
                        try {
                            const res = await fetch('/app-config/logo', {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                    'Accept': 'application/json',
                                },
                            });
                            if (!res.ok) throw new Error('Gagal menghapus logo');
                            this.form.logo = null;
                            this.logoPreview = null;
                        } catch (e) {
                            alert(e.message);
                        } finally {
                            this.isUploadingLogo = false;
                        }
                    },
                    init() {
                        this.loadConfig();
                    }
                }
            }
        </script>
    @endpush
</x-app-layouts>
