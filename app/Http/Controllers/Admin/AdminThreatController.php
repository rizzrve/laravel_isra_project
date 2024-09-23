<?php

namespace App\Http\Controllers\Admin;

use App\Models\Threat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminThreatController extends Controller
{
    public function index()
{
    $threats = Threat::all();
    return view('admin.profile.threats.index', compact('threats'));
}

public function create()
{
    return view('admin.profile.threats.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'threat_name' => 'required|string|max:255',
            'threat_description' => 'nullable|string',
        ]);

        Threat::create($request->all());

        return redirect()->route('admin.profile.threats.index')->with('success', 'Threat created successfully.');
    }

    public function edit($id)
{
    $threat = Threat::findOrFail($id);
    return view('admin.profile.threats.edit', compact('threat'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'threat_name' => 'required|string|max:255',
        'threat_description' => 'required|string',
    ]);

    $threat = Threat::findOrFail($id);
    $threat->threat_name = $request->input('threat_name');
    $threat->threat_description = $request->input('threat_description');
    $threat->save();

    return redirect()->route('admin.profile.threats.index')
                     ->with('success', 'Threat updated successfully.');
}
    public function destroy($id)
    {
        $threat = Threat::findOrFail($id);
        $threat->delete();
    
        return redirect()->route('admin.profile.threats.index')
                         ->with('success', 'Threat deleted successfully.');
    }
    
}
