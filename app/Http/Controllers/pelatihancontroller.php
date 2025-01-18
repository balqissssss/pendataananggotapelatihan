<?php

namespace App\Http\Controllers;

use App\Models\datapelatihan;
use App\Models\pelatihan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class pelatihancontroller extends Controller
{
    //
    public function index(){
        $pelatihan=pelatihan::all();
        return view('pelatihan.index',[
            "title"=>"pelatihan",
            "pelatihan"=>$pelatihan
        ]);
    }

    public function create():View{
        $user=User::all();
        $datapelatihan=datapelatihan::all();
        return view('pelatihan.create')->with([
            "title"=>"Tambah Data pelatihan",
            "user"=>$user,
            "datapelatihan"=>$datapelatihan
        ]);
    }

    public function store(Request $request):RedirectResponse{

        $request->validate([
            "nama_pelatihan"=>"required",
            "status"=>"required",

        ]);
        pelatihan::create($request->all());
        return redirect()->route('pelatihan.index')->with('success','Data pelatihan Berhasil Ditambahkan');
    }
    public function edit(pelatihan $pelatihan){
        return view('pelatihan.edit')->with([
            "title"=>"Edit Data pelatihan",
            "pelatihan"=>$pelatihan
        ]);
    }

    public function update(pelatihan $pelatihan,Request $request):RedirectResponse{
        $request->validate([
            "nama_pelatihan"=>"required",
            "status"=>"required",
        ]);
        $pelatihan->update($request->all());
        return redirect()->route('pelatihan.index')->with('updated','Data pelatihan Berhasil Diubah');
    }


    public function destroy($id):RedirectResponse
    {

        pelatihan::where('id',$id)->delete();
        return redirect()->route('pelatihan.index')->with('deleted','Data pelatihan Berhasil Dihapus');
    }
}
