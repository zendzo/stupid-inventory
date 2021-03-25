<div>
    <form class="horizontal-form" wire:submit.prevent="addProduct">
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Kategori</label>
            </div>
            <div class="col-12 col-md-9">
                <select wire:model.lazy="category_id" 
                class="form-control 
                @error('category_id') is-invalid @enderror
                ">
                    <option value="-1">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Nama</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" placeholder="Nama Produk">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Harga</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('price') is-invalid @enderror" wire:model.lazy="price" placeholder="Harga Produk">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="quantity">Kuantitas</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="quantity" class="form-control @error('quantity') is-invalid @enderror" wire:model.lazy="quantity"
                    placeholder="Harga Produk">
                @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="code">Kode</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="code" class="form-control @error('code') is-invalid @enderror" wire:model.lazy="code" placeholder="Kode Produk">
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="">Deskripsi</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control @error('description') is-invalid @enderror"  wire:model.lazy="description" placeholder="Deskripsi Produk">
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Satuan</label>
            </div>
            <div class="col-12 col-md-9">
                <select wire:model.lazy="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                    <option value="-1">Pilih Satuan</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}" {{ $loop->first ? 'selected':'' }}>{{ $unit->symbol }} - ({{$unit->name}})</option>
                    @endforeach
                </select>
                @error('unit_id')
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
