<div class="form-group row">
    <div class="col-sm-3 col-form-label">
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    </div>
    <div class="col-sm-9">
        <input type="{{$type ?? 'text'}}" id="{{ $id ?? $name }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{ old($name , $value ?? null) }}" placeholder="{{$label}}" />
        @error($name)
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
