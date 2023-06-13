<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Query selection for types

        $typeId = $request->get('type_id');
        if ($typeId) {

            $projects = Project::where('type_id', $typeId)->get();
            Project::where('type_id', $typeId)->get();
        } else {

            $projects = Project::orderByDesc('id')->get();
        }

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data =  $request->validated();

        //slug generation
        $slug = Project::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;


        if ($request->hasFile('image')) {
            $image_path = Storage::put('public/uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        $new_project = Project::create($val_data);
        //attach the technologies 
        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', "Project created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data =  $request->validated();

        if ($request->hasFIle('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $image_path = Storage::put('uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        $project->update($val_data);

        //sync the technologies 
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', "Project updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        };

        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted successfully');;
    }
}
