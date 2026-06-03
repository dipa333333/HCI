@extends('layout.app')

@section('title', 'Tambah SKP')

@section('content')

<div class="mb-6">
    <a href="/skp" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition">
        <span>←</span> Kembali
    </a>
</div>

<h1 class="text-3xl font-bold mb-6">Tambah SKP Baru</h1>

<div class="hidden bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-xl mb-6 items-center gap-3">
    <span>✅</span> SKP berhasil ditambahkan (simulasi)
</div>

<div class="bg-card/80 backdrop-blur-md border border-white/5 p-6 md:p-8 rounded-2xl shadow-xl max-w-2xl">
    <form class="space-y-5">

        <div>
            <label class="block text-sm text-gray-400 mb-2">Judul Kegiatan</label>
            <input type="text" placeholder="Misal: Seminar Teknologi Masa Depan" required
                class="w-full p-3.5 rounded-xl bg-dark border border-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-2">Poin SKP</label>
            <input type="number" placeholder="0" required
                class="w-full p-3.5 rounded-xl bg-dark border border-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-2">Upload Bukti (Sertifikat/Dokumen)</label>
            <div class="w-full p-4 rounded-xl bg-dark border border-gray-700 border-dashed hover:border-primary/50 transition flex justify-center items-center">
                <input type="file" class="w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
            </div>
        </div>

        <div class="pt-4 mt-4 border-t border-gray-700/50">
            <button class="bg-primary w-full md:w-auto md:px-10 py-3.5 rounded-xl font-semibold hover:bg-indigo-500 hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-0.5 transition-all duration-300">
                Simpan SKP
            </button>
        </div>

    </form>
</div>

@endsection