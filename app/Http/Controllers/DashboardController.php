<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $mahasiswaProdi = DB::table('mahasiswa AS m')
                ->join('prodi AS p', 'm.prodi_id', '=', 'p.id')
                ->select('p.nama', DB::raw('COUNT(m.id) AS jumlah'))
                ->groupBy('p.nama')
                ->get();

            return view('dashboard.admin', compact('mahasiswaProdi'));
        } elseif ($user->role === 'dosen') {
            // Data khusus dosen, misal: matakuliah yang diampu
            $matakuliahDosen = DB::table('matakuliahs AS mk')
                ->join('dosen_matakuliah AS dm', 'mk.id', '=', 'dm.matakuliah_id')
                ->where('dm.dosen_id', $user->id)
                ->select('mk.nama', 'mk.kode_mk')
                ->get();

            return view('dashboard.dosen', compact('matakuliahDosen'));
        } else {
            abort(403, 'Unauthorized');
        }
    }
}