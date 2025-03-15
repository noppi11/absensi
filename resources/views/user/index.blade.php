@extends('layouts.base')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Pengguna</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
                            data-bs-target="#modalTambahUser">
                            <i class="bi bi-plus"></i> Tambah Pengguna
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="table-user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="5%" class="text-center"><i class="bi bi-gear"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span
                                        class="badge 
                                                {{ $user->role == 'admin' ? 'bg-danger' : ($user->role == 'guru' ? 'bg-success' : 'bg-primary') }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-warning me-1 btn-edit-user" data-bs-toggle="modal"
                                            data-bs-target="#modalEditUser" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-username="{{ $user->username }}"
                                            data-email="{{ $user->email }}" data-role="{{ $user->role }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Modal Edit Pengguna -->
                                        <div class="modal fade" id="modalEditUser" tabindex="-1"
                                            aria-labelledby="modalEditUserLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditUserLabel">Edit Pengguna
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="formEditUser" action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" id="edit-id" name="id">

                                                            <div class="mb-3">
                                                                <label for="edit-name" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="edit-name"
                                                                    name="name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit-username"
                                                                    class="form-label">Username</label>
                                                                <input type="text" class="form-control"
                                                                    id="edit-username" name="username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit-email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="edit-email"
                                                                    name="email" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit-role" class="form-label">Role</label>
                                                                <select class="form-control" id="edit-role" name="role"
                                                                    required>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="guru">Guru</option>
                                                                    <option value="siswa">Siswa</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahUser" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                let userId = this.getAttribute("data-id");
                let name = this.getAttribute("data-name");
                let username = this.getAttribute("data-username");
                let email = this.getAttribute("data-email");
                let role = this.getAttribute("data-role");

                // Isi modal dengan data dari button
                document.getElementById("edit_user_id").value = userId;
                document.getElementById("edit_name").value = name;
                document.getElementById("edit_username").value = username;
                document.getElementById("edit_email").value = email;
                document.getElementById("edit_role").value = role;

                // Ubah action form agar sesuai dengan user yang diedit
                document.getElementById("formEditUser").action = "/user/" + userId;
            });
        });
    });
</script>

@endpush