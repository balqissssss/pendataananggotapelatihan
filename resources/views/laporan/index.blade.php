@extends('layouts.template')

@section('judulh1', 'Laporan/Rekap Data Pelatihan')

@section('konten')
<div class="col-md-12">
    <!-- Pemberitahuan -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif


    <!-- Rekap Data Pelatihan -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Laporan</h3>
            <form method="GET" action="{{ route('laporan.index') }}" class="form-inline float-right">
                <div class="form-group">
                    <label for="tahun" class="mr-2">Pilih Tahun:</label>
                    <select name="tahun" id="tahun" class="form-control">
                        @foreach(range(date('Y'), date('Y') - 10) as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-3">
                    <label for="bulan" class="mr-2">Pilih Bulan:</label>
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Semua Bulan</option>
                        @foreach(range(1, 12) as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ml-2">Cari</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama peserta</th>
                            <th>dibuat oleh</th>
                            <th>Tanggal Pelatihan</th>
                            <th>Nama Pelatihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pelatihan->nama_pelatihan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->
@endsection

@section('tambahanJS')
<!-- DataTables & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

@section('tambahScript')
<script>
    $(document).ready(function () {
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        @if ($message = Session::get('success'))
            toastr.success("{{ $message }}");
        @elseif ($message = Session::get('updated'))
            toastr.warning("{{ $message }}");
        @elseif ($message = Session::get('deleted'))
            toastr.error("{{ $message }}");
        @endif
    });
</script>
@endsection
