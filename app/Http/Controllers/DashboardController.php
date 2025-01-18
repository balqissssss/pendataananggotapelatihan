<?php

namespace App\Http\Controllers;

use App\Models\Datapelatihan;
use App\Models\pelatihan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelatihan = pelatihan::count();
        $totalAdmins = User::all()->count();
        $totalPeserta = Datapelatihan::count();
        $totalLaporan = Datapelatihan::count();
        $latestPelatihan = Datapelatihan::latest()->paginate(5);

        return view('dashboard',[
            'totalPelatihan'=> $totalPelatihan,
            'totalAdmins'=> $totalAdmins,
            'totalPeserta'=> $totalPeserta,
            'totalLaporan'=> $totalLaporan,
            'latestPelatihan'=> $latestPelatihan,
            "title" => "dahsboard",
        ]);
    }
}
