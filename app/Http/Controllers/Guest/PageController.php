<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $projects = Project::paginate(3);
        return view('layouts.guest', compact('projects'));
    }
}
