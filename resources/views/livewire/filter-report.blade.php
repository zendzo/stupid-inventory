<form wire:submit.prevent="searchQuery">
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Tanggal Awal</label>
            <input type="text" class="form-control dateRange 
            @error('start_date') is-invalid @enderror" wire:model="start_date" autocomplete="off"
                data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd"
                data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))" />
            @error('start_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Tanggal Akhir</label>
            <input type="text" class="form-control dateRange 
            @error('end_date') is-invalid @enderror" wire:model="end_date" autocomplete="off" data-provide="datepicker"
                data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"
                onchange="this.dispatchEvent(new InputEvent('input'))" />
            @error('end_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            @if ($page === 'purchase')
            <label for="">Tipe</label>
                <select class="form-control @error('type') is-invalid @enderror" wire:model.lazy="type">
                    <option value="all">Select</option>
                    @foreach ($purchasesType as $type)
                    <option value="{{$type->id}}">{{$type->name}} - ({{ $type->description }})</option>
                    @endforeach
                </select>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            @elseif($page === 'sales')
            <label for="">Tipe</label>
                <select class="form-control @error('type') is-invalid @enderror" wire:model.lazy="type">
                    <option value="all">Select</option>
                    @foreach ($salesType as $type)
                    <option value="{{$type->id}}">{{$type->name}} - ({{ $type->description }})</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>

</div>
<div class="form-footer pt-5 border-top">
    <button wire:click="searchQuery" class="btn btn-primary btn-default">
        <div wire:loading.class="sk-wave" wire:target="searchQuery">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div wire:loading.remove wire:target="searchQuery">
            <i class="mdi mdi-feature-search-outline"></i> Cari
        </div>
    </button>
</div>
</form>