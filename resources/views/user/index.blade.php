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
<<<<<<< HEAD
                                            data-email="{{ $user->email }}" data-role="{{ $user->role }}"
                                            data-id-kelas="{{ $user->id_kelas ?? '' }}"
                                            data-nis="{{ $user->nis ?? '' }}" data-alamat="{{ $user->alamat ?? '' }}"
                                            data-tempat-lahir="{{ $user->tempat_lahir ?? '' }}"
                                            data-tanggal-lahir="{{ $user->tanggal_lahir ?? '' }}">
=======
                                            data-email="{{ $user->email }}" data-role="{{ $user->role }}" data-id-kelas="{{ $user->id_kelas ?? null }}">
>>>>>>> 50ba7643dcc8eacf9515ec2bd13ab0959fa434a9
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
                                                            <div class="row">
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="edit-role"
                                                                        class="form-label text-start d-block">Role</label>
                                                                    <select class="form-control" id="edit-role"
                                                                        name="role" required>
                                                                        <option value="admin">Admin</option>
                                                                        <option value="guru">Guru</option>
                                                                        <option value="siswa">Siswa</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3" id="kelasFormEdit" style="display: none;">
                                                                <label for="edit-kelas" class="form-label">Kelas</label>
                                                                <select class="form-control" id="edit-kelas"
                                                                    name="id_kelas">
                                                                    <option value="">Pilih Kelas</option>
                                                                    @foreach ($kelas as $v)
                                                                    <option value="{{ $v->id }}">{{ $v->nama_kelas }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Input Nama -->
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="edit-name"
                                                                        class="form-label">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-name" name="name" required>
                                                                </div>

                                                                <!-- Input Username -->
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="edit-username"
                                                                        class="form-label">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-username" name="username" required>
                                                                </div>
                                                            </div>
                                                            <!-- Input NIS -->
                                                            <div class="mb-3" id="edit-nisForm" style="display: none;">
                                                                <label for="edit-nis" class="form-label">NIS</label>
                                                                <input type="text" class="form-control" id="edit-nis"
                                                                    name="nis">
                                                            </div>

                                                            <!-- Input Alamat -->
                                                            <div class="mb-3" id="edit-alamatForm"
                                                                style="display: none;">
                                                                <label for="edit-alamat"
                                                                    class="form-label">Alamat</label>
                                                                <textarea class="form-control" id="edit-alamat"
                                                                    name="alamat"></textarea>
                                                            </div>

                                                            <div class="row">
                                                                <!-- Input Tempat Lahir -->
                                                                <div class="mb-3 col-md-6" id="edit-tempatLahirForm"
                                                                    style="display: none;">
                                                                    <label for="edit-tempat_lahir"
                                                                        class="form-label">Tempat Lahir</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-tempat_lahir" name="tempat_lahir">
                                                                </div>

                                                                <!-- Input Tanggal Lahir -->
                                                                <div class="mb-3 col-md-6" id="edit-tanggalLahirForm"
                                                                    style="display: none;">
                                                                    <label for="edit-tanggal_lahir"
                                                                        class="form-label">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control"
                                                                        id="edit-tanggal_lahir" name="tanggal_lahir">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="edit-email"
                                                                        class="form-label text-start d-block">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="edit-email" name="email" required>
                                                                </div>
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
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">Silahkan Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
<<<<<<< HEAD
=======
                    </div>
                    <div class="mb-3" id="kelasForm" style="display: none;">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-control" id="kelas" name="id_kelas">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
>>>>>>> 50ba7643dcc8eacf9515ec2bd13ab0959fa434a9
                    </div>
                    <div class="mb-3" id="kelasForm" style="display: none;">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-control" id="kelas" name="id_kelas" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $v)
                            <option value="{{ $v->id }}">{{ $v->nama_kelas }}</option>
                        @endforeach
                    </select>


                    </div>
                    <div class="row">
                        <!-- Input Nama -->
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Input Username -->
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>

                    <!-- Input NIS -->
                    <div class="mb-3" id="nisForm" style="display: none;">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis">
                    </div>

                    <!-- Input Alamat -->
                    <div class="mb-3" id="alamatForm" style="display: none;">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="row">
                        <!-- Input Tempat Lahir -->
                        <div class="mb-3 col-md-6" id="tempatLahirForm" style="display: none;">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>

                        <!-- Input Tanggal Lahir -->
                        <div class="mb-3 col-md-6" id="tanggalLahirForm" style="display: none;">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
<!-- Modal Edit Pengguna -->
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditUser" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">

                    <div class="mb-3">
                        <label for="edit-role" class="form-label">Role</label>
                        <select class="form-control" id="edit-role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
                    <div class="mb-3" id="kelasFormEdit" style="display: none;">
                        <label for="edit-kelas" class="form-label">Kelas</label>
                        <select class="form-control" id="edit-kelas" name="id_kelas">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit-username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
>>>>>>> 50ba7643dcc8eacf9515ec2bd13ab0959fa434a9

@endsection

@push('scripts')
<!-- jQuery & DataTables -->
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('jquery/jquery.dataTables.min.js') }}"></script>
<script>
$('#modalTambahUser').on('shown.bs.modal', function () {
    console.log('Modal terbuka!');
});
</script>
<script>
    document.getElementById("role").addEventListener("change", function () {
    var role = this.value;
    var kelasForm = document.getElementById("kelasForm");

    if (role === "siswa") {
        kelasForm.style.display = "block";
    } else {
        kelasForm.style.display = "none";
    }
});

</script>
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
                let id_kelas = this.getAttribute("data-id-kelas");
