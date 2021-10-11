<div class="row">
    <div class="col-12">
        <x-form-input label="Name" id="name" name="name" :value="$chauffeur->name" required/>
    </div>

    <div class="col-12">
        <x-form-input label="username" name="username" :value="$chauffeur->username" required/>
    </div>

    <div class="col-12">
        <x-form-input label="Email" id="email" name="email" :value="$chauffeur->email" required/>
    </div>

    <div class="col-12">
        <x-form-input label="Phone" id="phone" name="phone" :value="$chauffeur->phone" required/>
    </div>

    <div class="col-12">
        <x-form-input type="date" label="DOB" id="DOB" name="DOB" :value="$chauffeur->DOB" required/>
    </div>
    @if(Route::is('chauffeurs.create'))
        <div class="col-12">
            <div class="form-group row">
                <div class="col-sm-3 col-form-label">
                    <label for="account-new-password">Password</label>
                </div>
                <div class="col-sm-9">
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" id="account-new-password" name="password" class="form-control"
                               placeholder="New Password"/>
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="confirm_password">Retype Password</label>
            </div>
            <div class="col-sm-9">
                <div class="input-group form-password-toggle input-group-merge">
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation"
                           placeholder="Confirm Password"/>
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                    </div>
                </div>
                @error('confirm_password')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    @endif
    <div class="col-12">
        <x-form-img label="Image" id="image" name="image"/>
    </div>

    <div class="col-12">
        <x-form-switch label="Status" id="status" name="status" :value="$chauffeur->status"/>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary mr-1"><i data-feather='save'></i> {{$button}}</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
