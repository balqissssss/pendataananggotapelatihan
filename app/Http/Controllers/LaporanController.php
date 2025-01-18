<?php

namespace App\Http\Controllers;

use App\Models\Datapelatihan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pelatihan = Datapelatihan::all();
$pelatihan = Datapelatihan::withCount('pelatihan')->get();

        return view('laporan.index', [
            'pelatihan' => $pelatihan,
            'title' => 'Laporan'
        ]);
    }
}
