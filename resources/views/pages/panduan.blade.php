@extends('layout.app')

@section('title', 'Panduan & SOP SKP')

@section('content')
<!-- HEADER -->
<div class="mb-10 text-center lg:text-left">
    <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight transition-colors duration-300">Panduan & SOP</h1>
    <p class="text-slate-500 dark:text-gray-400 mt-2 transition-colors duration-300">Pahami alur pengajuan dan temukan kategori poin SKP dengan mudah.</p>
</div>

<!-- SECTION 1: VISUAL SOP -->
<div class="mb-16">
    <h2 class="text-xl font-bold mb-6 flex items-center gap-2 text-slate-900 dark:text-white transition-colors duration-300">
        <span class="w-8 h-8 bg-indigo-100 dark:bg-primary/20 text-primary rounded-lg flex items-center justify-center text-sm transition-colors">01</span>
        Alur Pengajuan SKP
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 relative">
        <!-- Step 1 -->
        <div class="bg-white dark:bg-card/40 border border-slate-200 dark:border-white/5 p-6 rounded-3xl relative z-10 shadow-sm dark:shadow-none transition-colors duration-300">
            <div class="text-3xl mb-4">📤</div>
            <h3 class="font-bold text-slate-900 dark:text-white text-sm mb-1 transition-colors">1. Upload Bukti</h3>
            <p class="text-[11px] text-slate-500 dark:text-gray-500 leading-relaxed transition-colors">Mahasiswa mengunggah sertifikat/sk dalam format PDF atau JPG.</p>
        </div>
        <!-- Step 2 -->
        <div class="bg-white dark:bg-card/40 border border-slate-200 dark:border-white/5 p-6 rounded-3xl relative z-10 shadow-sm dark:shadow-none transition-colors duration-300">
            <div class="text-3xl mb-4">⏳</div>
            <h3 class="font-bold text-slate-900 dark:text-white text-sm mb-1 transition-colors">2. Status Pending</h3>
            <p class="text-[11px] text-slate-500 dark:text-gray-500 leading-relaxed transition-colors">Sistem menerima data dan menunggu giliran untuk diverifikasi admin.</p>
        </div>
        <!-- Step 3 -->
        <div class="bg-white dark:bg-card/40 border border-slate-200 dark:border-white/5 p-6 rounded-3xl relative z-10 shadow-sm dark:shadow-none transition-colors duration-300">
            <div class="text-3xl mb-4">🔍</div>
            <h3 class="font-bold text-slate-900 dark:text-white text-sm mb-1 transition-colors">3. Verifikasi</h3>
            <p class="text-[11px] text-slate-500 dark:text-gray-500 leading-relaxed transition-colors">Admin memeriksa keaslian dokumen dan kesesuaian poin.</p>
        </div>
        <!-- Step 4 (Active/Highlight) -->
        <div class="bg-white dark:bg-card/40 border border-primary/40 dark:border-primary/30 p-6 rounded-3xl relative z-10 shadow-lg shadow-primary/10 dark:shadow-primary/5 transition-colors duration-300">
            <div class="text-3xl mb-4">✅</div>
            <h3 class="font-bold text-slate-900 dark:text-white text-sm mb-1 transition-colors">4. Approved</h3>
            <p class="text-[11px] text-slate-500 dark:text-gray-500 leading-relaxed transition-colors">Poin otomatis bertambah ke total SKP mahasiswa.</p>
        </div>
    </div>
</div>

