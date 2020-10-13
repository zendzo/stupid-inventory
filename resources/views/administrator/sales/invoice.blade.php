@extends('layouts.sleek.main')

@section('content')
    <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
      <div class="d-flex justify-content-between">
        <h2 class="text-dark font-weight-medium">Invoice #{{$sales->id}}</h2>
        <div class="btn-group">
          <button class="btn btn-sm btn-secondary">
            <i class="mdi mdi-printer"></i> Print</button>
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-xl-3 col-lg-4">
          <p class="text-dark mb-2">From</p>
          <address>
            {{ env('APP_NAME')}}
            <br> {{env('APP_ADDRESS')}}
            <br> Email: {{env('APP_EMAIL')}}
            <br> Phone: {{env('APP_PHONE')}}
          </address>
        </div>
        <div class="col-xl-3 col-lg-4">
          <p class="text-dark mb-2">Details</p>
          <address>
            Invoice ID:
            <span class="text-dark">#{{$sales->id}}</span>
            <br> {{ $sales->created_at->format('D, d-M-Y')}}
          </address>
        </div>
      </div>
      <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Item</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Cost</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @php
          $grand_total = [];
          @endphp
        @foreach ($sales->products as $key => $product)
          @php
          array_push($grand_total, $product->pivot->grand_total)
          @endphp
          <tr>
            <td>{{$key += 1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->pivot->quantity ?? ''}}</td>
            <td>{{$product->unit->symbol}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->pivot->grand_total ?? ''}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="row justify-content-end">
        <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
          <ul class="list-unstyled mt-4">
            {{-- <li class="mid pb-3 text-dark"> Subtotal
              <span class="d-inline-block float-right text-default">{{ array_sum($grand_total) }}</span>
            </li> --}}
            {{-- <li class="mid pb-3 text-dark">Vat(10%)
              <span class="d-inline-block float-right text-default">$789,70</span>
            </li> --}}
            <li class="pb-3 text-dark">Grand Total
              <span class="d-inline-block float-right">{{ array_sum($grand_total) }}</span>
            </li>
          </ul>
          <a href="#" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Procced to Payment</a>
        </div>
      </div>
    </div>
@endsection