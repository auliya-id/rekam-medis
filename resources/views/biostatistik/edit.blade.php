@extends('layouts.app')

@section('activeBiostatistik', 'active')

@section('content')
<div class="container">
    <h2>Edit</h2>

    <form action="{{ route('biostatistik.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Pasien</label>
            <input type="number" name="id_pasien" class="form-control" value="{{ $data->id_pasien }}" required>
        </div>
        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="usia" class="form-control" value="{{ $data->usia }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>P</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <select name="diagnosis" class="form-control" required>
                <option value="K35 - Apendisitis" {{ $data->diagnosis == 'K35 - Apendisitis' ? 'selected' : '' }}>K35 - Apendisitis</option>
                <option value="K29 - Gastritis" {{ $data->diagnosis == 'K29 - Gastritis' ? 'selected' : '' }}>K29 - Gastritis</option>
                <option value="K80 - Batu Empedu" {{ $data->diagnosis == 'K80 - Batu Empedu' ? 'selected' : '' }}>K80 - Batu Empedu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('biostatistik.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
