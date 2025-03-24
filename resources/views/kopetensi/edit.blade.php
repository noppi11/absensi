@extends('layouts.app')

@section('content')
    <h1>Edit Kopetensi</h1>
    <form action="{{ route('kopetensi.update', $kopetensi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Kopetensi:</label>
        <input type="text" name="nama" value="{{ $kopetensi->nama }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('kopetensi.index') }}">Kembali</a>
@endsection
