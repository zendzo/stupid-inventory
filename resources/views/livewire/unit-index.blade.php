<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Satuan</h2>
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

                    @if ($editUnit)
                    <livewire:unit-edit></livewire:unit-edit>
                    @else
                    <livewire:unit-create></livewire:unit-create>
                    @endif
                    <hr>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <td scope="row">{{$unit->id}}</td>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->symbol}}</td>
                                <td>
                                    <button wire:click="getUnit({{$unit->id}})" class="btn btn-sm btn-info text-white">Edit</button>
                                    <button wire:click="destroy({{$unit->id}})" class="btn btn-sm btn-danger text-white">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $units->links() }}
                </div>
            </div>
        </div
    </div>
</div>
