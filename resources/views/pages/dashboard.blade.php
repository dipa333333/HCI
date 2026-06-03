@extends('layout.app')

@section('title', 'Dashboard - SKP App')

@section('content')
<div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Halo, Mulyono! 👋</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-1">
            Kamu punya <span class="text-primary font-semibold">2 kegiatan</span> yang perlu diperiksa.
        </p>
    </div>
    <button onclick="openModal()" class="bg-primary text-white px-6 py-2.5 rounded-xl shadow-lg shadow-primary/30 hover:scale-105 transition flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        Ajukan SKP
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 space-y-8">

        <div class="bg-white dark:bg-card/80 backdrop-blur-md border border-slate-200 dark:border-white/5 p-8 rounded-3xl shadow-xl dark:shadow-none relative overflow-hidden transition-colors duration-300">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <p class="text-slate-500 dark:text-gray-400 text-sm font-medium uppercase tracking-wider">Total Progres SKP</p>
                <div class="flex items-baseline gap-2 mt-2">
                    <h2 class="text-5xl font-extrabold text-slate-900 dark:text-white">75</h2>
                    <span class="text-slate-400 dark:text-gray-500 font-medium">/ 100 Poin</span>
                </div>

                <div class="mt-6">
                    <div class="w-full h-4 bg-slate-100 dark:bg-dark/50 rounded-full border border-slate-200 dark:border-white/5 p-1">
                        <div class="h-full bg-gradient-to-r from-primary to-indigo-400 rounded-full transition-all duration-1000 shadow-[0_0_15px_rgba(99,102,241,0.3)]" style="width:75%"></div>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-gray-400 mt-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-500"><path d="m5 12 5 5L20 7"/></svg>
                    25 poin lagi untuk memenuhi syarat kelulusan
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 p-5 rounded-2xl transition-colors">
                <p class="text-xs text-slate-500 dark:text-gray-400 mb-2">Akademik</p>
                <div class="flex justify-between items-end">
                    <span class="text-xl font-bold text-slate-900 dark:text-white">30<span class="text-xs text-slate-400 dark:text-gray-500">/40</span></span>
                    <span class="text-[10px] text-emerald-500 font-medium">75%</span>
                </div>
                <div class="w-full h-1 bg-slate-100 dark:bg-dark mt-2 rounded-full overflow-hidden">
                    <div class="h-full bg-indigo-500" style="width: 75%"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 p-5 rounded-2xl transition-colors">
                <p class="text-xs text-slate-500 dark:text-gray-400 mb-2">Organisasi</p>
                <div class="flex justify-between items-end">
                    <span class="text-xl font-bold text-slate-900 dark:text-white">20<span class="text-xs text-slate-400 dark:text-gray-500">/30</span></span>
                    <span class="text-[10px] text-emerald-500 font-medium">66%</span>
                </div>
                <div class="w-full h-1 bg-slate-100 dark:bg-dark mt-2 rounded-full overflow-hidden">
                    <div class="h-full bg-indigo-500" style="width: 66%"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 p-5 rounded-2xl transition-colors">
                <p class="text-xs text-slate-500 dark:text-gray-400 mb-2">Minat Bakat</p>
                <div class="flex justify-between items-end">
                    <span class="text-xl font-bold text-slate-900 dark:text-white">25<span class="text-xs text-slate-400 dark:text-gray-500">/30</span></span>
                    <span class="text-[10px] text-emerald-500 font-medium">83%</span>
                </div>
                <div class="w-full h-1 bg-slate-100 dark:bg-dark mt-2 rounded-full overflow-hidden">
                    <div class="h-full bg-indigo-500" style="width: 83%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-card/80 backdrop-blur-md border border-slate-200 dark:border-white/5 p-6 rounded-3xl shadow-sm dark:shadow-none transition-colors">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Aktivitas Terakhir</h2>
                <a href="/skp" class="text-xs text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-center pb-4 border-b border-slate-100 dark:border-gray-700/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-500/10 rounded-xl flex items-center justify-center text-yellow-500 text-lg">🎓</div>
                        <div>
                            <p class="font-medium text-sm text-slate-800 dark:text-white">Seminar Nasional IT</p>
                            <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase tracking-tighter">12 Mei 2026 • Akademik</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-yellow-500 bg-yellow-500/10 border border-yellow-500/20 px-2 py-1 rounded-lg uppercase">Pending</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500 text-lg">💻</div>
                        <div>
                            <p class="font-medium text-sm text-slate-800 dark:text-white">Workshop Laravel Dasar</p>
                            <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase tracking-tighter">10 Mei 2026 • Akademik</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-500 bg-emerald-500/10 border border-emerald-400/20 px-2 py-1 rounded-lg uppercase">Approved</span>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-8">

        <div class="bg-gradient-to-br from-indigo-600 to-primary p-6 rounded-3xl shadow-xl shadow-primary/20 relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="text-white font-bold mb-1">Butuh Poin SKP?</h3>
                <p class="text-indigo-100 text-xs mb-4">Ada kompetisi web dev minggu depan!</p>
                <a href="/event" class="inline-block bg-white text-primary text-xs font-bold px-4 py-2 rounded-xl group-hover:scale-105 transition">
                    Cek Event
                </a>
            </div>
            <svg class="absolute -bottom-2 -right-2 w-20 h-20 text-white/20 transform rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>
        </div>

        <div class="bg-white dark:bg-card/80 backdrop-blur-md border border-slate-200 dark:border-white/5 p-6 rounded-3xl shadow-sm dark:shadow-none transition-colors">
            <h3 class="text-sm font-semibold mb-4 flex items-center gap-2 text-slate-900 dark:text-white">
                <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                Status Mahasiswa
            </h3>
            <div class="space-y-4">
                <div class="p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5">
                    <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase">IPK Terakhir</p>
                    <p class="text-lg font-bold text-slate-900 dark:text-white">3.61</p>
                </div>
                <div class="p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5">
                    <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase">Status SKP</p>
                    <p class="text-sm font-bold text-emerald-500">Hampir Tercapai</p>
                </div>
                <div class="p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5">
                    <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase">Target Semester</p>
                    <p class="text-sm font-bold text-slate-900 dark:text-white">30 Poin</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection