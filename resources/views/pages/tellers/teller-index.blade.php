<x-app-layouts>
    <x-app-headers />
    <div x-data="Tellers" class="base-holiday">
        <div class="min-h-screen bg-gradient-to-br from-base-100 via-base-50 to-primary/5">
            <div class="mx-auto p-4 md:p-6 lg:p-8">
                <div class="flex items-center gap-3 mb-8">
                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-white">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 21H7m10 0h.803c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.427.218-.987.218-2.105V9.22c0-.45 0-.675-.048-.889a2 2 0 0 0-.209-.545c-.106-.19-.256-.355-.55-.682l-2.755-3.062c-.341-.378-.514-.57-.721-.708a2 2 0 0 0-.61-.271C15.863 3 15.6 3 15.075 3H6.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C3 4.52 3 5.08 3 6.2v11.6c0 1.12 0 1.68.218 2.107c.192.377.497.683.874.875c.427.218.987.218 2.105.218H7m10 0v-3.803c0-1.118 0-1.678-.218-2.105a2 2 0 0 0-.875-.874C15.48 14 14.92 14 13.8 14h-3.6c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C7 15.52 7 16.08 7 17.2V21m8-14H9" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-base-content to-base-content/60 bg-clip-text text-transparent">Teller Management</h1>
                        <p class="text-base-content/60">Kelola teller untuk operasional kiosk</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">
                    <div class="xl:col-span-2">
                        <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                            <div class="card-body p-5">
                                <div class="flex items-center gap-3 mb-5">
                                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="text-white">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.75V6m0 12v1.25m-7.25-7H6m12 0h1.25M5.636 5.636l.884.884m10.844-.884l-.884.884M5.636 18.364l.884-.884m10.844.884l-.884-.884M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5" />
                                        </svg>
                                    </div>
                                    <h2 class="card-title text-base font-bold" x-text="isEdit ? 'Edit Teller' : 'Tambah Teller'"></h2>
                                </div>
                                <div class="space-y-4">
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="loket-input">Loket</label>
                                        <input class="input rounded-xl w-full mt-1" x-model="xform.loket" type="text" placeholder="Masukkan loket" id="loket-input" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="keterangan-input">Keterangan</label>
                                        <textarea x-model="xform.keterangan" placeholder="Masukkan keterangan" class="textarea rounded-xl w-full mt-1" id="keterangan-input"></textarea>
                                    </div>
                                    <div class="flex justify-end gap-3 pt-2">
                                        <button @click="clearForm()" type="button" class="btn btn-warning rounded-xl btn-soft btn-sm gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 16H5V5h14zM17 8.4L13.4 12l3.6 3.6l-1.4 1.4l-3.6-3.6L8.4 17L7 15.6l3.6-3.6L7 8.4L8.4 7l3.6 3.6L15.6 7z" />
                                            </svg>
                                            Clear
                                        </button>
                                        <button type="button" @click="isEdit ? updateTeller() : storeTeller()" class="btn btn-primary rounded-xl btn-soft btn-sm gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21H7m10 0h.803c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.427.218-.987.218-2.105V9.22c0-.45 0-.675-.048-.889a2 2 0 0 0-.209-.545c-.106-.19-.256-.355-.55-.682l-2.755-3.062c-.341-.378-.514-.57-.721-.708a2 2 0 0 0-.61-.271C15.863 3 15.6 3 15.075 3H6.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C3 4.52 3 5.08 3 6.2v11.6c0 1.12 0 1.68.218 2.107c.192.377.497.683.874.875c.427.218.987.218 2.105.218H7m10 0v-3.803c0-1.118 0-1.678-.218-2.105a2 2 0 0 0-.875-.874C15.48 14 14.92 14 13.8 14h-3.6c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C7 15.52 7 16.08 7 17.2V21m8-14H9" />
                                            </svg>
                                            <span x-text="isEdit ? 'Update' : 'Submit'"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-3">
                        <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                            <div class="card-body p-5">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="text-white">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0-8 0a4 4 0 0 0 8 0m6 2v6m-3-3h6" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="card-title text-base font-bold">Daftar Teller</h2>
                                            <p class="text-xs text-base-content/60">Semua data teller kiosk</p>
                                        </div>
                                    </div>
                                    <div class="w-full sm:w-auto">
                                        <div class="input rounded-xl w-full sm:max-w-xs">
                                            <span class="icon-[tabler--search] size-4 text-base-content/60"></span>
                                            <input x-model="xsearch" type="text" class="grow" placeholder="Cari teller..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full rounded-xl border border-base-200 overflow-hidden">
                                    <div class="overflow-x-auto max-h-[500px]">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr class="bg-gradient-to-r from-primary/5 to-primary/10">
                                                    <th class="text-xs uppercase tracking-wider">No</th>
                                                    <th class="text-xs uppercase tracking-wider">Teller</th>
                                                    <th class="text-xs uppercase tracking-wider">Keterangan</th>
                                                    <th class="text-xs uppercase tracking-wider">Status</th>
                                                    <th class="text-end text-xs uppercase tracking-wider">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template x-if="isLoading">
                                                    <tr>
                                                        <td colspan="5" class="text-center">
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
                                                <template x-if="!isLoading && tellers.length === 0">
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="flex justify-center items-center min-h-[150px]">
                                                                <div class="flex flex-col items-center gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                                        <path fill="currentColor" d="M18.047 3.013A1 1 0 0 0 17 4.012V14a1 1 0 0 0 1 1h9.988a1 1 0 0 0 1-1.047C28.71 8.037 23.962 3.29 18.046 3.013M19 13V5.118A9.51 9.51 0 0 1 26.882 13zm-4-5.988a1 1 0 0 0-1.047-1C7.855 6.3 3 11.333 3 17.5C3 23.851 8.149 29 14.5 29c6.168 0 11.201-4.855 11.487-10.953A1 1 0 0 0 24.988 17H17.5a2.5 2.5 0 0 1-2.5-2.5zM5 17.5c0-4.736 3.466-8.663 8-9.382V14.5a4.5 4.5 0 0 0 4.5 4.5h6.382c-.719 4.534-4.646 8-9.382 8A9.5 9.5 0 0 1 5 17.5" />
                                                                    </svg>
                                                                    <h3 class="font-semibold text-base-content/60">Tidak ada teller</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template x-for="(teller, index) in tellers" :key="teller.id">
                                                    <tr class="hover:bg-base-200/50 transition-colors duration-150" :class="{'bg-base-200/30': index % 2 === 0}">
                                                        <td class="text-sm" x-text="index + 1"></td>
                                                        <td>
                                                            <strong class="text-sm" x-text="teller.loket"></strong>
                                                        </td>
                                                        <td class="text-sm" x-text="teller.keterangan"></td>
                                                        <td>
                                                            <span x-text="teller.is_active ? 'Active' : 'Inactive'"
                                                                :class="teller.is_active ? 'badge badge-soft badge-success rounded-lg' : 'badge badge-soft badge-error rounded-lg'"></span>
                                                        </td>
                                                        <td class="text-end">
                                                            <button x-on:click="editTeller(teller)" class="btn btn-soft rounded-lg btn-xs btn-primary gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 21h16M4 21l4.3-1.29c.377-.113.566-.17.74-.252a2 2 0 0 0 .426-.282c.147-.128.274-.285.527-.6L21 7.757a2.828 2.828 0 0 0-4-4L6.423 15.007c-.315.253-.472.38-.6.527a2 2 0 0 0-.282.426c-.082.174-.139.363-.252.74L3 21z" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                            <button x-on:click="deleteTeller(teller.id)" class="btn btn-soft rounded-lg btn-xs btn-error gap-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 6h18m-2 0v11.6c0 1.12 0 1.68-.218 2.108a2 2 0 0 1-.874.874C17.48 21 16.92 21 15.8 21H8.2c-1.12 0-1.68 0-2.108-.218a2 2 0 0 1-.874-.874C5 19.48 5 18.92 5 17.8V6m3 0V4.2c0-.56 0-.84.109-1.054a1 1 0 0 1 .437-.437C8.76 2.5 9.04 2.5 9.6 2.5h4.8c.56 0 .84 0 1.054.109a1 1 0 0 1 .437.437C16 3.36 16 3.64 16 4.2V6" />
                                                                </svg>
                                                                Delete
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
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            function Tellers() {
                return {
                    tellers: [],
                    xform: {
                        key: '',
                        loket: '',
                        keterangan: ''
                    },
                    isLoading: false,
                    isEdit: false,
                    xsearch: '',
                    searchTimeout: null,

                    async fetchTellers() {
                        this.isLoading = true;
                        try {
                            const response = await fetch(`/teller/loket?search=${this.xsearch}`, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            });
                            if (!response.ok) {
                                throw new Error('Gagal memuat data teller');
                            }
                            this.tellers = await response.json();
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    async storeTeller() {
                        this.isLoading = true;
                        try {
                            const response = await fetch('/teller/loket', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(this.xform)
                            });
                            if (!response.ok) {
                                throw new Error('Gagal menyimpan teller');
                            }
                            this.fetchTellers();
                            this.xform = {
                                key: '',
                                loket: '',
                                keterangan: ''
                            };
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    async updateTeller() {
                        this.isLoading = true;
                        try {
                            const response = await fetch(`/teller/loket/${this.xform.key}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(this.xform)
                            });
                            if (!response.ok) {
                                throw new Error('Gagal memperbarui teller');
                            }
                            this.fetchTellers();
                            this.xform = {
                                key: '',
                                loket: '',
                                keterangan: ''
                            };
                            this.isEdit = false;
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    deleteTeller(id) {
                        if (confirm('Yakin ingin menghapus teller ini?')) {
                            fetch(`/teller/loket/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Gagal menghapus teller');
                                }
                                this.fetchTellers();
                            })
                            .catch(error => {
                                alert(error.message);
                            });
                        }
                    },

                    editTeller(teller) {
                        this.xform = {
                            key: teller.id,
                            loket: teller.loket,
                            keterangan: teller.keterangan
                        };
                        this.isEdit = true;
                    },

                    clearForm() {
                        this.xform = {
                            key: '',
                            loket: '',
                            keterangan: ''
                        };
                        this.isEdit = false;
                    },

                    init() {
                        this.fetchTellers();
                        this.$watch('xsearch', () => {
                            if (this.searchTimeout) clearTimeout(this.searchTimeout);
                            this.searchTimeout = setTimeout(() => {
                                this.fetchTellers();
                            }, 500);
                        });
                    }
                }
            }
        </script>
    @endpush
</x-app-layouts>
