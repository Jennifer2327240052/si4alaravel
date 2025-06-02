<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiwaprodi = DB::select('
            select prodi.nama, count(*) as jumlah From mahasiswa
            JOIN prodi ON mahasiswa.
            prodi_id = prodi_id
            GROUP BY prodi.nama'
        );

        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}

