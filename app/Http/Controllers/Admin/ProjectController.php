<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function view()
    {
        $projects = Project::all();
        return view('admin.projects.main', compact('projects'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'projectTitle' => 'required|string',
            'projectDescription' => 'required|string'
        ]);

        // Generate random string
        $generated_id = (
            substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . substr(str_shuffle('0123456789'), 0, 3)
        );

        $validatedData['projectID'] = $generated_id;

        Project::create([
            'projectID' => $validatedData['projectID'],
            'projectTitle' => $validatedData['projectTitle'],
            'projectDescription' => $validatedData['projectDescription']
        ]);

        return redirect(route('admin.projects'));
    }
}
