<?php

namespace App\Http\Controllers;

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
            'name' => ['required']
        ]);
        $newGroup = new Group();
        $newGroup->name = $request->name;
        $newGroup->user_id = auth()->id();
        $newGroup->save();
        return redirect()->route('group.index');
    }
}
