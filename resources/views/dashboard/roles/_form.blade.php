<div class="row">

    <div class="col-12">
        <x-form-input label="Name" id="name" name="name" :value="$role->name" required/>
    </div>

    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label class="form-label" for="permissions">Permissions</label>
            </div>
            <div class="col-sm-9">
                <!-- Multiple -->
                <select class="select2 form-control @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{$permission->name}}</option>
                    @endforeach
                </select>
                @error('permissions')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary mr-1"><i data-feather='save'></i> {{$button}}</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
