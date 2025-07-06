@extends('layouts.app')

@section('activeBiostatistik', 'active')

@section('content')
<div class="container">
    <h2>Edit</h2>

    <form action="{{ route('biostatistik.update', $data->id) }}" method="POST">
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
                <option value="Laki-Laki" {{ $data->jenis_kelamin == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $data->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                <option value="Tidak Dapat Ditentukan" {{ $data->jenis_kelamin == "Tidak Dapat Ditentukan" ? 'selected' : '' }}>Tidak Dapat Ditentukan</option>
                <option value="Tidak Diketahui" {{ $data->jenis_kelamin == "Tidak Diketahui" ? 'selected' : '' }}>Tidak Diketahui</option>
                <option value="Tidak Ditulis" {{ $data->jenis_kelamin == "Tidak Ditulis" ? 'selected' : '' }}>Tidak Ditulis</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Diagnosis</label>
            <select name="diagnosis" class="form-control" required>
                @foreach($diagnosis as $value)
                    <option value="{{ $value->kode }}" {{ old('diagnosis', $data->diagnosis ?? '') == $value->kode ? 'selected' : '' }}>
                        {{ $value->kode }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('biostatistik.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
