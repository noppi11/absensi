@extends('layouts.base')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Daftar Siswa Kelas XI RA</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelas XI RA</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="table-siswa" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>NIS</th>
                                    <th width="5%" class="text-center"><i class="bi bi-gear"></i></th> <!-- Kolom aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name ?? 'Tidak Ada Nama' }}</td>
                                        <td>{{ $student->username ?? '-' }}</td>
                                        <td>{{ $student->email ?? '-' }}</td>
                                        <td>{{ $student->nis ?? '-' }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </td> <!-- Kolom aksi di tbody -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada siswa di kelas XI RA</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table-siswa').DataTable({
                "autoWidth": false
            });
        });
    </script>
@endpush