<<<<<<< HEAD
                let nis = this.getAttribute("data-nis");
                let alamat = this.getAttribute("data-alamat");
                let tempatLahir = this.getAttribute("data-tempat-lahir");
                let tanggalLahir = this.getAttribute("data-tanggal-lahir");
=======
>>>>>>> 50ba7643dcc8eacf9515ec2bd13ab0959fa434a9

                // Isi modal edit user dengan data dari button
                document.getElementById("edit-id").value = userId;
                document.getElementById("edit-name").value = name;
                document.getElementById("edit-username").value = username;
                document.getElementById("edit-email").value = email;
                document.getElementById("edit-role").value = role;

                // Ubah action form agar sesuai dengan user yang diedit
                document.getElementById("formEditUser").action = "/user/" + userId;

<<<<<<< HEAD
                // Cek jika role adalah "siswa", tampilkan form tambahan
                toggleStudentFields(role, "edit");

                // Set nilai kelas jika role siswa
                if (role === 'siswa') {
                    document.getElementById('edit-kelas').value = id_kelas;
                    document.getElementById('edit-nis').value = nis;
                    document.getElementById('edit-alamat').value = alamat;
                    document.getElementById('edit-tempat_lahir').value = tempatLahir;
                    document.getElementById('edit-tanggal_lahir').value = tanggalLahir;
=======
                // Cek jika role adalah "siswa" => tampilkan form kelas
                const kelasFormEdit = document.getElementById('kelasFormEdit');
                const selectKelas = document.getElementById('edit-kelas');

                if (role === 'siswa') {
                    kelasFormEdit.style.display = 'block';
                    selectKelas.value = id_kelas;
                } else {
                    kelasFormEdit.style.display = 'none';
>>>>>>> 50ba7643dcc8eacf9515ec2bd13ab0959fa434a9
                }
            });
        });

        // Event listener untuk form tambah user
        document.getElementById('role').addEventListener('change', function () {
            toggleStudentFields(this.value, "add");
        });

        // Event listener untuk form edit user
        document.getElementById('edit-role').addEventListener('change', function () {
            toggleStudentFields(this.value, "edit");
        });

        // Fungsi untuk menampilkan/menyembunyikan form tambahan siswa
        function toggleStudentFields(role, mode) {
            let prefix = mode === "edit" ? "edit-" : "";

            document.getElementById(prefix + "kelasForm").style.display = (role === "siswa") ? "block" : "none";
            document.getElementById(prefix + "nisForm").style.display = (role === "siswa") ? "block" : "none";
            document.getElementById(prefix + "alamatForm").style.display = (role === "siswa") ? "block" :
                "none";
            document.getElementById(prefix + "tempatLahirForm").style.display = (role === "siswa") ? "block" :
                "none";
            document.getElementById(prefix + "tanggalLahirForm").style.display = (role === "siswa") ? "block" :
                "none";
        }
    });

    // jika role yang dipilih adalah siswa
    document.getElementById('role').addEventListener('change', function() {
        const role = this.value;
        const kelasForm = document.getElementById('kelasForm');

        if (role === 'siswa') {
            kelasForm.style.display = 'block';
        } else {
            kelasForm.style.display = 'none';
        }
    });

    // Event change saat role diganti
    document.getElementById('edit-role').addEventListener('change', function () {
        const role = this.value;
        const kelasFormEdit = document.getElementById('kelasFormEdit');

        if (role === 'siswa') {
            kelasFormEdit.style.display = 'block';
        } else {
            kelasFormEdit.style.display = 'none';
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Event listener untuk tombol edit user
        document.querySelectorAll(".btn-edit-user").forEach(button => {
            button.addEventListener("click", function () {
                let userId = this.dataset.id;
                let name = this.dataset.name;
                let username = this.dataset.username;
                let email = this.dataset.email;
                let role = this.dataset.role;
                let id_kelas = this.dataset.idKelas || "";
                let nis = this.dataset.nis || "";
                let alamat = this.dataset.alamat || "";
                let tempatLahir = this.dataset.tempatLahir || "";
                let tanggalLahir = this.dataset.tanggalLahir || "";

                // Isi form edit dengan data yang diambil
                document.getElementById("edit-id").value = userId;
                document.getElementById("edit-name").value = name;
                document.getElementById("edit-username").value = username;
                document.getElementById("edit-email").value = email;
                document.getElementById("edit-role").value = role;
                document.getElementById("formEditUser").action = "/user/" + userId;

                // Jika role siswa, tampilkan input tambahan
                toggleStudentFields(role, "edit");

                if (role === 'siswa') {
                    document.getElementById('edit-kelas').value = id_kelas;
                    document.getElementById('edit-nis').value = nis;
                    document.getElementById('edit-alamat').value = alamat;
                    document.getElementById('edit-tempat_lahir').value = tempatLahir;
                    document.getElementById('edit-tanggal_lahir').value = tanggalLahir;
                }
            });
        });

        // Event listener untuk form tambah user
        document.getElementById('role').addEventListener('change', function () {
            toggleStudentFields(this.value, "add");
        });

        // Event listener untuk form edit user
        document.getElementById('edit-role').addEventListener('change', function () {
            toggleStudentFields(this.value, "edit");
        });

        // Fungsi untuk menampilkan/menyembunyikan form tambahan siswa
        function toggleStudentFields(role, mode) {
            let prefix = mode === "edit" ? "edit-" : "";

            let fields = ["kelasForm", "nisForm", "alamatForm", "tempatLahirForm", "tanggalLahirForm"];

            fields.forEach(field => {
                let element = document.getElementById(prefix + field);
                if (element) {
                    element.style.display = (role === "siswa") ? "block" : "none";
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
    $('#formTambahUser ').on('submit', function(e) {
        e.preventDefault();
        // Logika untuk menyimpan data
    });
});
</script>
@endpush