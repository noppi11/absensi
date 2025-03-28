<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        $absensHariIni = Absen::whereDate('created_at', now()->toDateString())->get();
        $absensBulanIni = Absen::whereMonth('created_at', now()->month)->get();

        return view('absen.index', compact('absensHariIni', 'absensBulanIni'));
    }

    public function create()
    {
        return view('absen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required|in:Hadir,Izin,Sakit',
            'surat_izin' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);
        $suratIzinPath = null;

        // Jika user memilih "Izin" dan mengupload surat izin
        if ($request->status === 'Izin' && $request->hasFile('surat_izin')) {
            $suratIzinPath = $request->file('surat_izin')->store('surat_izin', 'public');
        }

        Absen::create([
            'user_id' => Auth::id(),
            'status' => $request->status,
            'surat_izin' => $suratIzinPath,
        ]);

        return redirect()->route('absen.index')->with('success', 'Absen berhasil disimpan!');
    }

    public function show($id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.show', compact('absen'));
    }

    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.edit', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Izin,Sakit',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->update(['status' => $request->status]);

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil dihapus!');
    }
}
