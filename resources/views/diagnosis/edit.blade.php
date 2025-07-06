@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit</h2>

    <form action="{{ route('diagnosis.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        
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
            <input type="text" name="kode" class="form-control" value="{{ $data->kode }}" required>
        </div>
        <div class="mb-3">
            <label>Penjelasan Umum</label>
            <input type="text" name="penjelasan_umum" class="form-control" value="{{ $data->penjelasan_umum }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori Bab</label>
            <input type="text" name="kategori_bab" class="form-control" value="{{ $data->kategori_bab }}" required>
        </div>
        <div class="mb-3">
            <label>Organ Terkait</label>
            <input type="text" name="organ_terkait" class="form-control" value="{{ $data->organ_terkait }}" required>
        </div>
        <div class="mb-3">
            <label>Definisi Penyakit</label>
            <input type="text" name="definisi_penyakit" class="form-control" value="{{ $data->definisi_penyakit }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori Penyakit</label>
            <input type="text" name="kategori_penyakit" class="form-control" value="{{ $data->kategori_penyakit }}" required>
        </div>
        <div class="mb-3">
            <label>Kaidah Koding</label>
            <input type="text" name="kaidah_koding" class="form-control" value="{{ $data->kaidah_koding }}" required>
        </div>
        <div class="mb-3">
            <label><b>S (Hasil Anamnesis)</b></label>
            <input type="text" name="hasil_anamnesis" class="form-control" value="{{ $data->hasil_anamnesis }}" required>
        </div>
        <div class="mb-3">
            <label><b>O (Hasil Pemeriksaan Fisik dan Penunjang Sederhana)</b></label>
            <input type="text" name="hasil_pemeriksaan" class="form-control" value="{{ $data->hasil_pemeriksaan }}" required>
        </div>
        <div class="mb-3">
            <label><b>A (Penegakan Diagnosis)</b></label>
            <input type="text" name="penegakan_diagnosis" class="form-control" value="{{ $data->penegakan_diagnosis }}" required>
        </div>
        <div class="mb-3">
            <label><b>P (Penatalaksanaan Komprehensif)</b></label>
            <input type="text" name="penatalaksanaan" class="form-control" value="{{ $data->penatalaksanaan }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('diagnosis.datatable') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
