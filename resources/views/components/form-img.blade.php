<div class="form-group row">
    <div class="col-sm-3 col-form-label">
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    </div>
    <div class="col-sm-9">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id ?? $name }}"/>
            <label class="custom-file-label" for="{{ $id ?? $name }}">Choose {{ $label }}</label>
            @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
