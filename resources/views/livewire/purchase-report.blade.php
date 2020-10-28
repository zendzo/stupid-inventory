<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2><i class="mdi mdi-cart"></i> Laporan Pembelian </h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-dismissible fade show alert-{{strpos(session('message'), 'Deleted') ? 'danger':'success'}}"
                        role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

                    <livewire:filter-report :page="$page"></livewire:filter-report>

                    <hr>
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
                            @foreach ($purchases as $purchase)
                            <tr>
                                <td scope="row">{{$purchase->id}}</td>
                                <td>{{$purchase->supplier->name}}</td>
                                <td>{{$purchase->type->name}}</td>
                                <td>{{$purchase->code}}</td>
                                <td>{{$purchase->purchase_date}}</td>
                                <td>{{$purchase->sent_date}}</td>
                                <td>{{Str::limit($purchase->description,10)}}</td>
                                <td>
                                    <ul>
                                        @php $grand_total = 0; @endphp
                                        @foreach($purchase->products as $product)
                                        <li>
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
                                        {{ number_format($grand_total+($grand_total*0.1),2,',','.') }}</b>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>