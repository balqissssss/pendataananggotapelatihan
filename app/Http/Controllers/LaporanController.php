<?php

namespace App\Http\Controllers;

use App\Models\Datapelatihan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
    $bulan = $request->get('bulan');

    $query = Datapelatihan::whereYear('tanggal', $tahun);
    if (!empty($bulan)) {
        $query->whereMonth('tanggal', $bulan);
    }

    $pelatihan = $query->get();
//         $pelatihan = Datapelatihan::all();
// $pelatihan = Datapelatihan::withCount('pelatihan')->get();

        return view('laporan.index', [
            'pelatihan' => $pelatihan,
            'title' => 'Laporan'
        ]);
    }
}
