@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Database Kode Diagnosis</h2>
    <a href="{{ route('diagnosis.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="dtable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Penjelasan Umum</th>
                    <th>Kategori Bab</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kode }}</td>
                    <td>{{ $data->penjelasan_umum }}</td>
                    <td>{{ $data->kategori_bab }}</td>
                    <td>
                        <a href="{{ route('diagnosis.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('diagnosis.destroy', $data->id) }}" method="POST" style="display:inline;">
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
        $('#dtable').DataTable();
    });
</script>
@endpush