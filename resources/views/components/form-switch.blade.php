<div class="form-group row">
    <div class="col-sm-3 col-form-label">
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    </div>
    <div class="col-sm-9">
        <div class="custom-control custom-switch custom-switch-success">
            <input type="checkbox" class="custom-control-input @error($name) is-invalid @enderror" name="{{$name}}" value="active" @if(old('status',$value?? null) == "active") checked @endif id="{{ $id ?? $name }}"/>
            <label class="custom-control-label" for="{{ $id ?? $name }}">
                <span class="switch-icon-left"><i data-feather="check"></i></span>
                <span class="switch-icon-right"><i data-feather="x"></i></span>
            </label>
            @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
