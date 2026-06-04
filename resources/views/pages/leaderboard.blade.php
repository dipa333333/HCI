@extends('layout.app')

@section('title', 'Papan Peringkat SKP')

@section('content')
<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white transition-colors duration-300">Papan Peringkat</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-1 transition-colors duration-300">Pantau posisi peringkatmu dan top 50 mahasiswa lainnya di kampus.</p>
    </div>
</div>

<!-- FILTERS -->
<div class="flex flex-col lg:flex-row gap-4 mb-8">
    <div class="flex-1 grid grid-cols-2 gap-3">
        <select class="bg-white dark:bg-card border border-slate-200 dark:border-white/5 text-slate-700 dark:text-gray-300 text-sm rounded-2xl px-4 py-3 outline-none focus:border-primary transition-colors cursor-pointer appearance-none">
            <option>Semua Program Studi</option>
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
            <option>Desain Komunikasi Visual</option>
        </select>
        <select class="bg-white dark:bg-card border border-slate-200 dark:border-white/5 text-slate-700 dark:text-gray-300 text-sm rounded-2xl px-4 py-3 outline-none focus:border-primary transition-colors cursor-pointer appearance-none">
            <option>Semua Angkatan</option>
            <option>Angkatan 2023</option>
            <option>Angkatan 2024</option>
            <option>Angkatan 2025</option>
        </select>
    </div>
</div>

<!-- MY RANK HIGHLIGHT -->
<div class="bg-indigo-50 dark:bg-primary/20 border border-indigo-100 dark:border-primary/30 rounded-3xl p-5 mb-10 flex flex-col md:flex-row justify-between items-center gap-4 relative overflow-hidden group transition-colors duration-300">
    <div class="absolute -left-10 -top-10 w-32 h-32 bg-primary/10 dark:bg-primary/20 blur-3xl rounded-full transition-colors"></div>

    <div class="flex items-center gap-5 relative z-10">
        <div class="text-2xl font-black text-primary italic">#1</div>
        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-purple-500 flex items-center justify-center font-bold text-white shadow-lg shadow-primary/30">
            AN
        </div>
        <div>
            <h3 class="font-bold text-slate-900 dark:text-white leading-tight transition-colors">Mulyono (Kamu)</h3>
            <p class="text-[10px] text-primary dark:text-gray-400 uppercase tracking-widest mt-0.5 transition-colors">Teknik Informatika</p>
        </div>
    </div>

    <div class="flex items-center gap-8 relative z-10">
        <div class="text-center">
            <p class="text-[10px] text-slate-500 dark:text-gray-400 uppercase transition-colors">Total Poin</p>
            <p class="text-xl font-black text-slate-900 dark:text-white transition-colors">180</p>
        </div>
        <div class="h-10 w-px bg-indigo-200 dark:bg-primary/20 transition-colors"></div>
        <div class="text-center">
            <p class="text-[10px] text-slate-500 dark:text-gray-400 uppercase transition-colors">Aktivitas</p>
            <p class="text-xl font-black text-slate-900 dark:text-white transition-colors">12</p>
        </div>
    </div>
</div>

