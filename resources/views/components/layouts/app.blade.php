<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} · Jejak Dana</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Play CDN (Zero NPM) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669', // Emerald Jejak Dana
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        night: {
                            bg: '#0f172a',       // Slate 900
                            card: '#1e293b',     // Slate 800
                            border: '#334155',   // Slate 700
                            muted: '#64748b',    // Slate 500
                        }
                    }
                }
            }
        };
    </script>

    <!-- Alpine.js (Lightweight Reactivity Engine) -->
    <script defer src="https://unpkg.com/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        [x-cloak] { display: none !important; }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.4); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(148, 163, 184, 0.6); }
    </style>

    <!-- Anti-flicker theme init -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'system';
            const isDark = savedTheme === 'dark' || (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
</head>
<body 
    x-data="{
        sidebarOpen: true,
        mobileSidebarOpen: false,
        theme: localStorage.getItem('theme') || 'system',
        toggleTheme() {
            if (this.theme === 'light') {
                this.theme = 'dark';
            } else if (this.theme === 'dark') {
                this.theme = 'system';
            } else {
                this.theme = 'light';
            }
            localStorage.setItem('theme', this.theme);
            this.applyTheme();
        },
        applyTheme() {
            const isDark = this.theme === 'dark' || (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        },
        init() {
            this.applyTheme();
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (this.theme === 'system') this.applyTheme();
            });
            this.$nextTick(() => {
                if (window.lucide) lucide.createIcons();
            });
        }
    }"
    class="h-full bg-slate-50 dark:bg-night-bg text-slate-800 dark:text-slate-100 font-sans antialiased transition-colors duration-200"
