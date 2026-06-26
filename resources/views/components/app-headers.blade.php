<nav x-data="headerIndex" class="fixed top-0 left-0 right-0 z-50">
    {{-- Main Navbar --}}
    <nav
        class="navbar justify-between gap-4 h-16 px-4 sm:px-6 shadow-sm bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-700/50">
        {{-- Left: Hamburger (mobile) / Logo (desktop) --}}
        <div class="navbar-start items-center gap-3">
            <button @click="sidebarOpen = !sidebarOpen" type="button" class="btn btn-sm btn-outline btn-primary lg:hidden"
                aria-label="Toggle navigation menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
            </button>
            <a class="hidden lg:flex items-center gap-3 no-underline" href="{{ route('dashboard') }}">
                @if (!empty($appConfig->logo))
                    <img src="{{ asset('storage/' . $appConfig->logo) }}" alt="Logo Instansi"
                        class="h-9 w-auto object-contain shrink-0">
                @endif
                <div class="flex flex-col leading-tight min-w-0">
                    <span
                        class="text-base font-bold text-gray-900 dark:text-white truncate">{{ $appConfig->app_name ?? 'KIOS-K Antrian' }}</span>
                    <small
                        class="text-[11px] text-gray-500 dark:text-gray-400 truncate max-w-[140px]">{{ $appConfig->instansi_name ?? 'Instansi' }}</small>
                </div>
            </a>
        </div>

        {{-- Center: Nav Menu (desktop) / Logo (mobile) --}}
        <div class="navbar-center">
            {{-- Mobile: Logo --}}
            <a class="flex lg:hidden items-center gap-2 no-underline" href="{{ route('dashboard') }}">
                @if (!empty($appConfig->logo))
                    <img src="{{ asset('storage/' . $appConfig->logo) }}" alt="Logo Instansi"
                        class="h-9 w-auto object-contain shrink-0">
                @endif
                <div class="flex flex-col leading-tight min-w-0">
                    <span
                        class="text-sm sm:text-base font-bold text-gray-900 dark:text-white truncate max-w-[160px]">{{ $appConfig->app_name ?? 'KIOS-K Antrian' }}</span>
                </div>
            </a>

            {{-- Desktop: Nav Links --}}
            <nav class="hidden lg:flex items-center gap-0.5">
                <a href="{{ route('dashboard') }}"
                    class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150 {{ request()->routeIs('dashboard') ? 'text-primary bg-primary/5 dark:bg-primary/10' : '' }}">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z" />
                            <path d="M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21" />
                        </svg>
                        Home
                    </span>
                </a>
                <a href="{{ route('pemanggil') }}"
                    class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150 {{ request()->routeIs('pemanggil') ? 'text-primary bg-primary/5 dark:bg-primary/10' : '' }}">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Pemanggil
                    </span>
                </a>
                @if (auth()->user()->role == 'administrator')
                    <a href="/teller"
                        class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <line x1="8" y1="21" x2="16" y2="21" />
                                <line x1="12" y1="17" x2="12" y2="21" />
                            </svg>
                            Loket
                        </span>
                    </a>
                    <a href="{{ route('pengguna') }}"
                        class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150 {{ request()->routeIs('pengguna') ? 'text-primary bg-primary/5 dark:bg-primary/10' : '' }}">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Pengguna
                        </span>
                    </a>
                    <a href="{{ route('app-config') }}"
                        class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-150 {{ request()->routeIs('app-config') ? 'text-primary bg-primary/5 dark:bg-primary/10' : '' }}">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3" />
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                            </svg>
                            Pengaturan
                        </span>
                    </a>
                @endif
            </nav>
        </div>

        {{-- Right: Search + Avatar --}}
        <div class="navbar-end items-center gap-1 sm:gap-2">
            <button
                class="btn btn-circle btn-ghost btn-sm text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Search">
                <span class="icon-[tabler--search] size-5"></span>
            </button>

            {{-- Avatar Dropdown (FlyonUI) --}}
            <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                <button id="dropdown-scrollable" type="button"
                    class="dropdown-toggle flex items-center btn btn-circle btn-ghost btn-sm p-0 border-2 border-gray-200 dark:border-gray-600 hover:border-primary/50 transition-colors"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <div class="avatar">
                        <div class="w-8 h-8 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-56 p-2" role="menu"
                    aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                    <li class="dropdown-header gap-3 pb-2">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                            </div>
                        </div>
                        <div class="min-w-0">
                            <h6 class="text-sm font-semibold text-gray-900 dark:text-white truncate">John Doe</h6>
                            <small class="text-xs text-gray-500 dark:text-gray-400">Admin</small>
                        </div>
                    </li>
                    <li class="dropdown-footer border-t border-gray-100 dark:border-gray-700 pt-2 mt-1">
                        <a x-on:click="xLogoutAction()" class="btn btn-error btn-soft btn-block btn-sm"
                            href="javascript:void(0)">
                            <span class="icon-[tabler--logout] size-4"></span>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Sidebar Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm transition-opacity"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
    </div>

    {{-- Sidebar Panel (Left) --}}
    <div x-show="sidebarOpen" x-cloak
        class="fixed top-0 left-0 z-50 h-full w-72 bg-white dark:bg-gray-900 shadow-2xl flex flex-col transition-transform"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">

        {{-- Sidebar Header --}}
        <div
            class="flex items-center justify-between px-5 h-16 border-b border-gray-100 dark:border-gray-800 shrink-0">
            <span class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Menu</span>
            <button @click="sidebarOpen = false"
                class="btn btn-circle btn-ghost btn-sm text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        {{-- Sidebar Navigation --}}
        <nav class="flex-1 overflow-y-auto p-3 space-y-1">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}" @click="sidebarOpen = false"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary dark:hover:text-primary-400 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z" />
                    <path d="M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21" />
                </svg>
                <span>Home</span>
            </a>

            {{-- Loket Panggil --}}
            <a href="{{ route('pemanggil') }}" @click="sidebarOpen = false"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary dark:hover:text-primary-400 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                <span>Loket Panggil</span>
            </a>

            {{-- Divider --}}
            <div class="my-2 border-t border-gray-100 dark:border-gray-800"></div>

            {{-- Loket / Teller --}}
            <a href="/teller" @click="sidebarOpen = false"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary dark:hover:text-primary-400 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" />
                    <line x1="8" y1="21" x2="16" y2="21" />
                    <line x1="12" y1="17" x2="12" y2="21" />
                </svg>
                <span>Loket</span>
            </a>

            {{-- Pengguna --}}
            <a href="{{ route('pengguna') }}" @click="sidebarOpen = false"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary dark:hover:text-primary-400 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                <span>Pengguna</span>
            </a>

            {{-- Pengaturan --}}
            <a href="{{ route('app-config') }}" @click="sidebarOpen = false"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary dark:hover:text-primary-400 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
                <span>Pengaturan</span>
            </a>
        </nav>

        {{-- Sidebar Footer --}}
        <div class="p-3 border-t border-gray-100 dark:border-gray-800 shrink-0">
            <button @click="sidebarOpen = false; xLogoutAction()"
                class="flex items-center gap-3.5 w-full px-4 py-3 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                <span>Sign out</span>
            </button>
        </div>
    </div>
</nav>

@push('js')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script>
        function headerIndex() {
            return {
                sidebarOpen: false,
                xLogoutAction() {
                    const logout = confirm("Yakin ingin keluar?")
                    if (logout) {
                        fetch("/logout", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                    'Accept': 'application/json'
                                }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.metadata.status === 'success') {
                                    window.location.href = "/login"
                                }
                            })
                    }
                }
            }
        }
    </script>
@endpush
