@extends('layouts.app')

@section('activePasien', 'active')

@section('content')
<div class="container">
    <h2>Daftar</h2>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="dtable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal</th>
                    <th>Jenis Kelamin</th>
                    <th>Diagnosis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->diagnosis }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pasien.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#dtables').DataTable();
    });
</script>
@endpush