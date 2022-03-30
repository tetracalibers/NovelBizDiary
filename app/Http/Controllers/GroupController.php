<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; 

use App\Models\Group;

class GroupController extends Controller
{
    public function index() 
    {
        return Inertia::render('Group/Index');
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
        Group::create($request->all());
        return redirect()->route('group.index');
    }
}
