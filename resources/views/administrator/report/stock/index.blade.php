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

<div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2><i class="mdi mdi-truck-fast"></i> Laporan Stock </h2>
        </div>
        <div class="card-body">
          @if (session()->has('message'))
          <div
            class="alert alert-dismissible fade show alert-{{strpos(session('message'), 'Deleted') ? 'danger':'success'}}"
            role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          @endif

          @if (Auth::user()->role_id === 1)
              <form action="{{ route('admin.report.stock.by-date') }}" method="POST">
          @else
              <form action="{{ route('secertary.report.stock.by-date') }}" method="POST">
          @endif
            @csrf
            @method('POST')
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">Tanggal Awal</label>
                  <input type="text" class="form-control dateRange 
                                @error('start_date') is-invalid @enderror" name="start_date" value="{{ $start_date }}"
                    autocomplete="off" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd"
                    data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))" />
                  @error('start_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">Tanggal Akhir</label>
                  <input type="text" class="form-control dateRange 
                                @error('end_date') is-invalid @enderror" name="end_date" value="{{ $end_date }}"
                    autocomplete="off" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd"
                    data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))" />
                  @error('end_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Jenis</label>
                  <select class="form-control @error('type') is-invalid @enderror" name="type">
                    <option value="">Select</option>
                    <option value="1">Sale</option>
                    <option value="2">Purchase</option>
                  </select>
                </div>
              </div>
          
            </div>
            <div class="form-footer pt-5 border-top">
              <button class="btn btn-primary btn-default">
                <div>
                  <i class="mdi mdi-feature-search-outline"></i> Cari
                </div>
              </button>
            </div>
          </form>

          <hr>
          <table class="table table-hover " id="basic-data-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tipe</th>
                <th scope="col">Kode</th>
                <th scope="col">Tgl. Penjualan</th>
                <th scope="col">Tgl. Pengiriman</th>
                <th scope="col">Keterangan</th>
                <th>Quantity</th>
                <th scope="col">Stok Gudang</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @if ($type === '2')
              @forelse ($results as $result)
                @foreach ($result->products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>
                    {{ $product->purchase[0]->type->name }}
                  </td>
                  <td>
                    <a href="{{ route('admin.purchases.show', $product->purchase[0]->id) }}" target="_blank"
                      rel="noopener noreferrer">
                      {{ $product->purchase[0]->code }}
                    </a>
                  </td>
                  <td>{{ $product->purchase[0]->purchase_date }}</td>
                  <td>{{ $product->purchase[0]->sent_date }}</td>
                  <td>{{ $product->purchase[0]->description }}</td>
                  <td>{{ $product->pivot->quantity }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->pivot->grand_total }}</td>
                </tr>
                @endforeach
              @empty
              <tr>
                <td colspan="9">No Data Available</td>
              </tr>
              @endforelse
              @elseif($type === '1')
              @forelse ($results as $result)
                @foreach ($result->products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>
                    {{ $product->sales[0]->type->name }}
                  </td>
                  <td>
                    <a href="{{ route('admin.sales.show', $product->sales[0]->id) }}" target="_blank"
                      rel="noopener noreferrer">
                      {{ $product->sales[0]->code }}
                    </a>
                  </td>
                  <td>{{ $product->sales[0]->sale_date }}</td>
                  <td>{{ $product->sales[0]->sent_date }}</td>
                  <td>{{ $product->sales[0]->description }}</td>
                  <td>{{ $product->pivot->quantity }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->pivot->grand_total }}</td>
                </tr>
                @endforeach
              @empty
              <tr>
                <td colspan="9">No Data Available</td>
              </tr>
              @endforelse
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection