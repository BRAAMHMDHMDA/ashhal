<div class="row">
    <div class="col-12">
        <x-form-input label="Name" id="name" name="name" :value="$user->name" required/>
    </div>

    <div class="col-12">
        <x-form-input label="Username" name="username" :value="$user->username" required/>
    </div>

    <div class="col-12">
        <x-form-input label="Email" id="email" name="email" :value="$user->email" required/>
    </div>

    <div class="col-12">
        <x-form-input label="Phone" id="phone" name="phone" :value="$user->phone" required/>
    </div>

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

    <div class="col-12">
        {{--        <x-form-select name="category_id" label="Category" :options="$categories" :selected="$product->category_id" />--}}
        {{--        <x-form-select id="roles" label="User Role" name="role_id" :options="$roles" :selected="$roles_id" multi="" required />--}}
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label class="form-label" for="roles">User Roles</label>
            </div>
            <div class="col-sm-9">
                <!-- Multiple -->
                <select class="form-control @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple>
                    @foreach($roles as $i => $role)
                        <option value="{{ $role->id }}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('roles')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <x-form-img label="Image" id="image" name="image"/>
    </div>

    <div class="col-12">
        <x-form-switch label="Status" id="status" name="status" :value="$user->status"/>
    </div>

    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary mr-1"><i data-feather='save'></i> {{$button}}</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
