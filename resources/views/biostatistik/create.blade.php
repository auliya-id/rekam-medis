@extends('layouts.app')

@section('activeBiostatistik', 'active')

@section('content')
<div class="container">
    <h2>Tambah</h2>

    <form action="{{ route('biostatistik.store') }}" method="POST">
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
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Tidak Dapat Ditentukan">Tidak Dapat Ditentukan</option>
                <option value="Tidak Diketahui">Tidak Diketahui</option>
                <option value="Tidak Ditulis">Tidak Ditulis</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <select name="diagnosis" class="form-control" required>
                @foreach($diagnosis as $value)
                    <option value="{{ $value->kode }}">{{ $value->kode }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
