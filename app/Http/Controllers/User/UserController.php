<?php
namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;




class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required|min:6',
        'role' => ['required', Rule::in(['guru', 'admin', 'siswa'])],
    ]);

   // if ($validator->fails()) {
     //   return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
    //}

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

   // return response()->json(['success' => true, 'message' => 'User berhasil ditambahkan']);
    return redirect()->route('user.index')->with('success', 'Data berhasil disimpan');
}
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        //return view('user.edit', compact('user'));
    }
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:guru,admin,siswa',
    ]);

    $user->update($request->all());

    return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
}

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}