@extends('layout.app')

@section('title', 'Detail SKP')

@section('content')

<div class="mb-6">
    <a href="/skp" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition">
        <span>←</span> Kembali
    </a>
</div>

<h1 class="text-3xl font-bold mb-6">Detail SKP</h1>

<div class="bg-card/80 backdrop-blur-md border border-white/5 p-6 md:p-8 rounded-2xl shadow-xl max-w-2xl">

    <div class="flex justify-between items-start mb-6">
        <div>
            <h2 class="text-2xl font-semibold">Seminar Nasional</h2>
            <p class="text-primary font-medium mt-1">10 Poin</p>
        </div>
        <span class="text-yellow-400 text-sm bg-yellow-400/10 border border-yellow-400/20 px-4 py-1.5 rounded-full">
            Pending
        </span>
    </div>

    <div class="space-y-4 py-6 border-y border-gray-700/50">
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Tanggal Diajukan</p>
            <p class="font-medium text-gray-200">12 Mei 2026</p>
        </div>
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Bukti Kegiatan</p>
            <a href="#" class="text-primary hover:underline font-medium">sertifika t-seminar.pdf</a>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
        <button class="bg-dark border border-gray-600 text-white px-6 py-2.5 rounded-xl hover:bg-gray-700 hover:border-gray-500 transition">
            Edit Data
        </button>
        <button class="bg-red-500/10 text-red-500 border border-red-500/20 px-6 py-2.5 rounded-xl hover:bg-red-500 hover:text-white transition">
            Hapus SKP
        </button>
    </div>

</div>

@endsection