<div>
    <form class="horizontal-form" wire:submit.prevent="updateSupplier">
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Nama</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" placeholder="Nama Distributor">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="address">Alamat</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" wire:model.lazy="address" placeholder="Alamat Distributor">
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="phone">Hp. No</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" wire:model.lazy="phone" placeholder="Kontak Distributor">
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="status">Status</label>
            </div>
            <div class="col-12 col-md-9">
                <select id="status" class="form-control" wire:model.lazy="status">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="">Diskripsi</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control @error('description') is-invalid @enderror"  wire:model.lazy="description" placeholder="Diskripsi">
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-footer pt-5 border-top">
            <button type="submit" class="btn btn-primary btn-default">Save</button>
        </div>
    </form>
</div>
