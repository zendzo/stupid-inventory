<div>
    <table class="table table-border">
        <tbody>
            <tr>
                <td>
                    <select wire:model="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        <option value="-1">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </td>
                <td>
                    <input type="text" wire:model="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity">
                    @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </td>
                <td>
                    <input type="text" wire:model="unit" class="form-control" disabled>
                </td>
                <td>
                    <input type="text" wire:model="price" class="form-control" disabled>
                </td>
                <td>
                    <input type="text" wire:model="grand_total" class="form-control" disabled>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <button wire:click="addEntry" class="btn btn-outline-success">
                        <div wire:loading.class="sk-wave" wire:target="addEntry">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                        <div wire:loading.remove wire:target="addEntry">
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </button>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>