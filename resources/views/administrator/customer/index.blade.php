@extends('layouts.sleek.main')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Customer List</div>
        <div class="card-body">
          <table class="table table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Kode</th>
                <th scope="col">Tgl. Penjualan</th>
                <th scope="col">Tgl. Pengiriman</th>
                <th scope="col">Keterangan</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sales as $sale)
              <tr>
                <td scope="row">{{$sale->id}}</td>
                <td>
                  <a href="{{ route('admin.sales.invoice', $sale->id) }}" class="mb-1 btn btn-sm btn-warning">
                    <i class=" mdi mdi-account-circle"></i> {{$sale->name}}</td>
                  </a>
                <td>{{$sale->type->name}}</td>
                <td>{{$sale->code}}</td>
                <td>{{$sale->sale_date}}</td>
                <td>{{$sale->sent_date}}</td>
                <td>{{Str::limit($sale->description,10)}}</td>
                <td>
                    <ul>
                      @php $grand_total = 0; @endphp
                      @foreach($sale->products as $product)
                      <li> <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                        {{$product->name}} <b>@</b> ({{ $product->pivot->quantity }}
                        {{ $product->unit->name }}) <b>Rp.
                          {{ number_format($product->pivot->grand_total,2,',','.') }}</b>
                      </li>
                      @php
                      $grand_total = $grand_total + $product->pivot->grand_total;
                      @endphp
                      @endforeach
                    </ul>
                    <b>Grand Total + PPN 10% : Rp.
                      {{ number_format($grand_total+($grand_total*0.1),2,',','.') }}
                    </b>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $sales->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection