<!DOCTYPE html>
<html lang="en" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SKP App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: { primary: '#6366F1', dark: '#0F172A', card: '#1E293B' }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="bg-slate-50 dark:bg-dark text-slate-900 dark:text-gray-200 min-h-screen flex flex-col lg:flex-row transition-colors duration-300">

    <!-- MODAL TAMBAH SKP -->
    <div id="modal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div onclick="closeModal()" class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition duration-300" id="modalOverlay"></div>
        <div id="modalBox" class="relative bg-white dark:bg-card w-full max-w-md mx-4 p-6 rounded-2xl shadow-2xl transform scale-95 opacity-0 transition duration-300 border border-black/5 dark:border-white/5">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Tambah SKP</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 text-xl transition">✕</button>
            </div>
            <div class="space-y-4">
                <input type="text" placeholder="Judul kegiatan" class="w-full p-3 rounded-xl bg-slate-100 dark:bg-dark border border-slate-200 dark:border-gray-700 focus:ring-2 focus:ring-primary outline-none dark:text-white">
                <input type="number" placeholder="Poin" class="w-full p-3 rounded-xl bg-slate-100 dark:bg-dark border border-slate-200 dark:border-gray-700 focus:ring-2 focus:ring-primary outline-none dark:text-white">
                <input type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary">
                <button onclick="submitSKP()" class="w-full bg-primary text-white py-3 rounded-xl font-medium hover:scale-105 transition shadow-lg shadow-primary/30">Simpan</button>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed top-5 right-5 bg-emerald-500 px-5 py-3 rounded-xl shadow-lg text-white hidden opacity-0 transition-all duration-300 z-[60] flex items-center gap-3 border border-emerald-400/50">
        <span id="toastMessage" class="font-medium"></span>
    </div>

    <!-- SIDEBAR DESKTOP -->
    <aside class="hidden lg:flex flex-col w-64 h-screen sticky top-0 bg-white dark:bg-card border-r border-slate-200 dark:border-gray-700 p-6 shrink-0 transition-colors duration-300">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo_instiki.png') }}" alt="Logo Instiki" class="w-8 h-8 object-cover rounded-lg shadow-lg">
                <h1 class="text-xl font-bold tracking-wide">Instiki Point</h1>
            </div>

            <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-slate-100 dark:bg-dark text-slate-500 dark:text-yellow-400 hover:scale-110 transition active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path class="icon-sun hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    <path class="icon-moon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>

        <nav class="space-y-2 text-sm flex-1">
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('dashboard') ? 'bg-primary/10 text-primary font-medium border border-primary/20' : 'text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 transition' }}">Dashboard</a>
            <a href="/skp" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('skp') ? 'bg-primary/10 text-primary font-medium border border-primary/20' : 'text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 transition' }}">SKP Saya</a>
            <a href="/event" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('event') ? 'bg-primary/10 text-primary font-medium border border-primary/20' : 'text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 transition' }}">Katalog Event</a>
            <a href="/leaderboard" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('leaderboard') ? 'bg-primary/10 text-primary font-medium border border-primary/20' : 'text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 transition' }}">Peringkat</a>
            <a href="/panduan" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('panduan') ? 'bg-primary/10 text-primary font-medium border border-primary/20' : 'text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 transition' }}">Panduan SKP</a>
        </nav>

        <div class="mt-auto pt-6 border-t border-slate-200 dark:border-gray-700/50">
            <div class="flex items-center gap-3 p-2">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-primary to-purple-500 text-white flex items-center justify-center font-bold">AN</div>
                <div class="overflow-hidden">
                    <p class="font-medium text-slate-900 dark:text-white truncate text-sm">Mulyono</p>
                    <p class="text-[10px] text-slate-500 dark:text-gray-400 truncate uppercase">Mahasiswa IT</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- HEADER MOBILE -->
    <div class="lg:hidden sticky top-0 z-40 bg-white/80 dark:bg-card/80 backdrop-blur-md border-b border-slate-200 dark:border-gray-700 px-5 py-3 flex justify-between items-center transition-colors duration-300">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo_instiki.png') }}" alt="Logo" class="w-8 h-8 object-cover rounded-lg shadow-sm">
            <h1 class="text-lg font-bold text-slate-900 dark:text-white tracking-wide">Instiki Point</h1>
        </div>
        <button onclick="toggleDarkMode()" class="p-2.5 rounded-xl bg-slate-100 dark:bg-dark border border-slate-200 dark:border-white/5 text-slate-500 dark:text-yellow-400 hover:scale-110 transition active:scale-95 shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path class="icon-sun hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                <path class="icon-moon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <!-- AREA KONTEN UTAMA -->
    <main class="flex-1 pb-24 lg:pb-0 min-w-0">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-8">
            @yield('content')
        </div>
    </main>

    <!-- BOTTOM NAVIGATION -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white dark:bg-card border-t border-slate-200 dark:border-gray-700 z-40">
        <div class="flex justify-between items-center px-4 py-2 pb-safe text-[10px] font-semibold">

            <a href="/dashboard" class="flex flex-col items-center gap-1 p-2 transition-all duration-500 relative {{ request()->is('dashboard') ? 'text-primary -translate-y-3' : 'text-slate-400 dark:text-gray-500 hover:text-slate-900 dark:hover:text-gray-300' }}">
                <div class="transition-all duration-500 {{ request()->is('dashboard') ? 'bg-primary text-white p-3 rounded-full shadow-lg shadow-primary/40 scale-110' : 'p-1.5' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <span class="{{ request()->is('dashboard') ? 'font-bold' : '' }}">Home</span>
            </a>

            <a href="/skp" class="flex flex-col items-center gap-1 p-2 transition-all duration-500 relative {{ request()->is('skp') ? 'text-primary -translate-y-3' : 'text-slate-400 dark:text-gray-500 hover:text-slate-900 dark:hover:text-gray-300' }}">
                <div class="transition-all duration-500 {{ request()->is('skp') ? 'bg-primary text-white p-3 rounded-full shadow-lg shadow-primary/40 scale-110' : 'p-1.5' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <span class="{{ request()->is('skp') ? 'font-bold' : '' }}">SKP</span>
            </a>

            <a href="/event" class="flex flex-col items-center gap-1 p-2 transition-all duration-500 relative {{ request()->is('event') ? 'text-primary -translate-y-3' : 'text-slate-400 dark:text-gray-500 hover:text-slate-900 dark:hover:text-gray-300' }}">
                <div class="transition-all duration-500 {{ request()->is('event') ? 'bg-primary text-white p-3 rounded-full shadow-lg shadow-primary/40 scale-110' : 'p-1.5' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <span class="{{ request()->is('event') ? 'font-bold' : '' }}">Event</span>
            </a>

            <a href="/leaderboard" class="flex flex-col items-center gap-1 p-2 transition-all duration-500 relative {{ request()->is('leaderboard') ? 'text-primary -translate-y-3' : 'text-slate-400 dark:text-gray-500 hover:text-slate-900 dark:hover:text-gray-300' }}">
                <div class="transition-all duration-500 {{ request()->is('leaderboard') ? 'bg-primary text-white p-3 rounded-full shadow-lg shadow-primary/40 scale-110' : 'p-1.5' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 20h20"/>
                        <path d="M5 20v-5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v5"/>
                        <path d="M11 20v-9a2 2 0 0 1 2-2h2a2 2 0 0 1 2-2v9"/>
                        <path d="M17 20v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2-2v4"/>
                    </svg>
                </div>
                <span class="{{ request()->is('leaderboard') ? 'font-bold' : '' }}">Rank</span>
            </a>

            <a href="/panduan" class="flex flex-col items-center gap-1 p-2 transition-all duration-500 relative {{ request()->is('panduan') ? 'text-primary -translate-y-3' : 'text-slate-400 dark:text-gray-500 hover:text-slate-900 dark:hover:text-gray-300' }}">
                <div class="transition-all duration-500 {{ request()->is('panduan') ? 'bg-primary text-white p-3 rounded-full shadow-lg shadow-primary/40 scale-110' : 'p-1.5' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 16v-4"/>
                        <path d="M12 8h.01"/>
                    </svg>
                </div>
                <span class="{{ request()->is('panduan') ? 'font-bold' : '' }}">Info</span>
            </a>

        </div>
    </div>

    <style>
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>

    <script>
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');

            const sunIcons = document.querySelectorAll('.icon-sun');
            const moonIcons = document.querySelectorAll('.icon-moon');

            if (isDark) {
                sunIcons.forEach(icon => icon.classList.add('hidden'));
                moonIcons.forEach(icon => icon.classList.remove('hidden'));
                localStorage.setItem('theme', 'dark');
            } else {
                sunIcons.forEach(icon => icon.classList.remove('hidden'));
                moonIcons.forEach(icon => icon.classList.add('hidden'));
                localStorage.setItem('theme', 'light');
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const sunIcons = document.querySelectorAll('.icon-sun');
            const moonIcons = document.querySelectorAll('.icon-moon');

            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
                sunIcons.forEach(icon => icon.classList.remove('hidden'));
                moonIcons.forEach(icon => icon.classList.add('hidden'));
            } else {
                document.documentElement.classList.add('dark');
                sunIcons.forEach(icon => icon.classList.add('hidden'));
                moonIcons.forEach(icon => icon.classList.remove('hidden'));
            }
        });

        // MODAL & TOAST LOGIC
        function openModal() {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('modalOverlay');
            const box = document.getElementById('modalBox');
            modal.classList.remove('hidden'); modal.classList.add('flex');
            setTimeout(() => { overlay.classList.remove('opacity-0'); box.classList.remove('opacity-0', 'scale-95'); }, 10);
        }
        function closeModal() {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('modalOverlay');
            const box = document.getElementById('modalBox');
            overlay.classList.add('opacity-0'); box.classList.add('opacity-0', 'scale-95');
            setTimeout(() => { modal.classList.add('hidden'); modal.classList.remove('flex'); }, 300);
        }
        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toastMessage').innerText = message;
            toast.classList.remove('hidden');
            setTimeout(() => { toast.classList.remove('opacity-0'); }, 10);
            setTimeout(() => { toast.classList.add('opacity-0'); setTimeout(() => toast.classList.add('hidden'), 300); }, 3000);
        }
        function submitSKP() { closeModal(); showToast("Berhasil! SKP sedang ditinjau."); }
    </script>
    @stack('scripts')
</body>
</html>