@extends('layouts.app')

@section('content')
    <h1>Daftar Kopetensi</h1>
    <a href="{{ route('kopetensi.create') }}">Tambah Kopetensi</a>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Kopetensi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($kopetensis as $index => $kopetensi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kopetensi->nama }}</td>
                <td>
                    <a href="{{ route('kopetensi.edit', $kopetensi->id) }}">Edit</a>
                    <form action="{{ route('kopetensi.destroy', $kopetensi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
