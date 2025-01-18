@extends('layouts.template')
@section('judulh1','Admin - Product')

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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pelatihan.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="nama_pelatihan">nama pelatihan </label>
                    <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" placeholder="">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="status">Status</label><br>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="status_aktif" name="status" value="aktif">
                        <label class="form-check-label" for="status_aktif">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="status_tidak_aktif" name="status" value="tidak aktif">
                        <label class="form-check-label" for="status_tidak_aktif">Tidak Aktif</label>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
