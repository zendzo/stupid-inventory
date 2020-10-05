@extends('layouts.sleek.main')

@section('content')
<div>
  <div class="row">
      <div class="col-lg-12">
          <div class="card card-secondary">
              <div class="card-header bg-info card-header-border-bottom">
                  <h2>Sales</h2>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="name">Pembeli</label>
                          <input type="text" class="form-control placeholder="John" value="{{ $sales->name }}">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                      <label for="lname">Kode Penjualan</label>
                      <input type="text" class="form-control placeholder="CODE" value="{{ $sales->code }}">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group>
                          <label for="city">Tipe</label>
                          <select class="form-control">
                              <option value="-1">Select</option>
                              <option value="1">Langsung</option>
                              <option value="2">Antar</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="State">Tgl. Penjualan</label>
                                  <input type="text" class="form-control" placeholder="DD-MM-YYY" value="{{ $sales->sale_date }}">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="Zip">Tgl. Pengiriman</label>
                                  <input type="text" class="form-control" placeholder="DD-MM-YYY" value="{{ $sales->sent_date }}">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="lname">Keterangan</label>
                      <input type="text" class="form-control" placeholder="Keterangan" value="{{ $sales->description }}">
                      </div>
                  </div>
              </div>
                <livewire:sale-list :salesId="$sales->id"></livewire:sale-list>
                <livewire:sale-entry :salesId="$sales->id"></livewire:sale-entry>
              </div>
          </div>
      </div
  </div>
</div>
@endsection