@extends('layouts.app')

@section('activePasien', 'active')

@section('content')
<div class="container">
    <h2>Edit</h2>

    <form action="{{ route('pasien.update', $data->id) }}" method="POST">
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
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $data->nik }}" required maxlength="16" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)">
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
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
            <input type="text" name="diagnosis" class="form-control" value="{{ $data->diagnosis }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
