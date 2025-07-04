@extends('layouts.app')

@section('activeRiwayatPasien', 'active')

@section('content')
<div class="container">
    <h2>Riwayat Data Pasien</h2>

    @if(!empty($data))
        @foreach($data as $item)
            <div class="card">
                <div class="card-body">
                    <h5><strong>{{ $loop->iteration }}. </strong> {{ $item->nama }}</h5>
                    <p>
                        NIK: {{ $item->nik }}<br>
                        Tanggal: {{ $item->tanggal }}<br>
                        Diagnosis: {{ $item->diagnosis }}<br>
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">
            Tidak ada data
        </div>
    @endif
</div>
@endsection