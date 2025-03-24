<?php

namespace App\Http\Controllers;

use App\Models\Kopetensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KopetensiController extends Controller
{
    public function index() {
        $kopetensis = Kopetensi::all();
        return view("kopetensi.index", ['kopetensis' => $kopetensis]);
    }
    public function store(Request $request){
        $validate = $request->validate([
            "name" => "required"
        ]);
        $validate['slug'] = Str::slug($validate['name']);
        Kopetensi::create($validate);
        return redirect()->route('kopetensis')->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request, Kopetensi $kopetensi){
        $validate = $request->validate([
            "name" => "required"
        ]);
        $validate['slug'] = Str::slug($validate['name']);

        if($kopetensi->slug === $validate['slug']){
            return redirect()->route('kopetensis')->with('success', 'Data Tidak Berubah!');
        } else{
            $kopetensi->update($validate);
            return redirect()->route('kopetensis')->with('success', 'Data berhasil disimpan');
        }
    }
    public function destroy(Kopetensi $kopetensi){
        if($kopetensi){
            $kopetensi->delete();
            return redirect()->route('kopetensis')->with('success', 'Data berhasil digebuk diinjek dibakar dilupakan!!!!!');
        }
    }
}