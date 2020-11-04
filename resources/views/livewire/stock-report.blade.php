<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2><i class="mdi mdi-truck-fast"></i> Laporan Stock </h2>
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

                    <livewire:filter-stock></livewire:filter-stock>
                    
                    <hr>
                    <table class="table table-hover ">
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
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($type === '2')
                            @foreach ($results as $result)
                            @foreach ($result->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->purchase[0]->type->name }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.purchases.show', $product->purchase[0]->id) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        {{ $product->purchase[0]->code }}
                                    </a>
                                </td>
                                <td>{{ $product->purchase[0]->purchase_date }}</td>
                                <td>{{ $product->purchase[0]->sent_date }}</td>
                                <td>{{ $product->purchase[0]->description }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->grand_total }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                            @elseif($type === '1')
                            @foreach ($results as $result)
                            @foreach ($result->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->sales[0]->type->name }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sales.show', $product->sales[0]->id) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        {{ $product->sales[0]->code }}
                                    </a>
                                </td>
                                <td>{{ $product->sales[0]->sale_date }}</td>
                                <td>{{ $product->sales[0]->sent_date }}</td>
                                <td>{{ $product->sales[0]->description }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->grand_total }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>