<!-- SECTION 2: SEARCHABLE RULES -->
<div class="mb-10">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <h2 class="text-xl font-bold flex items-center gap-2 text-slate-900 dark:text-white transition-colors duration-300">
            <span class="w-8 h-8 bg-indigo-100 dark:bg-primary/20 text-primary rounded-lg flex items-center justify-center text-sm transition-colors">02</span>
            Daftar Poin SKP
        </h2>
        <!-- Live Search Input -->
        <div class="relative w-full md:w-80">
            <input type="text" id="ruleSearch" onkeyup="searchRules()" placeholder="Cari kegiatan (misal: Lomba)..."
                class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white dark:bg-card border border-slate-200 dark:border-white/10 focus:border-primary outline-none text-sm text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-gray-500 shadow-sm dark:shadow-none transition-colors duration-300">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 dark:text-gray-500 transition-colors" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
    </div>

    <!-- ACCORDION GROUPS -->
    <div class="space-y-4">

        <!-- Kategori Akademik -->
        <div class="rule-category bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm dark:shadow-none transition-colors duration-300">
            <button onclick="toggleAccordion('acad')" class="w-full px-6 py-4 flex justify-between items-center hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="text-xl">🎓</span>
                    <span class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider transition-colors">Bidang Akademik</span>
                </div>
                <svg id="icon-acad" class="w-5 h-5 text-slate-400 dark:text-gray-500 transition-all rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="content-acad" class="px-6 pb-4 space-y-2">
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Juara Lomba Tingkat Nasional</span>
                    <span class="text-primary font-bold text-xs">50 Poin</span>
                </div>
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Juara Lomba Tingkat Regional/Provinsi</span>
                    <span class="text-primary font-bold text-xs">30 Poin</span>
                </div>
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Peserta Seminar Internasional</span>
                    <span class="text-primary font-bold text-xs">15 Poin</span>
                </div>
            </div>
        </div>

        <!-- Kategori Organisasi -->
        <div class="rule-category bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm dark:shadow-none transition-colors duration-300">
            <button onclick="toggleAccordion('org')" class="w-full px-6 py-4 flex justify-between items-center hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="text-xl">🤝</span>
                    <span class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider transition-colors">Organisasi & Kepanitiaan</span>
                </div>
                <svg id="icon-org" class="w-5 h-5 text-slate-400 dark:text-gray-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="content-org" class="hidden px-6 pb-4 space-y-2">
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Ketua Umum BEM / HIMA</span>
                    <span class="text-primary font-bold text-xs">40 Poin</span>
                </div>
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Pengurus Inti Organisasi</span>
                    <span class="text-primary font-bold text-xs">20 Poin</span>
                </div>
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Ketua Panitia Event Kampus</span>
                    <span class="text-primary font-bold text-xs">15 Poin</span>
                </div>
            </div>
        </div>

        <!-- Kategori Minat Bakat -->
        <div class="rule-category bg-white dark:bg-card/60 border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm dark:shadow-none transition-colors duration-300">
            <button onclick="toggleAccordion('talent')" class="w-full px-6 py-4 flex justify-between items-center hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="text-xl">🎨</span>
                    <span class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider transition-colors">Minat, Bakat & Sosial</span>
                </div>
                <svg id="icon-talent" class="w-5 h-5 text-slate-400 dark:text-gray-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="content-talent" class="hidden px-6 pb-4 space-y-2">
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Relawan Kemanusiaan</span>
                    <span class="text-primary font-bold text-xs">25 Poin</span>
                </div>
                <div class="rule-item flex justify-between p-3 bg-slate-50 dark:bg-dark/40 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <span class="text-xs text-slate-700 dark:text-gray-300 transition-colors">Anggota UKM Aktif</span>
                    <span class="text-primary font-bold text-xs">10 Poin</span>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // ACCORDION LOGIC
    function toggleAccordion(id) {
        const content = document.getElementById('content-' + id);
        const icon = document.getElementById('icon-' + id);

        const isOpen = !content.classList.contains('hidden');

        if (isOpen) {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        } else {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        }
    }

    // LIVE SEARCH LOGIC
    function searchRules() {
        const input = document.getElementById('ruleSearch').value.toLowerCase();
        const items = document.querySelectorAll('.rule-item');
        const categories = document.querySelectorAll('.rule-category');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(input)) {
                item.classList.remove('hidden');
                item.classList.add('flex');
            } else {
                item.classList.remove('flex');
                item.classList.add('hidden');
            }
        });

        // Buka otomatis semua kategori saat mencari agar item yang match terlihat
        if (input.length > 0) {
            categories.forEach(cat => {
                const content = cat.querySelector('div[id^="content-"]');
                const icon = cat.querySelector('svg[id^="icon-"]');
                if(content) content.classList.remove('hidden');
                if(icon) icon.classList.add('rotate-180');
            });
        }
    }
</script>
@endsection