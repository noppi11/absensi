<h2 style="text-align:center;">Rekap Absen Satu Bulan</h2>
<table border="1" cellpadding="4">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Surat Izin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensBulanIni as $absen)
        <tr>
            <td>{{ $absen->user->name }}</td>
            <td>{{ $absen->status }}</td>
            <td>{{ $absen->created_at->format('Y-m-d') }}</td>
            <td>{{ $absen->created_at->format('H:i:s') }}</td>
            <td>
                @if ($absen->status === 'Izin' && $absen->surat_izin)
                    Ada
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
