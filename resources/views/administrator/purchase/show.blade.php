@extends('layouts.sleek.main')

@section('content')
<div class="card card-default">
  <div class="card-header bg-warning card-header-border-bottom">
      <h2>Purchase Detail</h2>
  </div>
  <div class="card-body">
      {{-- <form wire:submit.prevent="addSales"> --}}
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="name">Distributor</label>
                      <select disabled class="form-control">
                          <option>{{ $purchase->supplier->name }}</option>
                      </select>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lname">Kode Penjualan</label>
                  <input disabled type="text" class="form-control" value="{{ $purchase->code }}">
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group>
                      <label for="city">Tipe</label>
                      <select disabled class="form-control">
                        <option>{{ $purchase->purchaseType->name }} - ({{$purchase->purchaseType->description}})</option>
                      </select>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="row">
                      <div class="col-6">
                          <div class="form-group">
                              <label for="State">Tgl. Pesan</label>
                              <input disabled type="text" class="form-control"
                              value="{{ $purchase->purchase_date }}"
                              >
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label for="Zip">Tgl. Terima</label>
                              <input disabled type="text" class="form-control"
                              value="{{$purchase->sent_date}}"
                              >
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lname">Keterangan</label>
                  <input disabled type="text" class="form-control"
                  value="{{ $purchase->description }}"
                  >
                  </div>
              </div>
          </div>
          <livewire:purchase-list :purchaseId="$purchase->id"></livewire:purchase-list>
              <livewire:purchase-entry :purchaseId="$purchase->id"></livewire:purchase-entry>
            @if (Auth::user()->role_id === 1)
                <a href="{{ route('admin.purchase.invoice', $purchase->id) }}" class="btn btn-lg btn-warning">
                    <i class=" mdi mdi-file-document"></i> Invoice
                </a>
            @else
                <a href="{{ route('cashier.purchase.invoice', $purchase->id) }}" class="btn btn-lg btn-warning">
                    <i class=" mdi mdi-file-document"></i> Invoice
                </a>
            @endif
      {{-- </form> --}}
  </div>
</div>
@endsection