@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah</h2>

    <form action="{{ route('diagnosis.store') }}" method="POST">
        @csrf
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ada kesalahan pada input anda:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penjelasan Umum</label>
            <input type="text" name="penjelasan_umum" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori Bab</label>
            <input type="text" name="kategori_bab" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Organ Terkait</label>
            <input type="text" name="organ_terkait" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Definisi Penyakit</label>
            <input type="text" name="definisi_penyakit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori Penyakit</label>
            <input type="text" name="kategori_penyakit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kaidah Koding</label>
            <input type="text" name="kaidah_koding" class="form-control" required>
        </div>
        <div class="mb-3">
            <label><b>S (Hasil Anamnesis)</b></label>
            <input type="text" name="hasil_anamnesis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label><b>O (Hasil Pemeriksaan Fisik dan Penunjang Sederhana)</b></label>
            <input type="text" name="hasil_pemeriksaan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label><b>A (Penegakan Diagnosis)</b></label>
            <input type="text" name="penegakan_diagnosis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label><b>P (Penatalaksanaan Komprehensif)</b></label>
            <input type="text" name="penatalaksanaan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
