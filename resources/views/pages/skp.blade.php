@extends('layout.app')

@section('title', 'SKP Saya - Manajemen Data')

@section('content')
<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white transition-colors duration-300">SKP Saya</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-1 transition-colors duration-300">Kelola dan pantau semua pengajuan poin SKP kamu</p>
    </div>
    <button onclick="openModal()" class="bg-primary px-5 py-2.5 rounded-xl text-white shadow-lg shadow-primary/30 hover:scale-105 transition flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        Ajukan SKP
    </button>
</div>

<!-- TOOLS: SEARCH, FILTER, & SORT -->
<div class="space-y-4 mb-8">
    <div class="flex flex-col lg:flex-row gap-4">
        <!-- Search -->
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" id="searchInput" onkeyup="handleSearch()" placeholder="Cari kegiatan..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white dark:bg-card border border-slate-200 dark:border-white/10 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition text-sm text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-gray-500">
        </div>

        <!-- Sorting -->
        <div class="flex gap-2">
            <select id="sortSelect" onchange="handleSort()" class="bg-white dark:bg-card border border-slate-200 dark:border-white/10 text-slate-700 dark:text-gray-300 text-sm rounded-xl px-4 py-2.5 outline-none focus:border-primary transition cursor-pointer">
                <option value="latest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="highest">Poin Tertinggi</option>
            </select>
        </div>
    </div>

    <!-- Clickable Filter Tabs -->
    <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-hide">
        <button onclick="filterByStatus('all')" id="btn-all" class="filter-btn active px-5 py-2 rounded-xl text-sm font-medium transition">Semua</button>
        <button onclick="filterByStatus('pending')" id="btn-pending" class="filter-btn px-5 py-2 rounded-xl text-sm font-medium transition text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-transparent border border-slate-200 dark:border-transparent">Pending</button>
        <button onclick="filterByStatus('approved')" id="btn-approved" class="filter-btn px-5 py-2 rounded-xl text-sm font-medium transition text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-transparent border border-slate-200 dark:border-transparent">Approved</button>
        <button onclick="filterByStatus('rejected')" id="btn-rejected" class="filter-btn px-5 py-2 rounded-xl text-sm font-medium transition text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white bg-white dark:bg-transparent border border-slate-200 dark:border-transparent">Rejected</button>
    </div>
</div>

<!-- LIST CONTAINER -->
<div id="skpList" class="space-y-4 min-h-[400px]">
</div>

<!-- PAGINATION CONTROLS -->
<div class="flex justify-between items-center mt-10">
    <p id="paginationInfo" class="text-xs text-slate-500 dark:text-gray-500 font-medium tracking-wide uppercase"></p>
    <div class="flex gap-2">
        <button onclick="prevPage()" id="prevBtn" class="p-2.5 rounded-xl bg-white dark:bg-card border border-slate-200 dark:border-white/5 text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 disabled:opacity-30 disabled:cursor-not-allowed transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button onclick="nextPage()" id="nextBtn" class="p-2.5 rounded-xl bg-white dark:bg-card border border-slate-200 dark:border-white/5 text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 disabled:opacity-30 disabled:cursor-not-allowed transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
    </div>
</div>

<!-- MODAL DELETE -->
<div id="deleteModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
    <div onclick="closeDeleteModal()" class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 transition duration-300" id="deleteOverlay"></div>
    <div id="deleteBox" class="relative bg-white dark:bg-card w-full max-w-sm p-6 rounded-2xl shadow-2xl transform scale-95 opacity-0 transition duration-300 border border-slate-200 dark:border-white/5 text-center">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Hapus Pengajuan?</h3>
        <p class="text-sm text-slate-500 dark:text-gray-400 mb-6">Tindakan ini tidak bisa dibatalkan.</p>
        <div class="flex gap-3">
            <button onclick="closeDeleteModal()" class="flex-1 bg-slate-100 dark:bg-gray-700 hover:bg-slate-200 text-slate-700 dark:text-white py-2.5 rounded-xl font-medium transition">Batal</button>
            <button onclick="confirmDelete()" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl font-medium transition">Ya, Hapus</button>
        </div>
    </div>
