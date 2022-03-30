<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; 

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
}
