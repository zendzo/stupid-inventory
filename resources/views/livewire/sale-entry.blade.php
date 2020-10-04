<div>
    <table class="table table-border">
        <tbody>
            <tr>
                <td>
                    <select wire:model="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" wire:click="getProduct({{ $product->id }})">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" wire:model="quantity" class="form-control" placeholder="Quantity">
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <button wire:click="updateSales" class="btn btn-outline-success">
                        <div wire:loading.class="sk-wave" wire:target="updateSales">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                        <div wire:loading.remove wire:target="updateSales">
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </button>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>