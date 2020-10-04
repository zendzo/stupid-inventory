<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Sales</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-dismissible fade show alert-{{strpos(session('message'), 'Deleted') ? 'danger':'success'}}" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

                    @if ($editSales)
                    <livewire:category-edit></livewire:category-edit>
                    @else
                    <livewire:sales-create></livewire:sales-create>
                    @endif
                    
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                            <tr>
                                <td scope="row">{{$sale->id}}</td>
                                <td>{{$sale->name}}</td>
                                <td>{{$sale->sale_type}}</td>
                                <td>{{$sale->code}}</td>
                                <td>{{$sale->sale_date}}</td>
                                <td>{{$sale->sent_date}}</td>
                                <td>{{Str::limit($sale->description,10)}}</td>
                                <td>
                                    <button wire:click="getCategory({{$sale->id}})" class="btn btn-sm btn-info text-white">Edit</button>
                                    <button wire:click="destroy({{$sale->id}})" class="btn btn-sm btn-danger text-white">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sales->links() }}
                </div>
            </div>
        </div
    </div>
</div>