</div>

<style>
    .filter-btn.active { background-color: #6366F1 !important; color: white !important; border-color: transparent !important; }
    .scrollbar-hide::-webkit-scrollbar { display: none; }
</style>

<script>
    // DATA DUMMY
    let skpData = [
        { id: 1, title: "Seminar Nasional Teknologi AI", points: 15, date: "2026-05-12", status: "pending", category: "Akademik", note: "" },
        { id: 2, title: "Lomba Web Design INSTIKI", points: 50, date: "2026-05-10", status: "approved", category: "Kompetisi", note: "" },
        { id: 3, title: "Workshop Laravel & Tailwind", points: 10, date: "2026-05-08", status: "rejected", category: "Akademik", note: "File sertifikat kurang jelas / buram." },
        { id: 4, title: "Pengurus HIMA IT - Sekretaris", points: 30, date: "2026-04-20", status: "approved", category: "Organisasi", note: "" },
        { id: 5, title: "Volunteer Bakti Sosial Desa", points: 20, date: "2026-04-15", status: "pending", category: "Sosial", note: "" },
        { id: 6, title: "Webinar Cyber Security", points: 5, date: "2026-04-10", status: "approved", category: "Akademik", note: "" },
        { id: 7, title: "Juara 2 Hackathon Bali", points: 75, date: "2026-04-05", status: "rejected", category: "Kompetisi", note: "Sertifikat belum ditandatangani panitia." },
        { id: 8, title: "Ketua Panitia Makrab IT", points: 40, date: "2026-03-25", status: "approved", category: "Organisasi", note: "" },
        { id: 9, title: "Pelatihan Cisco Networking", points: 25, date: "2026-03-20", status: "pending", category: "Akademik", note: "" },
        { id: 10, title: "Seminar Karir Masa Depan", points: 10, date: "2026-03-15", status: "approved", category: "Akademik", note: "" },
        { id: 11, title: "Lomba Esai Inovasi", points: 20, date: "2026-03-10", status: "pending", category: "Kompetisi", note: "" },
        { id: 12, title: "Anggota Mapala - Divisi Alam", points: 15, date: "2026-03-01", status: "approved", category: "Organisasi", note: "" }
    ];

    let currentPage = 1;
    let itemsPerPage = 5;
    let currentFilter = 'all';
    let currentSort = 'latest';
    let searchQuery = '';

    function renderList() {
        const listContainer = document.getElementById('skpList');

        let filtered = skpData.filter(item => {
            const matchStatus = currentFilter === 'all' || item.status === currentFilter;
            const matchSearch = item.title.toLowerCase().includes(searchQuery.toLowerCase());
            return matchStatus && matchSearch;
        });

        filtered.sort((a, b) => {
            if (currentSort === 'latest') return new Date(b.date) - new Date(a.date);
            if (currentSort === 'oldest') return new Date(a.date) - new Date(b.date);
            if (currentSort === 'highest') return b.points - a.points;
        });

        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        if (currentPage > totalPages) currentPage = Math.max(1, totalPages);

        const start = (currentPage - 1) * itemsPerPage;
        const paginatedItems = filtered.slice(start, start + itemsPerPage);

        listContainer.innerHTML = '';
        if (paginatedItems.length === 0) {
            listContainer.innerHTML = `<div class="text-center py-10 text-slate-500 dark:text-gray-500">Data tidak ditemukan</div>`;
        } else {
            paginatedItems.forEach(item => {
                const statusColors = {
                    pending: 'text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-400/10 border-yellow-200 dark:border-yellow-400/20',
                    approved: 'text-emerald-600 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-400/10 border-emerald-200 dark:border-emerald-400/20',
                    rejected: 'text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-400/10 border-red-200 dark:border-red-400/20'
                };

                const card = `
                    <div class="bg-white dark:bg-card/80 border border-slate-200 dark:border-white/5 p-5 rounded-2xl group hover:border-primary/50 dark:hover:border-primary/50 transition-colors duration-300 shadow-sm dark:shadow-none">
                        <div class="flex justify-between items-start">
                            <div class="flex gap-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-white/5 flex items-center justify-center text-xl transition-colors">
                                    ${item.category === 'Akademik' ? '🎓' : item.category === 'Kompetisi' ? '🏆' : '🤝'}
                                </div>
                                <div>
                                    <h2 class="font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">${item.title}</h2>
                                    <p class="text-xs text-slate-500 dark:text-gray-500 mt-1">${item.category} • <span class="text-primary font-medium">${item.points} Poin</span></p>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold px-3 py-1.5 rounded-lg border uppercase ${statusColors[item.status]}">
                                ${item.status}
                            </span>
                        </div>

                        ${item.status === 'rejected' ? `<div class="mt-3 p-3 bg-red-50 dark:bg-red-500/5 border border-red-200 dark:border-red-500/10 rounded-xl text-[11px] text-red-600 dark:text-red-300">
                            <b>Catatan:</b> ${item.note}
                        </div>` : ''}

                        <div class="flex justify-between items-center mt-5 pt-4 border-t border-slate-100 dark:border-gray-700/50 transition-colors">
                            <p class="text-[10px] text-slate-400 dark:text-gray-500 uppercase tracking-widest">${item.date}</p>
                            <div class="flex gap-4 items-center">
                                <button class="text-xs text-slate-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition underline decoration-primary/30">Lihat Sertifikat</button>
                                <button onclick="openDeleteModal('${item.title}')" class="text-xs text-red-500 hover:text-red-600 dark:text-red-400/70 dark:hover:text-red-400 transition">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
                listContainer.innerHTML += card;
            });
        }

        document.getElementById('paginationInfo').innerText = `Halaman ${currentPage} dari ${totalPages || 1}`;
        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages || totalPages === 0;
    }

    function filterByStatus(status) {
        currentFilter = status;
        currentPage = 1;
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active', 'text-white', 'bg-primary');
            btn.classList.add('text-slate-500', 'dark:text-gray-400', 'bg-white', 'dark:bg-transparent', 'border-slate-200');
        });
        const activeBtn = document.getElementById(`btn-${status}`);
        activeBtn.classList.add('active');
        activeBtn.classList.remove('text-slate-500', 'dark:text-gray-400', 'bg-white', 'dark:bg-transparent', 'border-slate-200');
        renderList();
    }

    function handleSearch() { searchQuery = document.getElementById('searchInput').value; currentPage = 1; renderList(); }
    function handleSort() { currentSort = document.getElementById('sortSelect').value; renderList(); }
    function prevPage() { if (currentPage > 1) { currentPage--; renderList(); window.scrollTo({ top: 0, behavior: 'smooth' }); } }
    function nextPage() { currentPage++; renderList(); window.scrollTo({ top: 0, behavior: 'smooth' }); }

    let itemToDelete = "";
    function openDeleteModal(name) {
        itemToDelete = name;
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        setTimeout(() => {
            document.getElementById('deleteOverlay').classList.remove('opacity-0');
            document.getElementById('deleteBox').classList.remove('opacity-0', 'scale-95');
        }, 10);
    }

    function closeDeleteModal() {
        document.getElementById('deleteOverlay').classList.add('opacity-0');
        document.getElementById('deleteBox').classList.add('opacity-0', 'scale-95');
        setTimeout(() => { document.getElementById('deleteModal').classList.add('hidden'); }, 300);
    }

    function confirmDelete() {
        skpData = skpData.filter(i => i.title !== itemToDelete);
        closeDeleteModal();
        renderList();
        if(typeof showToast === 'function') showToast("Data berhasil dihapus");
    }

    document.addEventListener('DOMContentLoaded', renderList);
</script>
@endsection