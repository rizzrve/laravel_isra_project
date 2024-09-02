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
        /* 'logo' => 'nullable|image|max:2048', */
    ]);

    $organizations = new Organization;
    $organizations->title = $validated['org_name'];

   /*  if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');
        $organization->logo = $path;
    }
 */
    $organizations->save();

    return redirect()->back();
}

}
