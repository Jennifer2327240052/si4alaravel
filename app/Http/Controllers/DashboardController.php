<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaProdi = DB::table('mahasiswa AS m') 
            ->join('prodi AS p', 'm.prodi_id', '=', 'p.id') 
            ->select('p.nama', DB::raw('COUNT(m.id) AS jumlah')) 
            ->groupBy('p.nama') 
            ->get(); 

        return view('dashboard.index', compact('mahasiswaProdi'));
    }
}