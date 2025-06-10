<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kopetensi;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       // Ambil semua kopetensi dan hitung siswa per kopetensi melalui relasi kelas → user
    $kopetensis = Kopetensi::withCount(['kelas as students_count' => function ($query) {
        $query->join('users', 'kelas.id', '=', 'users.id_kelas')->where('role', 'siswa');
    }])->get();

    // Warna acak untuk tiap kopetensi
    $colors = [];
    foreach ($kopetensis as $kpt) {
        $colors[$kpt->name] = 'rgba(' . rand(50, 200) . ',' . rand(50, 200) . ',' . rand(50, 200) . ',0.7)';
    }

    // Data hadir per tanggal per kopetensi
    $hadirData = DB::table('absens')
        ->join('users', 'absens.user_id', '=', 'users.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->join('kopetensis', 'kelas.id_kopetensi', '=', 'kopetensis.id')
        ->where('status', 'hadir')
        ->select('kopetensis.name as kopetensi', DB::raw('DATE(absens.created_at) as tanggal'), DB::raw('count(*) as jumlah_hadir'))
        ->groupBy('kopetensis.name', DB::raw('DATE(absens.created_at)'))
        ->get();

    // Ambil tanggal unik
    $uniqueDates = $hadirData->pluck('tanggal')->unique()->sort()->values();

    // Ambil kopetensi unik untuk grafik batang
    $kopetensisChart = $hadirData->pluck('kopetensi')->unique()->values();

    // Data izin per kopetensi
    $izinData = DB::table('absens')
        ->join('users', 'absens.user_id', '=', 'users.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->join('kopetensis', 'kelas.id_kopetensi', '=', 'kopetensis.id')
        ->where('status', 'ijin')
        ->select('kopetensis.name as kopetensi', DB::raw('count(*) as jumlah_izin'))
        ->groupBy('kopetensis.name')
        ->get();

    // Data sakit per kopetensi
    $sakitData = DB::table('absens')
        ->join('users', 'absens.user_id', '=', 'users.id')
        ->join('kelas', 'users.id_kelas', '=', 'kelas.id')
        ->join('kopetensis', 'kelas.id_kopetensi', '=', 'kopetensis.id')
        ->where('status', 'sakit')
        ->select('kopetensis.name as kopetensi', DB::raw('count(*) as jumlah_sakit'))
        ->groupBy('kopetensis.name')
        ->get();

    return view('dashboard.index', compact(
        'kopetensis',
        'colors',
        'hadirData',
        'uniqueDates',
        'kopetensisChart',
        'izinData',
        'sakitData'
    ));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kopetensi = Kopetensi::where("id", $id)->with(["kelas"])->first();

        if (!$kopetensi) {
            abort(404, "Kopetensi tidak ditemukan.");
        }
    
        return view("kopetensi.show", [
            "kelas" => $kopetensi->kelas,  // relasi kelas di kopetensi
            "kopetensi" => $kopetensi
        ]);
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
