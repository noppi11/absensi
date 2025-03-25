<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class AbsenController extends Controller
{
    public function index()
    {
        $absensi = Absen::all();
        return view('absen.index', compact('absensi'));
    }
}
