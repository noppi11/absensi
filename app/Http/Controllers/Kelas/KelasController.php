<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelas = Kelas::all(); // mengambil semua data yang ada di tabel kelas
        return view('kelas.index', [ // pindah ke halaman ke view kelas.index
            'dataKelas' => $dataKelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $waliKelas = User::where('role', 'guru')->get(); // mengambil users yang rolenya guru
        return view('kelas.create', [ // pindah ke halaman ke view kelas.create
            'waliKelas' => $waliKelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ // validasi bahwa form harus wajib diisi
            'nama_kelas' => 'required',
            'id_wali_kelas' => 'required'
        ]);

        Kelas::create([ // menyimpan form ke tabel kelas
            'nama_kelas' => $request->nama_kelas,
            'id_wali_kelas' => $request->id_wali_kelas
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data berhasil disimpan'); // redirect setelah data disimpan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::find($id); // mengambil data dari tabel kelas sesuai id yang dipilih
        $waliKelas = User::where('role', 'guru')->get(); // mengambil users yang rolenya guru
        return view('kelas.edit', [ // pindah ke halaman ke view kelas.create
            'kelas' => $kelas,
            'waliKelas' => $waliKelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data harus wajib diisi 
        $request->validate([
            'nama_kelas' => 'required',
            'id_wali_kelas' => 'required'
        ]);

        // mengambil data dari form
        $data = [
            'nama_kelas' => $request->nama_kelas,
            'id_wali_kelas' => $request->id_wali_kelas
        ];

        // mengambil data dari tabel kelas berdasarkan id yang diupdate
        $kelas = Kelas::find($id);
        // update tabel
        $kelas->update($data);
        // redirect setelah disimpan
        return redirect()->route('kelas.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::find($id)->delete(); // mengambil data yang akan dihapus berdasarkan id kemudian dihapus
        return redirect()->route('kelas.index')->with('success', 'Data berhasil dihapus'); // redirect setelah dihapus
    }
    public function xira()
{
    // Cari kelas XI RA berdasarkan nama_kelas
    $kelas = Kelas::where('nama_kelas', 'XI RA')->first();

    // Jika kelas ditemukan, ambil semua siswa dalam kelas tersebut
    $siswa = [];
    if ($kelas) {
        $siswa = User::where('role', 'siswa')->where('id_kelas', $kelas->id)->get();
    }

    return view('data.xira', compact('siswa'));
}

}
