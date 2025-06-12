<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memvalidasi input dari form login agar username dan password wajib diisi
        $cekLogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mengecek apakah kredensial username dan password sesuai dengan data di database
        if(Auth::attempt($cekLogin))
        {
            // Jika berhasil login, buat ulang session untuk mencegah session fixation
            $request->session()->regenerate();

            // Redirect ke halaman yang diinginkan user (atau ke dashboard jika tidak ada tujuan sebelumnya)
            return redirect()->intended(route('dashboard.index'));
        }
        // Jika login gagal, kembalikan ke halaman sebelumnya dengan pesan error 
        return back()->with('error', 'Login Gagal !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
