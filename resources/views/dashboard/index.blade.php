@extends('layouts.base')
@stack('scripts')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    {{-- Tambahan ucapan selamat datang --}}
    <div class="container-fluid mb-4">
        <div class="alert alert-info">
            Selamat datang di absensi, <strong>{{ Auth::user()->name }}</strong>!
        </div>
    </div>
    @php
    $user = Auth::user();
    @endphp

    @if ($user->role === 'guru' || $user->role === 'admin')
    <div class="container-fluid mb-4">
        <div class="row">
            @foreach ($kopetensis as $index => $kopetensi)
            <div class="col-lg-3 col-6">
                <div class="small-box
                        @switch($index % 4)
                            @case(0) text-bg-success @break
                            @case(1) text-bg-danger @break
                            @case(2) text-bg-warning @break
                            @case(3) text-bg-primary  @break
                        @endswitch">
                    <div class="inner">
                        <h3>{{ $kopetensi->students_count }} Siswa</h3>
                        <p>{{ $kopetensi->name }}</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122z">
                        </path>
                    </svg>
                    <a href="#"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4">
                <h5>Grafik Kehadiran</h5>
                <div class="card">
                    <div class="card-body">
                        <canvas id="hadirChart" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6>Distribusi Izin</h6>
                        <canvas id="izinChart" style="max-height: 250px;"></canvas>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6>Distribusi Sakit</h6>
                        <canvas id="sakitChart" style="max-height: 250px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
</div>
@php
$izinBG = $izinData->pluck('kopetensi')->map(function($k) use ($colors) {
    return $colors[$k] ?? 'rgba(150,150,150,0.5)';
})->toArray();

$sakitBG = $sakitData->pluck('kopetensi')->map(function($k) use ($colors) {
    return $colors[$k] ?? 'rgba(180,180,180,0.5)';
})->toArray();
@endphp

@endsection
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const colors = @json($colors);

    // ========== GRAFIK BAR HADIR ==========
    const ctxHadir = document.getElementById('hadirChart').getContext('2d');
    const datasetsBar = [
        @foreach($kopetensisChart as $kpt)
        {
            label: '{{ $kpt }}',
            data: [
                @foreach($uniqueDates as $tgl)
                    {{ $hadirData->where('tanggal', $tgl)->where('kopetensi', $kpt)->first()->jumlah_hadir ?? 0 }},
                @endforeach
            ],
            backgroundColor: colors['{{ $kpt }}']
        },
        @endforeach
    ];

    new Chart(ctxHadir, {
        type: 'bar',
        data: {
            labels: @json($uniqueDates),
            datasets: datasetsBar
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Kehadiran Siswa per Tanggal per Kopetensi'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Hadir'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                }
            }
        }
    });

    // ========== PIE CHART IZIN ==========
    const ctxIzin = document.getElementById('izinChart').getContext('2d');
    new Chart(ctxIzin, {
        type: 'pie',
        data: {
            labels: @json($izinData->pluck('kopetensi')),
            datasets: [{
                label: 'Jumlah Izin',
                data: @json($izinData->pluck('jumlah_izin')),
                backgroundColor: @json($izinBG)

            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Izin per Kopetensi'
                }
            }
        }
    });

    // ========== PIE CHART SAKIT ==========
    const ctxSakit = document.getElementById('sakitChart').getContext('2d');
    new Chart(ctxSakit, {
        type: 'pie',
        data: {
            labels: @json($sakitData->pluck('kopetensi')),
            datasets: [{
                label: 'Jumlah Sakit',
                data: @json($sakitData->pluck('jumlah_sakit')),
                backgroundColor:  @json($sakitBG)
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Sakit per Kopetensi'
                }
            }
        }
    });
</script>
@endpush

