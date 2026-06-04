@extends('layout.app')

@section('title', 'Katalog Event SKP')

@section('content')
<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white transition-colors duration-300">Katalog Event</h1>
        <p class="text-slate-500 dark:text-gray-400 text-sm mt-1 transition-colors duration-300">Temukan kegiatan yang sesuai minatmu dan kumpulkan poin SKP.</p>
    </div>
</div>

<!-- FILTER KATEGORI -->
<div class="flex gap-3 mb-8 overflow-x-auto pb-2 scrollbar-hide">
    <button onclick="filterEvent('all')" id="filter-all" class="filter-btn active flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-medium transition bg-primary text-white border border-transparent">
        Semua
    </button>
    <button onclick="filterEvent('kompetisi')" id="filter-kompetisi" class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white dark:bg-card text-slate-500 dark:text-gray-400 border border-slate-200 dark:border-white/5 text-sm hover:text-slate-900 dark:hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
        Kompetisi
    </button>
    <button onclick="filterEvent('seminar')" id="filter-seminar" class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white dark:bg-card text-slate-500 dark:text-gray-400 border border-slate-200 dark:border-white/5 text-sm hover:text-slate-900 dark:hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h20"/><path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"/><path d="m7 21 5-5 5 5"/></svg>
        Seminar
    </button>
    <button onclick="filterEvent('pengabdian')" id="filter-pengabdian" class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white dark:bg-card text-slate-500 dark:text-gray-400 border border-slate-200 dark:border-white/5 text-sm hover:text-slate-900 dark:hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
        Pengabdian
    </button>
</div>

<!-- GRID EVENT CARDS -->
<div id="eventGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
</div>

<!-- MODAL DETAIL EVENT -->
<div id="eventModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
    <div onclick="closeEventModal()" class="absolute inset-0 bg-slate-900/50 dark:bg-black/80 backdrop-blur-sm opacity-0 transition duration-300" id="modalBg"></div>
    <div id="modalContent" class="relative bg-white dark:bg-card w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300 border border-slate-200 dark:border-white/10">

        <!-- Modal Banner Image -->
        <div class="h-56 relative bg-slate-200 dark:bg-gray-900">
            <img id="modalImage" src="" alt="Event Banner" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-card via-black/10 to-black/50"></div>
            <button onclick="closeEventModal()" class="absolute top-4 right-4 z-10 bg-black/40 hover:bg-red-500 text-white p-2 rounded-full backdrop-blur-md transition">✕</button>
        </div>

        <div class="p-8 relative z-10 -mt-10">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <span id="modalTag" class="text-[10px] font-bold text-primary uppercase tracking-widest px-2 py-1 bg-primary/10 rounded-md border border-primary/20 backdrop-blur-md">Kategori</span>
                    <h2 id="modalTitle" class="text-2xl font-bold text-slate-900 dark:text-white mt-3 transition-colors">Judul Event</h2>
                </div>
                <div class="text-right bg-slate-50 dark:bg-card/80 backdrop-blur-md px-3 py-2 rounded-xl border border-slate-100 dark:border-white/5 transition-colors">
                    <p class="text-[10px] text-slate-500 dark:text-gray-500 uppercase">Poin SKP</p>
                    <p id="modalPoints" class="text-xl font-bold text-primary">+0</p>
                </div>
            </div>
            <div class="space-y-4 mb-8">
                <div class="flex items-center gap-3 text-sm text-slate-600 dark:text-gray-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2V7a2 2H5a2 2v12z"></path></svg>
                    <span id="modalDate">Tanggal</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-600 dark:text-gray-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    <span id="modalLocation">Lokasi</span>
                </div>
                <p id="modalDesc" class="text-sm text-slate-600 dark:text-gray-400 leading-relaxed pt-4 border-t border-slate-100 dark:border-white/5 transition-colors"></p>
            </div>
            <button onclick="showToast('Pendaftaran Berhasil!')" class="w-full bg-primary hover:bg-indigo-500 text-white font-bold py-4 rounded-2xl transition shadow-lg shadow-primary/20">Daftar Sekarang</button>
        </div>
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
</style>

