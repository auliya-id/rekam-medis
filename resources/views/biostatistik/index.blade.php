@extends('layouts.app')

@section('activeBiostatistik', 'active')

@section('content')
<div class="container">
    <h2>Daftar</h2>
    <a href="{{ route('biostatistik.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Diagnosis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->id_pasien }}</td>
                    <td>{{ $data->usia }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->diagnosis }}</td>
                    <td>
                        <a href="{{ route('biostatistik.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('biostatistik.destroy', $data->id) }}" method="POST" style="display:inline;">
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

    {{-- Statistik Diagnosis --}}
    <div class="card p-3">
        <h5 class="mb-3"><strong>Statistik Diagnosis</strong></h5>
        <ul class="mb-0">
            @forelse($diagnosisStats as $diagnosis => $stat)
                <li>{{ $diagnosis }}: {{ $stat['jumlah'] }} kasus ({{ $stat['persentase'] }}%)</li>
            @empty
                <li>Tidak ada data.</li>
            @endforelse
        </ul>
    </div>

    <div class="mt-5">
        <h5><strong>Distribusi Diagnosis (Pie Chart)</strong></h5>
        <canvas id="diagnosisChart"></canvas>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script>
    const ctx = document.getElementById('diagnosisChart').getContext('2d');
    const diagnosisChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($diagnosisStats->keys()) !!},
            datasets: [{
                label: 'Distribusi Diagnosis',
                data: {!! json_encode($diagnosisStats->pluck('jumlah')->values()) !!},
                backgroundColor: [
                    '#007bff', '#ffc107', '#dc3545', '#28a745', '#6610f2', '#fd7e14'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw;
                            return `${label}: ${value} kasus`;
                        }
                    }
                }
            }
        }
    });
</script>
@endpush