<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vulnerability;
use App\Models\VulnerabilityGroup;
use Illuminate\Http\Request;

class VulnController extends Controller
{
    public function newView()
    {
        $groups = VulnerabilityGroup::with('vulnerabilities')->get();
        $groupies = VulnerabilityGroup::all();
        $vulns = Vulnerability::all();

        return view('admin.vulnn-profile.index', compact('groups', 'groupies', 'vulns'));
    }

    public function index()
    {
        $groups = VulnerabilityGroup::with('vulnerabilities')->get();
        return view('user.profile.Vulnerability.index', compact('groups'));
    }

    public function create()
    {
        $groups = VulnerabilityGroup::all();
        return view('user.profile.Vulnerability.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'vulnerability_group_id' => 'required'
        ]);

        Vulnerability::create($request->all());
        return redirect()->route('vulnerabilities.view')->with('success', 'Vulnerability created successfully.');
    }

    public function edit($id)
    {
        $vulnerability = Vulnerability::findOrFail($id);
        $groups = VulnerabilityGroup::all();
        return view('user.profile.Vulnerability.edit', compact('vulnerability', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'vulnerability_group_id' => 'required'
        ]);

        $vulnerability = Vulnerability::findOrFail($id);
        $vulnerability->update($request->all());
        return redirect()->route('vulnerabilities.view')->with('success', 'Vulnerability updated successfully.');
    }

    public function destroy($id)
    {
        $vulnerability = Vulnerability::findOrFail($id);
        $vulnerability->delete();
        return redirect()->route('vulnerabilities.view')->with('success', 'Vulnerability deleted successfully.');
    }

    public function getVulnerabilitiesByGroup($groupId)
{
    $vulnerabilities = Vulnerability::where('vulnerability_group_id', $groupId)->get();
    return view('partials.vulnerabilities', compact('vulnerabilities')); // Create this view for vulnerabilities
}
}
