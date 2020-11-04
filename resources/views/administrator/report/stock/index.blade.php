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
          });
        });
</script>
@endsection

@section('content')
<!-- First Row  -->
<div class="row">
  <div class="col-md-6 col-lg-6 col-xl-6">
    <div class="media widget-media p-4 rounded bg-white border">
      <i class="mdi mdi-cart-outline text-warning mr-4"></i>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">{{ array_sum($purchaseProducts) }}</h4>
        <p>(Pembelian) Barang Masuk</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-6">
    <div class="media widget-media p-4 rounded bg-white border">
      <i class="mdi mdi-cart-outline text-danger mr-4"></i>
      <div class="media-body align-self-center">
        <h4 class="text-primary mb-2">{{ array_sum($saleProducts) }}</h4>
        <p>(Penjualan) Barang Keluar</p>
      </div>
    </div>
  </div>
</div>

<livewire:stock-report></livewire:stock-report>
@endsection