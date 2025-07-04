@extends('layouts.app')

@section('activePasien', 'active')

@section('content')
<div class="container">
    <h2>Edit</h2>

    <form action="{{ route('pasien.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="number" name="nik" class="form-control" value="{{ $data->nik }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control" value="{{ $data->diagnosis }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
