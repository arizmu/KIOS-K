<x-app-layouts>
    <x-app-headers />
    <div x-data="Users" class="base-holiday">
        <div class="min-h-screen bg-gradient-to-br from-base-100 via-base-50 to-primary/5">
            <div class="mx-auto p-4 md:p-6 lg:p-8">
                <div class="flex items-center gap-3 mb-8">
                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-white">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.75V6m0 12v1.25m-7.25-7H6m12 0h1.25M5.636 5.636l.884.884m10.844-.884l-.884.884M5.636 18.364l.884-.884m10.844.884l-.884-.884M12 8.75a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-base-content to-base-content/60 bg-clip-text text-transparent">Manajemen Pengguna</h1>
                        <p class="text-base-content/60">Kelola pengguna dan hak akses mereka</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">
                    <div class="xl:col-span-2">
                        <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-primary/20">
                            <div class="card-body p-5">
                                <div class="flex items-center gap-3 mb-5">
                                    <div class="p-2 bg-gradient-to-br from-primary to-primary/70 rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="text-white">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0-8 0a4 4 0 0 0 8 0m6 2v6m-3-3h6" />
                                        </svg>
                                    </div>
                                    <h2 class="card-title text-base font-bold" x-text="isEdit ? 'Edit Pengguna' : 'Tambah Pengguna'"></h2>
                                </div>
                                <form @submit.prevent="isEdit ? updateUser() : storeUser()" class="space-y-4">
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="user-name">Nama Lengkap</label>
                                        <input type="text" placeholder="John Doe" class="input rounded-xl w-full mt-1" x-model="xform.name" id="user-name" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="user-username">Username</label>
                                        <input type="text" placeholder="johndoe" class="input rounded-xl w-full mt-1" x-model="xform.username" id="user-username" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="user-email">Email</label>
                                        <input type="email" placeholder="john.doe@example.com" class="input rounded-xl w-full mt-1" x-model="xform.email" id="user-email" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="user-password">
                                            <span x-text="isEdit ? 'Password (kosongkan jika tidak diubah)' : 'Password'"></span>
                                        </label>
                                        <input type="password" placeholder="Masukkan password" class="input rounded-xl w-full mt-1" x-model="xform.password" id="user-password" />
                                    </div>
                                    <div class="w-full">
                                        <label class="label-text font-medium" for="user-role">Role</label>
                                        <select x-model="xform.role" class="select select-bordered rounded-xl w-full mt-1" id="user-role">
                                            <option value="">Pilih Role</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="teller">Teller</option>
                                        </select>
                                    </div>
                                    <div class="flex justify-end gap-3 pt-2">
                                        <button type="button" @click="clearForm()" class="btn btn-warning rounded-xl btn-soft btn-sm gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-width="2" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10ZM5 5l14 14" />
                                            </svg>
                                            Clear
                                        </button>
                                        <button type="submit" class="btn btn-primary rounded-xl btn-soft btn-sm gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a4 4 0 0 0 4-4V7.414a1 1 0 0 0-.293-.707l-3.414-3.414A1 1 0 0 0 16.586 3H7a4 4 0 0 0-4 4v10a4 4 0 0 0 4 4" />
                                                    <path d="M9 3h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm8 18v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                                                    <path stroke-linecap="round" d="M11 17h2" />
                                                </g>
                                            </svg>
                                            <span x-text="isEdit ? 'Update' : 'Submit'"></span>
                                        </button>
                                    </div>
                                </form>
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
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 21H7m10 0h.803c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.427.218-.987.218-2.105V9.22c0-.45 0-.675-.048-.889a2 2 0 0 0-.209-.545c-.106-.19-.256-.355-.55-.682l-2.755-3.062c-.341-.378-.514-.57-.721-.708a2 2 0 0 0-.61-.271C15.863 3 15.6 3 15.075 3H6.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C3 4.52 3 5.08 3 6.2v11.6c0 1.12 0 1.68.218 2.107c.192.377.497.683.874.875c.427.218.987.218 2.105.218H7m10 0v-3.803c0-1.118 0-1.678-.218-2.105a2 2 0 0 0-.875-.874C15.48 14 14.92 14 13.8 14h-3.6c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C7 15.52 7 16.08 7 17.2V21m8-14H9" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="card-title text-base font-bold">Daftar Pengguna</h2>
                                            <p class="text-xs text-base-content/60">Semua data pengguna sistem</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                                        <div class="input rounded-xl w-full sm:max-w-xs">
                                            <span class="icon-[tabler--search] size-4 text-base-content/60"></span>
                                            <input type="text" x-model="xsearch" class="grow" placeholder="Cari pengguna..." id="search-user" />
                                        </div>
                                        <select x-model="xroleFilter" x-on:change="fetchUsers()" class="select select-bordered rounded-xl w-full sm:w-44">
                                            <option value="">Semua Role</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="teller">Teller</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="w-full rounded-xl border border-base-200 overflow-hidden">
                                    <div class="overflow-x-auto max-h-[500px]">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr class="bg-gradient-to-r from-primary/5 to-primary/10">
                                                    <th class="text-xs uppercase tracking-wider">No</th>
                                                    <th class="text-xs uppercase tracking-wider">Pengguna</th>
                                                    <th class="text-xs uppercase tracking-wider">Email</th>
                                                    <th class="text-xs uppercase tracking-wider">Role</th>
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
                                                <template x-if="!isLoading && users.length === 0">
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="flex justify-center items-center min-h-[150px]">
                                                                <div class="flex flex-col items-center gap-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0-8 0a4 4 0 0 0 8 0" />
                                                                    </svg>
                                                                    <h3 class="font-semibold text-base-content/60">Tidak ada pengguna</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <template x-for="(user, index) in users" :key="user.id">
                                                    <tr class="hover:bg-base-200/50 transition-colors duration-150" :class="{'bg-base-200/30': index % 2 === 0}">
                                                        <td class="text-sm" x-text="index + 1"></td>
                                                        <td>
                                                            <div class="flex items-start gap-3">
                                                                
                                                                <div>
                                                                    <div class="text-sm font-semibold" x-text="user.name"></div>
                                                                    <span class="badge badge-sm badge-info" x-text="user.username"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-sm" x-text="user.email"></td>
                                                        <td>
                                                            <span x-text="getRoleLabel(user.role)" :class="getRoleBadgeClass(user.role)"></span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="flex items-center justify-end gap-1">
                                                                <button type="button" @click="editUser(user)" class="btn btn-soft rounded-lg btn-xs btn-primary gap-1" aria-label="Edit">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                                <button type="button" @click="deleteUser(user.id)" class="btn btn-soft rounded-lg btn-xs btn-error gap-1" aria-label="Delete">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 11v6m-4-6v6M6 7v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7M4 7h16M7 7l2-4h6l2 4" />
                                                                    </svg>
                                                                    Delete
                                                                </button>
                                                            </div>
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
            function Users() {
                return {
                    users: [],
                    xform: {
                        key: '',
                        name: '',
                        email: '',
                        password: '',
                        role: '',
                        username: ''
                    },
                    isLoading: false,
                    isEdit: false,
                    xsearch: '',
                    xroleFilter: '',
                    searchTimeout: null,

                    async fetchUsers() {
                        this.isLoading = true;
                        try {
                            const params = new URLSearchParams();
                            if (this.xsearch) params.append('search', this.xsearch);
                            if (this.xroleFilter) params.append('role', this.xroleFilter);

                            const response = await fetch(`/pengguna/users?${params.toString()}`, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            });
                            if (!response.ok) {
                                throw new Error('Gagal memuat data pengguna');
                            }
                            this.users = await response.json();
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    async storeUser() {
                        if (!this.xform.name || !this.xform.email || !this.xform.password || !this.xform.role) {
                            alert('Harap isi semua field yang wajib diisi');
                            return;
                        }

                        this.isLoading = true;
                        try {
                            const response = await fetch('/pengguna/user-store', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify({
                                    username:this.xform.username,
                                    name: this.xform.name,
                                    email: this.xform.email,
                                    password: this.xform.password,
                                    role: this.xform.role
                                })
                            });
                            if (!response.ok) {
                                const error = await response.json();
                                throw new Error(error.message || 'Gagal membuat pengguna');
                            }
                            this.fetchUsers();
                            this.clearForm();
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    async updateUser() {
                        if (!this.xform.name || !this.xform.email || !this.xform.role) {
                            alert('Harap isi semua field yang wajib diisi');
                            return;
                        }

                        this.isLoading = true;
                        try {
                            const data = {
                                name: this.xform.name,
                                email: this.xform.email,
                                role: this.xform.role
                            };
                            if (this.xform.password) {
                                data.password = this.xform.password;
                            }

                            const response = await fetch(`/pengguna/users/${this.xform.key}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify(data)
                            });
                            if (!response.ok) {
                                const error = await response.json();
                                throw new Error(error.message || 'Gagal memperbarui pengguna');
                            }
                            this.fetchUsers();
                            this.clearForm();
                            this.isEdit = false;
                        } catch (error) {
                            alert(error.message);
                        } finally {
                            this.isLoading = false;
                        }
                    },

                    deleteUser(id) {
                        if (confirm('Yakin ingin menghapus pengguna ini? Tindakan ini tidak bisa dibatalkan.')) {
                            fetch(`/pengguna/users/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Gagal menghapus pengguna');
                                    }
                                    this.fetchUsers();
                                })
                                .catch(error => {
                                    alert(error.message);
                                });
                        }
                    },

                    editUser(user) {
                        this.xform = {
                            key: user.id,
                            name: user.name,
                            email: user.email,
                            password: '',
                            role: user.role
                        };
                        this.isEdit = true;
                    },

                    clearForm() {
                        this.xform = {
                            key: '',
                            name: '',
                            email: '',
                            password: '',
                            role: ''
                        };
                        this.isEdit = false;
                    },

                    getInitials(name) {
                        if (!name) return '';
                        return name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
                    },

                    getRoleLabel(role) {
                        const labels = {
                            'administrator': 'Administrator',
                            'teller': 'Teller',
                        };
                        return labels[role] || role;
                    },

                    getRoleBadgeClass(role) {
                        const classes = {
                            'administrator': 'badge badge-soft badge-primary rounded-lg px-3',
                            'teller': 'badge badge-soft badge-info rounded-lg px-3'
                        };
                        return classes[role] || 'badge badge-soft badge-neutral rounded-lg px-3';
                    },

                    init() {
                        this.fetchUsers();
                        this.$watch('xsearch', () => {
                            if (this.searchTimeout) clearTimeout(this.searchTimeout);
                            this.searchTimeout = setTimeout(() => {
                                this.fetchUsers();
                            }, 500);
                        });
                    }
                }
            }
        </script>
    @endpush
</x-app-layouts>
