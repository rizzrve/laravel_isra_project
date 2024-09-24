<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;

class TestOrganizationController extends Controller
{
    // ====================================
    // READ
    // ====================================
    public function view()
    {
        Debugbar::info('Organizations View');
        $organizations = Organization::all();
        return view('admin.organizations.main', compact('organizations'));
    }

    // ====================================
    // CREATE
    // ====================================
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'org_name' => 'required|string|max:255',
                'org_logo' => 'nullable|image|max:2048',
            ]);

            $organization = new Organization([
                'org_name' => $validated['org_name'],
            ]);

            if ($request->hasFile('org_logo')) {
                $organization->org_logo = $request->file('org_logo')->store('org_logo', 'public');
            }

            $organization->save();

            return redirect()->back()->with('success', 'Organization created successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the organization.']);
        }
    }

    // ====================================
    // UPDATE
    // ====================================
    public function update(Request $request, $org_id)
    {
        $organization = Organization::find($org_id);
        if (!$organization) {
            return redirect()->back()->withErrors(['error' => 'Organization not found']);
        }

        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
        ]);

        $organization->org_name = $validated['org_name'];

        if ($request->hasFile('org_logo')) {
            $organization->org_logo = $this->handleImageUpload($request, 'org_logo');
        }

        $organization->save();
        return redirect()->back()->with('success', 'Organization updated successfully.');
    }

    private function handleImageUpload(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            return $request->file($fieldName)->store('org_logo', 'public');
        }
        return null;
    }
}