<!-- TOP 3 PODIUM -->
<div class="grid grid-cols-3 gap-2 md:gap-6 mb-12 items-end">
    <!-- Rank 2 -->
    <div class="bg-white dark:bg-card/40 border border-slate-200 dark:border-white/5 p-2 md:p-6 rounded-2xl md:rounded-3xl text-center order-1 relative group hover:-translate-y-2 transition-all duration-500 shadow-sm dark:shadow-none flex flex-col justify-end">
        <div class="absolute top-2 left-2 md:top-4 md:left-4 text-slate-400 dark:text-gray-500 font-black text-xs md:text-xl italic">2</div>
        <div class="w-10 h-10 md:w-16 md:h-16 bg-slate-50 dark:bg-gray-500/20 rounded-full mx-auto mb-2 md:mb-4 flex items-center justify-center border-2 border-slate-200 dark:border-gray-400/50 shadow-sm md:shadow-lg transition-colors mt-4 md:mt-0">
            <span class="text-base md:text-2xl">🥈</span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-white text-[9px] md:text-base truncate transition-colors">Budi Santoso</h3>
        <p class="text-[7px] md:text-xs text-slate-500 dark:text-gray-500 mt-0.5 md:mt-1 truncate transition-colors">Sistem Informasi</p>
        <p class="text-primary font-bold mt-2 md:mt-3 text-xs md:text-xl">145 <span class="text-[7px] md:text-xs font-normal text-slate-400 dark:text-gray-500 transition-colors">pts</span></p>
    </div>

    <!-- Rank 1 (Mulyono) -->
    <div class="bg-white dark:bg-primary/10 border-2 border-primary/20 dark:border-primary/40 p-3 md:p-10 rounded-2xl md:rounded-[40px] text-center order-2 scale-110 md:scale-105 shadow-xl dark:shadow-2xl shadow-primary/10 dark:shadow-primary/20 relative group hover:-translate-y-3 transition-all duration-500 z-10 flex flex-col justify-end">
        <div class="absolute -top-3 md:-top-6 left-1/2 -translate-x-1/2 bg-primary text-white text-[6px] md:text-[10px] font-black px-2 md:px-4 py-1 md:py-1.5 rounded-full shadow-lg tracking-widest">1ST</div>
        <div class="w-12 h-12 md:w-24 md:h-24 bg-yellow-50 dark:bg-yellow-500/20 rounded-full mx-auto mb-2 md:mb-4 flex items-center justify-center border-2 md:border-4 border-yellow-400 dark:border-yellow-500 shadow-[0_0_15px_rgba(234,179,8,0.2)] dark:shadow-[0_0_20px_rgba(234,179,8,0.3)] animate-pulse transition-colors mt-3 md:mt-0">
            <span class="text-xl md:text-4xl">👑</span>
        </div>
        <h3 class="font-black text-[11px] md:text-2xl text-slate-900 dark:text-white truncate transition-colors">Mulyono</h3>
        <p class="text-[7px] md:text-xs text-slate-500 dark:text-gray-400 mt-0.5 md:mt-1 truncate transition-colors">T. Informatika</p>
        <p class="text-primary font-black mt-2 md:mt-4 text-sm md:text-3xl">180 <span class="text-[7px] md:text-xs font-normal text-slate-400 dark:text-gray-400 italic transition-colors">pts</span></p>
    </div>

    <!-- Rank 3 -->
    <div class="bg-white dark:bg-card/40 border border-slate-200 dark:border-white/5 p-2 md:p-6 rounded-2xl md:rounded-3xl text-center order-3 relative group hover:-translate-y-2 transition-all duration-500 shadow-sm dark:shadow-none flex flex-col justify-end">
        <div class="absolute top-2 left-2 md:top-4 md:left-4 text-orange-600 dark:text-orange-700 font-black text-xs md:text-xl italic transition-colors">3</div>
        <div class="w-10 h-10 md:w-16 md:h-16 bg-orange-50 dark:bg-orange-700/20 rounded-full mx-auto mb-2 md:mb-4 flex items-center justify-center border-2 border-orange-200 dark:border-orange-700/50 shadow-sm md:shadow-lg transition-colors mt-4 md:mt-0">
            <span class="text-base md:text-2xl">🥉</span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-white text-[9px] md:text-base truncate transition-colors">Siti Aminah</h3>
        <p class="text-[7px] md:text-xs text-slate-500 dark:text-gray-500 mt-0.5 md:mt-1 truncate transition-colors">T. Informatika</p>
        <p class="text-primary font-bold mt-2 md:mt-3 text-xs md:text-xl">130 <span class="text-[7px] md:text-xs font-normal text-slate-400 dark:text-gray-500 transition-colors">pts</span></p>
    </div>
</div>

