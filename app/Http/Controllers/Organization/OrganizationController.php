<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organization.index', compact('organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'org_logo' => 'nullable|image|max:2048',
        ]);

        $organization = new Organization;
        $organization->title = $validated['org_name'];

        if ($request->hasFile('org_logo')) {
            $path = $request->file('org_logo')->store('logos', 'public');
            $organization->logo = $path;
        }

        Project::create([
            'org_id' => mt_rand(100000, 900000),
            'org_name' => $validatedData['prj_name'],
         /*    'org_logo' => $validatedData['prj_desc'], */
        
          
        ]);


        $organization->save();

        return redirect()->back();
    }
}
