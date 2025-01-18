@extends('layouts.template')
@section('judulh1', 'Admin - Edit Product')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Data Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('datapelatihan.update', $datapelatihan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama data pelatihan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $datapelatihan->nama }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $datapelatihan->nik }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $datapelatihan->alamat }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $datapelatihan->no_hp }}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
