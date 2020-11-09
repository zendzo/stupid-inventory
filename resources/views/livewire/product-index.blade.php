<div class="row">
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Product List</h2>
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

            @if ($editProduct)
            <livewire:product-edit></livewire:product-edit>
            @else
            <livewire:product-create></livewire:product-create>
            @endif
            <hr>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Category</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td scope="row">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->unit->symbol}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <button wire:click="getProduct({{$product->id}})"
                                class="btn btn-sm btn-info text-white">Edit</button>
                            <button wire:click="destroy({{$product->id}})"
                                class="btn btn-sm btn-danger text-white">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links() }}
        </div>
    </div>
</div