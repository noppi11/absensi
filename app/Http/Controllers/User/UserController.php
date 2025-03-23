<?php
namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Kelas;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $kelas = Kelas::all();
        return view('user.index', compact('users', 'kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all(); 
        return view('user.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'id_kelas' => 'nullable|exists:kelas,id',
            'email' => 'required|email',
            'nis' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'id_kelas' => $request->id_kelas ? (int) $request->id_kelas : null,
            'email' => $request->email,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $kelas = Kelas::all();
        return view('user.edit', compact('user', 'kelas'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nis' => 'nullable|string|max:20', 
            'alamat' => 'nullable|string|max:255', 
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'role' => 'required|in:guru,admin,siswa',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'nis' => $request->role === 'siswa' ? $request->nis : null,
            'alamat' => $request->role === 'siswa' ? $request->alamat : null,
            'tempat_lahir' => $request->role === 'siswa' ? $request->tempat_lahir : null,
            'tanggal_lahir' => $request->role === 'siswa' ? $request->tanggal_lahir : null,
        ]);
        
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
