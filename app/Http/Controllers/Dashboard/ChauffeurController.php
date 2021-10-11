<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ChauffeurController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:chauffeur-list|chauffeur-create|chauffeur-edit|chauffeur-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:chauffeur-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:chauffeur-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:chauffeur-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('dashboard.chauffeurs.index')->with([
           'chauffeurs' => Chauffeur::paginate(),
        ]);
    }


    public function create()
    {
        return view('dashboard.chauffeurs.create', [
            'chauffeur' => new Chauffeur(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(Chauffeur::validateRules($request->id));

        $data = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image = $image->store('/chauffeurs', 'media');
            $data['image'] = $image;
        }
        $data['password'] = Hash::make($request->password);

        Chauffeur::create($data);

        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur Created Successfully');

    }


    public function show($id)
    {
        //
    }


    public function edit(Chauffeur $chauffeur)
    {
        return view('dashboard.chauffeurs.edit', [
            'chauffeur' => $chauffeur,
        ]);
    }


    public function update(Request $request, Chauffeur $chauffeur)
    {
        $request->validate(Chauffeur::validateRules($chauffeur->id));
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            if ($chauffeur->image){
                $image = $image->storeAs('/', $chauffeur->image, 'media');
            }else{
                $image = $image->store('/chauffeurs', 'media');
            }
            $data['image'] = $image;
        }

        $data['password'] = Hash::make($request->password);
        if (!$request->has('status')) {
            $data['status'] = 'draft';
        }
        $chauffeur->update($data);

        return redirect()->route('chauffeurs.index')->with([
            'success' => 'chauffeur Updated Successfully'
        ]);
    }


    public function destroy(Chauffeur $chauffeur)
    {
        Storage::disk('media')->delete($chauffeur->image);
        $chauffeur->delete();

        return redirect()->route('chauffeurs.index')->with([
            'success' => 'chauffeur Deleted Successfuly'
        ]);
    }
}
