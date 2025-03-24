@extends('layouts.base')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kopetensi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Kopetensi</li>
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
                        <!-- Tombol untuk membuka modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addKopetensiModal">
                            <i class="bi bi-plus"></i> Tambah Kopetensi
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="table-user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Jumlah Kelas</th>
                                <th width="5%" class="text-center"><i class="bi bi-gear"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kopetensis as $kopetensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kopetensi->name }}</td>
                                <td>{{ $kopetensi->slug }}</td>
                                <td>{{ $kopetensi->classs->count() }} Kelas</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-warning me-1 btn-edit-user"
                                            id="btn-edit-kopetensi" data-bs-toggle="modal"
                                            data-bs-target="#editKopetensiModal" data-kopetensi="{{ $kopetensi }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="{{ route('kopetensis.destroy', $kopetensi->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
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
<!-- Modal Tambah Kopetensi -->
<div class="modal fade" id="addKopetensiModal" tabindex="-1" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Tambah Kopetensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kopetensis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 col-md-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan nama Kopetensi" required>
                    </div>
                    <button id="btnTambahUser" type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Kopetensi -->
<div class="modal fade" id="editKopetensiModal" tabindex="-1" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKopetensiForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-md-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-name" name="name"
                            placeholder="Masukkan nama Kopetensi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- jQuery & DataTables -->
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('jquery/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#table-user').DataTable();
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".btn-edit-user").forEach(button => {
            button.addEventListener("click", function () {
                let data = JSON.parse(this.getAttribute("data-kopetensi"));
                document.querySelector("#edit-name").value = data.name

                document.querySelector("#editKopetensiForm").action = `/kopetensis/${data.id}`
            });
        });
    });

</script>
@endpush