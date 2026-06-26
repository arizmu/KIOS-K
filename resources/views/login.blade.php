<x-app-layouts>
    <div x-data="loginIndex" class="w-full min-h-screen flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-br from-violet-600 to-indigo-700 p-8 text-center">
                    <h2 class="text-4xl font-bold text-white mb-2">Welcome Back</h2>
                    <p class="text-violet-100 text-lg">Sign in to your account</p>
                </div>

                <div class="p-8">
                    <form @submit.prevent="xLoginAction" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <input x-model="xform.username" type="text" required
                                    placeholder="Enter your email / username"
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input x-model="xform.password" required type="password"
                                    placeholder="Enter your password"
                                    class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input x-model="xform._remember_me" type="checkbox"
                                    class="w-4 h-4 text-violet-600 border-2 border-gray-300 rounded focus:ring-violet-500" />
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                            </label>
                        </div>

                        <button type="submit" x-bind:disabled="loading"
                            class="w-full py-3 px-4 bg-gradient-to-r from-violet-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-violet-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                            <span x-text="loading ? 'Loading...' : 'Sign In'">Sign In</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function loginIndex() {
                return {
                    loading: false,
                    xform: {
                        'username': '',
                        'password': '',
                        '_remember_me': false
                    },

                    async xLoginAction(index) {
                        this.loading = true;
                        try {
                            const loginUrl = '/login-action';
                            const response = await this.$httpPost(loginUrl, this.xform);
                            const data = response;
                            if (data.status === 'success') {
                                setTimeout(() => {
                                    window.location.href = '/dashboard';
                                }, 3000);
                            } else {
                                this.loading = false;
                                alert('Gagal Login');
                            }
                        } catch (error) {
                            this.loading = false;
                            alert(`Terjadi kesalahan: ${error.message}`);
                        }
                    },
                    init() {
                        console.log(this.$getCsrfToken());
                    }
                }
            }
        </script>
    @endpush
</x-app-layouts>
