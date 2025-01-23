<?php

namespace App\Http\Controllers;
use App\Models\pelatihan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\datapelatihan;
use Illuminate\Http\RedirectResponse;

class datapelatihancontroller extends Controller
{
    //
    public function index(): View
    {
        $datapelatihan = datapelatihan::all();
        return view('datapelatihan.index', [
            "title" => "datapelatihan",
            "datapelatihan" => $datapelatihan
        ]);
    }

    public function create(): View
    {
        $pelatihan = pelatihan::where("status","=","aktif")->get();
        return view('datapelatihan.create')->with([
            "title" => "Tambah Data datapelatihan",
            "pelatihan"=> $pelatihan
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "pelatihan_id"=> "required",
            "nama" => "required",
            "nik" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal" => "required",

        ]);
        datapelatihan::create([
            "user_id" => auth()->user()->id,
            "pelatihan_id"=> $request->pelatihan_id,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tanggal" => $request->tanggal,
        ]);
        return redirect()->route('datapelatihan.index')->with('success', 'Data datapelatihan Berhasil Ditambahkan');
    }

    public function edit(datapelatihan $datapelatihan): View
    {
        $pelatihan = pelatihan::where("status","=","aktif")->get();
        return view('datapelatihan.edit', compact('datapelatihan'))->with([
            "title" => "Ubah Data datapelatihan",
            "pelatihan" => $pelatihan
        ]);
    }

    public function update(datapelatihan $datapelatihan, Request $request): RedirectResponse
    {
        $request->validate([
            "pelatihan_id"=> "required",
            "nama" => "required",
            "nik" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal" => "required",
        ]);

        $datapelatihan->update([
            "user_id" => auth()->user()->id,
            "pelatihan_id"=> $request->pelatihan_id,
            "nama" => $request->nama,
            "nik" => $request->nik,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tanggal" => $request->tanggal,
        ]);
        return redirect()->route('datapelatihan.index')->with('updated', 'Data datapelatihan Berhasil Diubah');
    }

    // public function show($id): View
    // {
    //     $datapelatihan = datapelatihan::findOrFail($id);
    //     return view('datapelatihan.show')->with([
    //         "title" => "Detail datapelatihan",
    //         "data" => $datapelatihan
    //     ]);
    // }

    public function destroy($id): RedirectResponse
    {
        datapelatihan::where('id', $id)->delete();
        return redirect()->route('datapelatihan.index')->with('deleted', 'Data datapelatihan Berhasil Dihapus');
    }
}
