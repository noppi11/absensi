@extends('layouts.app')

@section('content')
    <h1>Tambah Kopetensi</h1>
    <form action="{{ route('kopetensi.store') }}" method="POST">
        @csrf
        <label>Nama Kopetensi:</label>
        <input type="text" name="nama" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('kopetensi.index') }}">Kembali</a>
@endsection
