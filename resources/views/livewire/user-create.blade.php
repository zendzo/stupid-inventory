<div>
    <form class="horizontal-form" wire:submit.prevent="addUser">
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="name">Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" placeholder="Enter User Name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="">Email</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control @error('email') is-invalid @enderror"  wire:model.lazy="email" placeholder="User Description">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="role_id">Role</label>
            </div>
            <div class="col-12 col-md-9">
                <select class="form-control" name="role_id" id="role_id" wire:model.lazy="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-3 text-right">
                <label for="">Password</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.lazy="password"
                    placeholder="User Password">
                @error('password')
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
