@extends('layouts.app')

@section('activeBiostatistik', 'active')

@section('content')
<div class="container">
    <h2>Tambah</h2>

    <form action="{{ route('biostatistik.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ID Pasien</label>
            <input type="number" name="id_pasien" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="usia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <select name="diagnosis" class="form-control" required>
                <option value="K35 - Apendisitis">K35 - Apendisitis</option>
                <option value="K29 - Gastritis">K29 - Gastritis</option>
                <option value="K80 - Batu Empedu">K80 - Batu Empedu</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