<!-- LEADERBOARD TABLE (FIXED SCROLL) -->
<div class="bg-white dark:bg-card/80 backdrop-blur-md border border-slate-200 dark:border-white/5 rounded-3xl overflow-hidden shadow-sm dark:shadow-xl mb-12 transition-colors duration-300">
    <!-- Header Tabel Tetap -->
    <div class="px-6 py-4 border-b border-slate-100 dark:border-white/5 bg-slate-50 dark:bg-white/5 sticky top-0 z-10 transition-colors">
        <h3 class="text-sm font-bold text-slate-500 dark:text-gray-400 uppercase tracking-widest flex justify-between transition-colors">
            <span>Top 50 Klasemen Mahasiswa</span>
            <span class="text-primary text-xs">Scroll ⬇</span>
        </h3>
    </div>

    <!-- Wadah Scroll Tetap -->
    <div class="max-h-[500px] overflow-y-auto custom-scrollbar">
        <table class="w-full text-left">
            <tbody id="leaderboard-body" class="divide-y divide-slate-100 dark:divide-white/5 transition-colors">
                <!-- Loader Placeholder sebelum JS jalan -->
                <tr>
                    <td colspan="3" class="px-6 py-10 text-center text-slate-500 dark:text-gray-500">
                        Memuat data peringkat...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- STYLING KHUSUS UNTUK CUSTOM SCROLLBAR -->
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(99, 102, 241, 0.3);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(99, 102, 241, 0.6);
    }
</style>

<!-- JAVASCRIPT UNTUK GENERATE 50 DATA JSON DUMMY -->
<script>
    const generateTop50Data = () => {
        const firstNames = ["Komang", "Putu", "Wayan", "Made", "Nyoman", "Ketut", "Gede", "Ayu", "Kadek", "Luh", "Agus", "Bagus", "Dwi", "Tri", "Sari"];
        const lastNames = ["Iswara", "Jaya", "Taruna", "Budi", "Lestari", "Arya", "Dina", "Susila", "Pratama", "Wiguna", "Sujana", "Mahardika"];
        const prodiList = ["Teknik Informatika", "Sistem Informasi", "Desain Komunikasi Visual", "Bisnis Digital"];

        let mockData = [];
        let currentPoints = 125;

        for (let i = 4; i <= 50; i++) {
            const fName = firstNames[Math.floor(Math.random() * firstNames.length)];
            const lName = lastNames[Math.floor(Math.random() * lastNames.length)];
            const prodi = prodiList[Math.floor(Math.random() * prodiList.length)];

            const initial = fName.charAt(0) + lName.charAt(0);

            currentPoints = currentPoints - Math.floor(Math.random() * 3) - 1;

            mockData.push({
                rank: i,
                initial: initial,
                name: `${fName} ${lName}`,
                prodi: prodi,
                points: currentPoints
            });
        }

        return mockData;
    };

    const renderLeaderboard = () => {
        const data = generateTop50Data();
        const tbody = document.getElementById('leaderboard-body');
        let htmlContent = '';

        data.forEach(item => {
            // Perhatikan penggunaan dark: classes di dalam template string ini
            htmlContent += `
                <tr class="hover:bg-slate-50 dark:hover:bg-white/5 transition-colors duration-300">
                    <td class="px-6 py-4 text-slate-400 dark:text-gray-400 font-black italic w-16 transition-colors">${item.rank}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <!-- Avatar: bg-slate-100 di terang, bg-gray-700 di gelap -->
                            <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-gray-700 flex items-center justify-center text-sm font-bold text-slate-700 dark:text-white border border-slate-200 dark:border-transparent transition-colors">
                                ${item.initial}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900 dark:text-white transition-colors">${item.name}</p>
                                <p class="text-[10px] text-slate-500 dark:text-gray-500 uppercase mt-0.5 transition-colors">${item.prodi}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right font-black text-primary text-lg">${item.points}</td>
                </tr>
            `;
        });

        tbody.innerHTML = htmlContent;
    };

    document.addEventListener('DOMContentLoaded', renderLeaderboard);
</script>
@endsection