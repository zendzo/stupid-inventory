<div>
    @if (session()->has('message'))
    <div class="alert alert-dismissible fade show alert-{{strpos(session('message'), 'Deleted') ? 'danger':'success'}}" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <table class="table table-hover ">
        <thead class="table-warning">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Qty</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th colspan="2">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grand_total = [];
            @endphp
            @foreach ($products as $product)
            @php
                array_push($grand_total, $product->pivot->grand_total)
            @endphp
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity ?? ''}}</td>
                <td>{{$product->unit->symbol}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->pivot->grand_total ?? ''}}</td>
                <td><button wire:click="destroy({{$product->pivot->id ?? ''}})" class="btn btn-sm btn-danger text-white"><i class="mdi mdi-trash-can"></i></button></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><h4 class="pull-right">Grand Total</h4></td>
                <td colspan="1"><h4>{{ array_sum($grand_total) }}</h4></td>
            </tr>
        </tfoot>
    </table>
</div>
