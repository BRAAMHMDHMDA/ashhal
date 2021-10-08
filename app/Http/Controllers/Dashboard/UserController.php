<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
//        $users = User::whereHas('roles', function ($query) {
//            $query->where('name','!=', 'owner');
//        })
//            ->latest()
//            ->paginate();

        $users = User::latest()->paginate();
        return view('dashboard.users.index')->with([
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create', [
            'roles' => Role::get(['id', 'name']),
            'user' => new User(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(User::validateRules($request->id));

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image = $image->store('/users', 'media');
            $data['image'] = $image;
        }
        $data['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {
            $user = User::create($data);
            $user->assignRole($request->roles);

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Created Successfully');

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $user->load('roles:id');
        foreach ($user->roles as $role) {
            $roles_id[] = $role->id;
        }
         return view('dashboard.users.edit', [
             'user' => $user,
             'roles' => Role::get(['id', 'name']),
             'roles_id' => $roles_id,
        ]);
    }


    public function update(Request $request, User $user)
    {
        $request->validate(User::validateRules($user->id));
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            if ($user->image){
                $image = $image->storeAs('/', $user->image, 'media');
            }else{
                $image = $image->store('/users', 'media');
            }
            $data['image'] = $image;
        }
        $data['password'] = Hash::make($request->password);

        DB::beginTransaction();
        try {
            $user->update($data);
            $user->syncRoles($request->roles);

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully');

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }










        $request->validate(User::validateRules($id));
        $User = User::findOrFail($id);

        $data = $request->all();
//        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            if ($User->image){
                $image = $image->storeAs('/', $User->image, 'media');
            }else{
                $image = $image->store('/users', 'media');
            }
            $data['image'] = $image;
        }
        if (!$request->has('status')) {
            $data['status'] = 'draft';
        }

        $User->update($data);
        return redirect()->route('users.index')->with([
            'success' => 'User Updated Successfully'
        ]);
    }


    public function destroy(User $user)
    {
        Storage::disk('media')->delete($user->image);
        $user->delete();

        return redirect()->route('users.index')->with([
            'success' => 'User Deleted Successfuly'
        ]);
    }
}
