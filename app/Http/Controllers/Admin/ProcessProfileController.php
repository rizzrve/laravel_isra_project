<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessProfile;
use Illuminate\Http\Request;

class ProcessProfileController extends Controller
{
    public function view()
    {
        $processProfiles = ProcessProfile::all();
        return view('admin.pp', compact('processProfiles'));
    }
    
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'processID' => 'required|string',
            'processName' => 'required|string'
        ]);

        ProcessProfile::create($validatedData);
        return redirect(route('admin.pp'));
    }
}
