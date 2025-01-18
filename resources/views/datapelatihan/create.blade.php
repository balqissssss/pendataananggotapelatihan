@extends('layouts.template')
@section('judulh1', 'Admin - Product')

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
            <form action="{{ route('datapelatihan.store') }}" method="POST">
                @csrf

                <div class=" card-body">
                    <div class="form-group">
                        <label for="nama">Nama anggota</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="pelatihan_id"> admin</label>
                        <select class="form-control" name="pelatihan_id">
                            @foreach ($pelatihan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_pelatihan }}</option>
                            @endforeach
                        </select>
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