<script>
    const events = [
        {
            id: 1, title: "Nasional Web Design Competition 2026", category: "kompetisi", tag: "Kompetisi",
            points: 50, date: "15 Juni 2026", location: "Online / Zoom", quota: "12/50",
            deadline: "2 hari lagi",
            image: "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=800&auto=format&fit=crop",
            desc: "Tunjukkan keahlianmu dalam merancang antarmuka web yang modern dan user-friendly di ajang bergengsi tingkat nasional ini."
        },
        {
            id: 2, title: "Webinar: UI/UX Trends in 2026", category: "seminar", tag: "Seminar",
            points: 10, date: "20 Juni 2026", location: "YouTube Live", quota: "145/500",
            deadline: "7 hari lagi",
            image: "https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop",
            desc: "Belajar langsung dari pakar industri mengenai tren desain masa depan dan bagaimana AI mengubah cara kita bekerja."
        },
        {
            id: 3, title: "Relawan Mengajar Desa Digital", category: "pengabdian", tag: "Pengabdian",
            points: 100, date: "01 Juli 2026", location: "Kabupaten Badung, Bali", quota: "5/10",
            deadline: "Besok!",
            image: "https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?q=80&w=800&auto=format&fit=crop",
            desc: "Bantu masyarakat pedesaan mengenal teknologi digital dan literasi internet untuk meningkatkan ekonomi lokal."
        },
        {
            id: 4, title: "Lomba Esai Teknologi Tepat Guna", category: "kompetisi", tag: "Kompetisi",
            points: 30, date: "10 Agustus 2026", location: "Gedung Rektorat", quota: "20/100",
            deadline: "30 hari lagi",
            image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmc9G7OfR8ZJUaCCGhDFa0ymakfIlu1oYIeg&s",
            desc: "Tuangkan ide inovatifmu dalam bentuk tulisan mengenai pemanfaatan teknologi untuk masalah sehari-hari."
        },
        {
            id: 5, title: "Workshop Dasar Laravel 11", category: "seminar", tag: "Seminar",
            points: 20, date: "25 Mei 2026", location: "Lab Komputer 4", quota: "Full",
            deadline: "Ditutup",
            image: "https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=800&auto=format&fit=crop",
            desc: "Bedah tuntas fitur terbaru Laravel 11 dan cara membangun aplikasi web yang scalable dan aman."
        }
    ];

    let currentFilter = 'all';

    function renderEvents() {
        const grid = document.getElementById('eventGrid');
        grid.innerHTML = '';

        const filtered = currentFilter === 'all' ? events : events.filter(e => e.category === currentFilter);

        filtered.forEach(e => {
            grid.innerHTML += `
                <div class="bg-white dark:bg-card/80 backdrop-blur-md border border-slate-200 dark:border-white/5 rounded-3xl overflow-hidden group hover:border-primary/50 dark:hover:border-primary/50 transition-all duration-500 flex flex-col relative shadow-sm dark:shadow-none">
                    <!-- Bookmark -->
                    <button class="absolute top-4 right-4 z-20 p-2 bg-black/30 hover:bg-primary/80 text-white rounded-full backdrop-blur-md transition group/btn">
                        <svg class="w-4 h-4 group-hover/btn:fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16l-7-3.5L5 21V5z"></path></svg>
                    </button>

                    <!-- Image Header -->
                    <div class="h-48 relative overflow-hidden bg-slate-200 dark:bg-gray-900">
                        <img src="${e.image}" alt="${e.title}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                        <!-- Overlay Adaptif: from-white di Light Mode, from-card di Dark Mode -->
                        <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-card via-black/30 to-black/10 transition-colors duration-300"></div>

                        <div class="absolute bottom-4 left-4 z-10 bg-black/50 backdrop-blur-md px-3 py-1.5 rounded-lg text-[10px] font-bold text-white border border-white/10 uppercase tracking-widest">
                            +${e.points} Poin
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[10px] font-bold text-primary uppercase tracking-widest">${e.tag}</span>
                            <span class="text-[10px] ${e.deadline.includes('Besok') || e.deadline.includes('2 hari') ? 'text-red-500 dark:text-red-400 animate-pulse' : 'text-slate-500 dark:text-gray-400'} font-medium bg-slate-100 dark:bg-black/30 px-2 py-1 rounded-md transition-colors">${e.deadline}</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 line-clamp-2 leading-snug group-hover:text-primary dark:group-hover:text-primary transition-colors">${e.title}</h3>

                        <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex justify-between items-center transition-colors">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-400 dark:text-gray-500 uppercase tracking-tight">Kuota Terisi</span>
                                <span class="text-xs font-bold text-slate-700 dark:text-gray-300">${e.quota}</span>
                            </div>
                            <button onclick="openEventModal(${e.id})" class="bg-primary/10 hover:bg-primary text-primary hover:text-white px-5 py-2 rounded-xl text-xs font-bold transition duration-300 border border-primary/20">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    function filterEvent(category) {
        currentFilter = category;
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-primary', 'text-white', 'border-transparent');
            btn.classList.add('bg-white', 'dark:bg-card', 'text-slate-500', 'dark:text-gray-400', 'border-slate-200', 'dark:border-white/5');
        });

        const activeBtn = document.getElementById(`filter-${category}`);
        activeBtn.classList.add('active', 'bg-primary', 'text-white', 'border-transparent');
        activeBtn.classList.remove('bg-white', 'dark:bg-card', 'text-slate-500', 'dark:text-gray-400', 'border-slate-200', 'dark:border-white/5');

        renderEvents();
    }

    // MODAL LOGIC
    function openEventModal(id) {
        const event = events.find(e => e.id === id);
        document.getElementById('modalImage').src = event.image;
        document.getElementById('modalTitle').innerText = event.title;
        document.getElementById('modalTag').innerText = event.tag;
        document.getElementById('modalPoints').innerText = `+${event.points}`;
        document.getElementById('modalDate').innerText = event.date;
        document.getElementById('modalLocation').innerText = event.location;
        document.getElementById('modalDesc').innerText = event.desc;

        const modal = document.getElementById('eventModal');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        setTimeout(() => {
            document.getElementById('modalBg').classList.remove('opacity-0');
            document.getElementById('modalContent').classList.remove('opacity-0', 'scale-95');
        }, 10);
    }

    function closeEventModal() {
        document.getElementById('modalBg').classList.add('opacity-0');
        document.getElementById('modalContent').classList.add('opacity-0', 'scale-95');
        setTimeout(() => { document.getElementById('eventModal').classList.add('hidden'); }, 300);
    }

    document.addEventListener('DOMContentLoaded', renderEvents);
</script>
@endsection