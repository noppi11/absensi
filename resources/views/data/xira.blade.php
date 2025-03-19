@extends('layouts.base')

@section('content')
<div class="container">
    <h3>Daftar Siswa Kelas XI RA</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>NIS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $key => $s)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->username }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->nis }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada siswa di kelas XI RA</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
