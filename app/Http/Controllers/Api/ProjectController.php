<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $selectedType = $request->query('type_id');

        if ($selectedType) {
            $projects = Project::query()->where('type_id', $selectedType)->with(['type', 'technologies'])->orderByDesc('id')->paginate(8);
        } else {
            $projects = Project::with(['type', 'technologies'])->orderByDesc('id')->paginate(8);
        }

        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'project' => 'Project not found',
            ]);
        }
    }
}
