@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <h3 class="mb-3">Absen</h3>

    {{-- Absen Masuk --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-clipboard-check"></i> Absen Masuk
                </div>
                <div class="card-body">
                    <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <select name="status" class="form-select">
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Absen Sekarang
                        </button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Pastikan data yang diisi benar! 📌
                </div>
            </div>
        </div>

        {{-- Rekap Absen Hari Ini --}}
        <div class="col-md-6">
            <div class="card border-secondary">
                <div class="card-header bg-secondary text-white">
                    <i class="bi bi-list-task"></i> Rekap Absen Hari Ini
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- @forelse ($absensHariIni as $absen)
                                <tr>
                                    <td>{{ $absen->user->name }}</td>
                                    <td>{{ $absen->status }}</td>
                                    <td>{{ $absen->created_at->format('H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data terakhir di-update otomatis!</td>
                                </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Rekap Absen Satu Bulan --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-calendar-check"></i> Rekap Absen Satu Bulan
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{ -- @forelse ($absensBulanIni as $absen)
                                <tr>
                                    <td>{{ $absen->user->name }}</td>
                                    <td>{{ $absen->status }}</td>
                                    <td>{{ $absen->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $absen->created_at->format('H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Rekap absen selama bulan ini.</td>
                                </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
