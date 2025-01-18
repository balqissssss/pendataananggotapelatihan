@extends('layouts.template')

@section('judulh1', 'Laporan/Rekap Data Pelatihan')

@section('konten')


<!-- Rekap Data Pelatihan -->
<div class="col-md-12">
    <div class="card card-info">    <div class="card-header">
        <h3 class="card-title">Rekap Data Pelatihan</h3>
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
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
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
    $(document).ready(function() {
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
