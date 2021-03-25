<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Pembelian</h2>
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

                    @if ($editPurchases)
                    <livewire:purchase-edit></livewire:purchase-edit>
                    @else
                    <livewire:purchase-create></livewire:purchase-create>
                    @endif
                    
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Tgl. Pesan</th>
                                <th scope="col">Tgl. Terima</th>
                                <th scope="col">Keterangan</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                            <tr>
                                <td scope="row">{{$purchase->id}}</td>
                                <td>{{$purchase->supplier->name}}</td>
                                <td>{{$purchase->purchase_type_id}}</td>
                                <td>{{$purchase->code}}</td>
                                <td>{{$purchase->purchase_date}}</td>
                                <td>{{$purchase->sent_date}}</td>
                                <td>{{Str::limit($purchase->description,10)}}</td>
                                <td></td>
                                <td>
                                    <button wire:click="getPurchases({{$purchase->id}})" class="btn btn-sm btn-info text-white">Edit</button>
                                    {{-- <button wire:click="destroy({{$purchase->id}})" class="btn btn-sm btn-danger text-white">Delete</button> --}}
                                    <a href="{{ route('admin.purchases.show', $purchase->id) }}" wire:click="getPurchases({{ $purchase->id }})" type="a" class="mb-1 btn btn-sm btn-success">
                                        <i class=" mdi mdi-checkbox-marked-outline mr-1"></i> Process
                                    </a>
                                    @if ($purchase->products->count() > 0)
                                        <a href="{{ route('admin.purchase.invoice', $purchase->id) }}" wire:click="showPurchases" type="button"
                                            class="mb-1 btn btn-sm btn-warning">
                                            <i class=" mdi mdi-file-document"></i> Invoice
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $purchases->links() }}
                </div>
            </div>
        </div
    </div>
</div>
