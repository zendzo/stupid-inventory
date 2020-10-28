@extends('layouts.sleek.main')

@section('styles')
    <link href="{{ asset('admin/assets/plugins/datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    jQuery(document).ready(function() {
          jQuery('input.dateRange').datepicker({
            format: 'yyyy-mm-dd',
            orientation: 'bottom',
          });
        });
</script>
@endsection

@section('content')
<livewire:sales-report></livewire:sales-report>
@endsection