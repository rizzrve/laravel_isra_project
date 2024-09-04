<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    // ====================================
    // READ
    // ====================================
    public function view()
    {
        $projects = Project::all();
        return view('admin.projects.main', compact('projects'));
    }

    // ====================================
    // CREATE
    // ====================================
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'prj_name' => 'required|string',
            'prj_desc' => 'required|string'
        ]);

        Project::create([
            'prj_id' => mt_rand(100000, 900000),
            'prj_name' => $validatedData['prj_name'],
            'prj_desc' => $validatedData['prj_desc'],
            'created_at' => now(),
            'updated_at' => now(),
            'start_date' => now(),
            'end_date' => '',
            'organization' => 'unassigned'
        ]);

        return redirect(route('admin.projects'));
    }

    // ====================================
    // UPDATE
    // ====================================
    public function update(Request $request, $prj_id)
    {
        $request->validate([
            'prj_name' => 'required|string',
            'prj_desc' => 'required|string'
        ]);

        $project = Project::findOrFail($prj_id);

        if (!$project) {
            Log::error('[ ProjectController - update() ] Project not found');
            return redirect(route('admin/projects'))
                ->with(
                    'error',
                    'Project not found'
                );
        } else {
            $project->prj_name = $request->input('prj_name');
            $project->prj_desc = $request->input('prj_desc');

            $savePrj = $project->save();

            if (!$savePrj) {
                Log::error('[ ProjectController - update() ] Failed to save project');
                return redirect(route('admin/projects'))
                    ->with(
                        'error',
                        'Failed to save project'
                    );
            }
        }

        return redirect(route('admin.projects'));
    }
}
