@extends('layouts.sleek.main')

@section('styles')
    <link href="{{ asset('admin/assets/plugins/datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('admin/assets/plugins/data-tables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Imported scripts on this page -->
{{-- <script src="{{ asset('admin/assets/plugins/data-tables/dataTables.bootstrap.js') }}"></script> --}}
<script src="{{ asset('admin/assets/plugins/data-tables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/data-tables/tabletools/dataTables.tableTools.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/assets/plugins/data-tables/tabletools/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/plugins/data-tables/tabletools/vfs_fonts.js') }}"></script>

<script>
    jQuery(document).ready(function() {
          jQuery('input.dateRange').datepicker({
            format: 'yyyy-mm-dd',
            orientation: 'bottom',
          });
        });
</script>
<script>
  jQuery(document).ready(function() {
    jQuery('#basic-data-table').DataTable({
    searching: true,
    responsive: true,
    "aaSorting" : [[0,"desc"]],
    dom: 'Bfrtip',
    buttons: [
    {
    extend:'copy',
    attr: { id: 'allan' },
    text: '<i class="mdi mdi-content-copy"></i> Copy',
    titleAttr: 'Copy rows to clipboard',
    exportOptions: {
    columns: [0,1,2,3,4,5,6,7]
    }
    },
    {
    extend: 'pdfHtml5',
    orientation: 'landscape',
    pageSize: 'LEGAL',
    messageTop: 'Data Order Report',
    title: 'Data Order ' + '{{ config('app.name') }}',
    text: '<i class="mdi mdi-file-pdf"></i> PDF',
    titleAttr: 'Export rows to PDF format',
    exportOptions: {
    columns: [0,1,2,3,4,5,6,7]
    },
    },
    {
    extend: 'csvHtml5',
    text: '<i class="mdi mdi-code-tags"></i> CSV',
    titleAttr: 'Export rows to CSV format',
    exportOptions: {
    columns: [0,1,2,3,4,5,6,7]
    },
    title: 'Data Order ' + '{{ config('app.name') }}'
    },
    {
    extend: 'excelHtml5',
    text: '<i class="mdi mdi-file-excel"></i> Excel',
    titleAttr: 'Export rows to Excel format',
    exportOptions: {
    columns: [0,1,2,3,4,5,6,7]
    },
    title: 'Data Order ' + '{{ config('app.name') }}'
    },
    {
    extend: 'print',
    text: '<i class="mdi mdi-printer"></i> Print',
    titleAttr: 'Print rows',
    exportOptions: {
    columns: [0,1,2,3,4,5,6,7]
    },
    title: 'Data Order ' + '{{ config('app.name') }}'
    },
    ]
    });
  });
</script>
@endsection

@section('content')
<livewire:sales-report></livewire:sales-report>
@endsection