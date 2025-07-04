@extends('layouts.app')

@section('activePasien', 'active')

@section('content')
<div class="container">
    <h2>Tambah</h2>

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="number" name="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
