@extends('layouts.base')


@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Kelas</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelas</li>
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
                        <div class="col-sm-12">
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table-kelas" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th width="5%" class="text-center"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKelas as $key => $v)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $v->nama_kelas }}</td>
                                        <td>{{ $v->user->name }}</td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a href="{{ route('kelas.edit', $v->id) }}" class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i></a>
                                                <form action="{{ route('kelas.destroy', $v->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery & DataTables -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('jquery/jquery.dataTables.min.js') }}"></script>
    {{-- <script>
        $(document).ready(function () {
            $('#table-kelas').DataTable();
        });
    </script> --}}
@endpush