<div class="form-group row">
    <div class="col-sm-3 col-form-label">
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    </div>
    <div class="col-sm-9">

        <select class="select2 form-control  @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id ?? $name }}">
            <option>---Choose {{$label}}---</option>
            @foreach ($options as $value => $text)
                <option value="{{ $value }}" @if($value == old($name, ($selected ?? null))) selected @endif>{{ $text }}</option>
            @endforeach
        </select>

        @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
