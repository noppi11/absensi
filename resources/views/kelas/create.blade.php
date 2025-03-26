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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row col-md-6">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Tambah Data</div>
                    </div>
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input name="nama_kelas" type="text" class="form-control">
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Kompetensi Keahlian</label>
                                <input name="kompetensi_keahlian" type="text" class="form-control">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Kompetensi Keahlian</label>
                                <select name="id_kopetensi" class="form-select" aria-label="Default select example">
                                    <option selected>Kopetensi Kelahlian</option>
                                    @foreach ($kopetensis as $kop)
                                        <option value="{{ $kop->id }}">{{ $kop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Wali Kelas</label>
                                <select name="id_wali_kelas" class="form-control">
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($waliKelas as $v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
