<div>
    <form class="horizontal-form" wire:submit.prevent="addProduct">
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Category</label>
            </div>
            <div class="col-12 col-md-9">
                <select wire:model.lazy="category_id" class="form-control">
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
                <label for="name">Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" placeholder="Enter Category Name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Code</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('code') is-invalid @enderror" wire:model.lazy="code" placeholder="Enter Code Name">
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="">Description</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control @error('description') is-invalid @enderror"  wire:model.lazy="description" placeholder="Category Description">
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Unit</label>
            </div>
            <div class="col-12 col-md-9">
                <select wire:model.lazy="unit_id" class="form-control">
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
