<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(session('message')){
            Alert::toast(session('message'), 'success');
        }
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('admin.projects.creation', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $project)
    {
        $data = $project->all();
        $project->validate([
            'title'=>'required|unique:projects|min:10|max:200',
            'description'=>'required|min:25|max:1000',
            'image'=>'url',
            'creation_date'=>'date|before:tomorrow'
        ]);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->slug = Str::slug($newProject->title);
        $newProject->image = Storage::put('public', $data['image']);                                                                                                             
        $newProject->save();
        return redirect()->route('admin.projects.show', $newProject->slug)->with('message', "creato con successo");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if(session('message')){
            Alert::toast(session('message'), 'success');
        }
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $request->validate([
            'title'=> ['required', Rule::unique('projects')->ignore($project->id) ],
            'description'=>'required|min:25|max:2000',
            'image'=>'url',
            'creation_date'=>'date:d-m-Y|before:tomorrow'
        ]);
        $project->slug = Str::slug($project->title);
        $project->update($data);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'proggetto eliminato correttamente');
    }
}
