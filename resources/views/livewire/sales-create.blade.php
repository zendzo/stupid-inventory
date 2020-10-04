<div class="card card-default">
    <div class="card-header bg-success card-header-border-bottom">
        <h2>Sales Detail</h2>
    </div>
    <div class="card-body">
        {{-- <form wire:submit.prevent="addSales"> --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Pembeli</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" placeholder="John">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="lname">Kode Penjualan</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" wire:model.lazy="code" placeholder="CODE">
                    @error('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group>
                        <label for="city">Tipe</label>
                        <select class="form-control @error('name') is-invalid @enderror" wire:model.lazy="sale_type">
                            <option value="-1">Select</option>
                            <option value="1">Langsung</option>
                            <option value="2">Antar</option>
                        </select>
                        @error('sale_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="State">Tgl. Penjualan</label>
                                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" wire:model.lazy="sale_date" placeholder="DD-MM-YYY">
                                @error('sale_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Zip">Tgl. Pengiriman</label>
                                <input type="text" class="form-control @error('sent_date') is-invalid @enderror" wire:model.lazy="sent_date" placeholder="DD-MM-YYY">
                                @error('sent_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                    <label for="lname">Keterangan</label>
                    <input type="text" class="form-control @error('sent_date') is-invalid @enderror" wire:model.lazy="description" placeholder="Keterangan">
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="form-footer pt-5 border-top">
                <button wire:click="addSales" class="btn btn-primary btn-default">
                    <div wire:loading.class="sk-wave">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                    <div wire:loading.remove>
                        Save
                    </div>
                </button>
            </div>
        {{-- </form> --}}
    </div>
</div>