>
    <div class="min-h-full flex">
        <!-- Backdrop Mobile -->
        <div 
            x-show="mobileSidebarOpen" 
            x-cloak
            @click="mobileSidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs lg:hidden"
        ></div>

        <!-- SIDEBAR DRAWER -->
        <aside 
            :class="[
                mobileSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0',
                sidebarOpen ? 'lg:w-64' : 'lg:w-20'
            ]"
            class="fixed inset-y-0 left-0 z-50 flex flex-col bg-white dark:bg-night-card border-r border-slate-200/80 dark:border-night-border transition-all duration-300 ease-in-out"
        >
            <!-- Logo Brand -->
            <div class="h-16 flex items-center px-5 border-b border-slate-200/70 dark:border-night-border justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-3 overflow-hidden">
                    <div class="h-10 w-10 shrink-0 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white shadow-md shadow-brand-500/20">
                        <i data-lucide="wallet-cards" class="w-5 h-5"></i>
                    </div>
                    <div x-show="sidebarOpen" x-transition.opacity class="flex flex-col whitespace-nowrap">
                        <span class="font-extrabold text-base tracking-tight text-slate-900 dark:text-white">Jejak Dana</span>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-brand-600 dark:text-brand-400">Finance Hub</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
                <!-- Group Title -->
                <div x-show="sidebarOpen" class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">
                    Menu Utama
                </div>

                <!-- Dashboard -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition group bg-brand-50 text-brand-700 dark:bg-brand-900/25 dark:text-brand-300">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0 text-brand-600 dark:text-brand-400"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard</span>
                </a>

                <!-- Transaksi -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition group">
                    <i data-lucide="arrow-left-right" class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-200"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Transaksi</span>
                </a>

                <!-- Dompet / Multi-Wallet -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition group">
                    <i data-lucide="wallet" class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-200"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Dompet & Bank</span>
                    <span x-show="sidebarOpen" class="ml-auto text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300">5</span>
                </a>

                <!-- Rekonsiliasi Saldo -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition group">
                    <i data-lucide="scale" class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-200"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Rekonsiliasi</span>
                </a>

                <!-- Laporan & Statistik -->
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition group">
                    <i data-lucide="pie-chart" class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-200"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Laporan Keuangan</span>
                </a>

                <!-- Divider -->
                <div class="pt-4 pb-1">
                    <div class="border-t border-slate-200 dark:border-night-border"></div>
                </div>

                <div x-show="sidebarOpen" class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-2">
                    Sistem
                </div>

                <!-- Pengaturan -->
                <a href="#" @click.prevent="document.getElementById('settingsModal').showModal()" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 hover:text-slate-900 dark:hover:text-white transition group">
                    <i data-lucide="settings" class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-200"></i>
                    <span x-show="sidebarOpen" class="whitespace-nowrap">Pengaturan</span>
                </a>
            </div>

            <!-- Footer Sidebar: Toggle Collapse (Desktop) -->
            <div class="p-3 border-t border-slate-200/70 dark:border-night-border hidden lg:block">
                <button 
                    @click="sidebarOpen = !sidebarOpen; $nextTick(() => lucide.createIcons())"
                    class="w-full flex items-center justify-center p-2 rounded-xl text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                    title="Toggle Sidebar"
                >
                    <i :data-lucide="sidebarOpen ? 'panel-left-close' : 'panel-left'" class="w-5 h-5"></i>
                </button>
            </div>
        </aside>

        <!-- MAIN CONTENT WRAPPER -->
        <div 
            :class="sidebarOpen ? 'lg:pl-64' : 'lg:pl-20'"
            class="flex-1 flex flex-col min-w-0 transition-all duration-300 ease-in-out"
        >
            <!-- TOPBAR HEADER -->
            <header class="sticky top-0 z-30 h-16 bg-white/80 dark:bg-night-card/80 backdrop-blur-md border-b border-slate-200/80 dark:border-night-border px-4 lg:px-8 flex items-center justify-between">
                <!-- Left: Hamburger Mobile & Title -->
                <div class="flex items-center gap-3">
                    <button 
                        @click="mobileSidebarOpen = true" 
                        class="p-2 rounded-xl text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 lg:hidden"
                    >
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-slate-900 dark:text-white leading-tight">
                            {{ $title ?? 'Ringkasan Keuangan' }}
                        </h1>
                        <p class="text-xs text-slate-500 dark:text-slate-400 hidden sm:block">
                            {{ $subtitle ?? 'Pantau arus kas, saldo wallet, dan rekonsiliasi harian.' }}
                        </p>
                    </div>
                </div>

                <!-- Right: Actions & Theme Toggle & Profile -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Theme Switcher Button -->
                    <button 
                        @click="toggleTheme(); $nextTick(() => lucide.createIcons())" 
                        class="relative p-2.5 rounded-xl border border-slate-200/80 dark:border-night-border text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                        title="Ubah Tema (Light / Dark / System)"
                    >
                        <i x-show="theme === 'light'" data-lucide="sun" class="w-4 h-4 text-amber-500"></i>
                        <i x-show="theme === 'dark'" data-lucide="moon" class="w-4 h-4 text-indigo-400"></i>
                        <i x-show="theme === 'system'" data-lucide="sun-moon" class="w-4 h-4 text-slate-400"></i>
                    </button>

                    <!-- Notifikasi -->
                    <button class="relative p-2.5 rounded-xl border border-slate-200/80 dark:border-night-border text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <i data-lucide="bell" class="w-4 h-4"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-brand-500 ring-2 ring-white dark:ring-night-card"></span>
                    </button>

                    <!-- User Profile Dropdown Pill -->
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-200 dark:border-night-border">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-600 to-emerald-400 text-white font-bold flex items-center justify-center text-sm shadow-sm">
                            JD
                        </div>
                        <div class="hidden md:flex flex-col text-left">
                            <span class="text-xs font-semibold text-slate-800 dark:text-slate-200">Samsul Pheee</span>
                            <span class="text-[10px] text-slate-500 dark:text-slate-400">Personal Plan</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- MAIN BODY SLOT -->
            <main class="flex-1 p-4 lg:p-8 max-w-7xl w-full mx-auto">
                {{ $slot }}
            </main>

            <!-- FOOTER -->
            <footer class="py-4 px-6 border-t border-slate-200/60 dark:border-night-border text-center text-xs text-slate-500 dark:text-slate-400">
                &copy; {{ date('Y') }} Jejak Dana · Smart Personal Finance & Multi-Wallet Tracker
            </footer>
        </div>
    </div>

    <!-- NATIVE HTML5 MODAL: SETTINGS & TEMA -->
    <dialog id="settingsModal" class="backdrop:bg-slate-900/60 backdrop:backdrop-blur-xs p-0 rounded-3xl shadow-2xl bg-white dark:bg-night-card border border-slate-200 dark:border-night-border max-w-md w-full m-auto">
        <div class="p-6">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-night-border">
                <div class="flex items-center gap-2.5">
                    <div class="p-2 rounded-xl bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400">
                        <i data-lucide="sliders" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Pengaturan Tampilan</h3>
                </div>
                <form method="dialog">
                    <button class="p-1.5 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>

            <div class="py-5 space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Mode Warna Tema</label>
                    <div class="grid grid-cols-3 gap-2">
                        <button 
                            type="button" 
                            @click="theme = 'light'; localStorage.setItem('theme', 'light'); applyTheme()"
                            :class="theme === 'light' ? 'border-brand-500 ring-2 ring-brand-500/20 bg-brand-50/50 dark:bg-brand-900/20' : 'border-slate-200 dark:border-night-border'"
                            class="p-3 rounded-2xl border flex flex-col items-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition text-center"
                        >
                            <i data-lucide="sun" class="w-5 h-5 text-amber-500"></i>
                            <span class="text-xs font-semibold">Light</span>
                        </button>

                        <button 
                            type="button" 
                            @click="theme = 'dark'; localStorage.setItem('theme', 'dark'); applyTheme()"
                            :class="theme === 'dark' ? 'border-brand-500 ring-2 ring-brand-500/20 bg-brand-50/50 dark:bg-brand-900/20' : 'border-slate-200 dark:border-night-border'"
                            class="p-3 rounded-2xl border flex flex-col items-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition text-center"
                        >
                            <i data-lucide="moon" class="w-5 h-5 text-indigo-400"></i>
                            <span class="text-xs font-semibold">Night</span>
                        </button>

                        <button 
                            type="button" 
                            @click="theme = 'system'; localStorage.setItem('theme', 'system'); applyTheme()"
                            :class="theme === 'system' ? 'border-brand-500 ring-2 ring-brand-500/20 bg-brand-50/50 dark:bg-brand-900/20' : 'border-slate-200 dark:border-night-border'"
                            class="p-3 rounded-2xl border flex flex-col items-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition text-center"
                        >
                            <i data-lucide="laptop" class="w-5 h-5 text-slate-400"></i>
                            <span class="text-xs font-semibold">Sistem</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-200 dark:border-night-border flex justify-end">
                <form method="dialog">
                    <button class="px-5 py-2 rounded-xl text-sm font-semibold bg-brand-600 hover:bg-brand-700 text-white shadow-sm transition">
                        Selesai
                    </button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>
