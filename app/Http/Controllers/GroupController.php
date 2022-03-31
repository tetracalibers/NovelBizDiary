<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia; 

use App\Models\Group;

class GroupController extends Controller
{
    public function index() 
    {
        return Inertia::render('Group/Index', ['groups' => Group::all()]);
    }
    
    public function create() 
    {
        return Inertia::render('Group/Create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        if ($file = $request->thumbnail) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/group');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        $newGroup = new Group();
        $newGroup->name = $request->name;
        $newGroup->thumbnail = $fileName;
        $newGroup->user_id = auth()->id();
        $newGroup->save();
        return redirect()->route('group.index');
    }
    
    public function edit($group_id)
    {
        $group = Group::find($group_id);
        return Inertia::render('Group/Edit', ['group' => $group]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        if ($file = $request->thumbnail) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/group');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        $rewriteGroup = Group::find($request->group_id);
        $rewriteGroup->update([
            'name' => $request->name,
            'thumbnail' => $fileName
        ]);
        return redirect()->route('group.index');
    }
    
    public function destroy($group_id)
    {
        Group::destroy($group_id);
        return redirect()->route('group.index');
    }
}
