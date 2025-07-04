@extends('layouts.app')

@section('activeDiagnosis', 'active')

@section('content')
<div class="container">
    <h2>Cari Kode ICD-10 atau Diagnosis</h2>
    <a href="{{ route('diagnosis.datatable') }}" class="btn btn-link mb-3">Lihat Database</a>

    <form action="{{ route('diagnosis.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="q" class="form-control" placeholder="Contoh: A00 atau Kolera"
                value="{{ request('q') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    @if(isset($data) && count($data) > 0)
        @foreach($data as $item)
        <div class="card">
            <div class="card-body">
                <h5><strong>Kode ICD-10:</strong> {{ $item->kode }}</h5>
                <p><strong>Penjelasan Umum:</strong> {{ $item->penjelasan_umum }}</p>

                <p><strong>Kategori (Bab):</strong> {{ $item->kategori_bab }}</p>
                <p><strong>Organ Terkait:</strong> {{ $item->organ_terkait ?? '-' }}</p>
                <p><strong>Definisi Penyakit:</strong> {{ $item->definisi_penyakit ?? '-' }}</p>
                <p><strong>Kategori Penyakit:</strong> {{ $item->kategori_penyakit ?? '-' }}</p>
                <p><strong>Kaidah Koding:</strong> {{ $item->kaidah_koding ?? '-' }}</p>

                <h6 class="mt-3"><strong>Panduan Praktik Klinis:</strong></h6>
                <ul>
                    <li><strong>S (Hasil Anamnesis):</strong> {{ $item->hasil_anamnesis ?? '-' }}</li>
                    <li><strong>O (Hasil Pemeriksaan Fisik & Penunjang Sederhana):</strong> {{ $item->hasil_pemeriksaan ?? '-' }}</li>
                    <li><strong>A (Penegakan Diagnosis):</strong> {{ $item->penegakan_diagnosis ?? '-' }}</li>
                    <li><strong>P (Penatalaksanaan Komprehensif):</strong> {{ $item->penatalaksanaan ?? '-' }}</li>
                </ul>
            </div>
        </div>
        @endforeach
    @elseif(request('q'))
        <div class="alert alert-warning">
            Data tidak ditemukan untuk: <strong>{{ request('q') }}</strong>
        </div>
    @endif
</div>
@endsection
