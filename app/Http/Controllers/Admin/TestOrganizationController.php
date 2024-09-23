<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestOrganizationController extends Controller
{
    // ====================================
    // available routes
    // Route::get('/admin/test/organizations', [OrganizationController::class, 'view'])->name('test.organizations');
    // Route::post('/admin/test/organizations', [OrganizationController::class, 'create'])->name('test.organizations.create');
    // Route::patch('/admin/test/organizations/{id}/update', [OrganizationController::class, 'update'])->name('test.organizations.update');
    // ====================================

    // ====================================
    // READ
    // ====================================
    public function view()
    {
        $organizations = Organization::all();
        return view('admin.organizations.main', compact('organizations'));
    }

    // ====================================
    // CREATE
    // ====================================
    public function create(Request $request)
    {
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'org_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $organization = new Organization;

        $organization->org_id = mt_rand(10, 90);
        $organization->org_name = $validated['org_name'];
        $organization->org_logo = $this->handleImageUpload($request, 'org_logo');

        $organization->save();

        return redirect()->back();
    }

    // ====================================
    // UPDATE
    // input: org_name, org_logo
    // method: PATCH
    // ====================================
    public function update(Request $request, $org_id)
    {
        $organization = Organization::where('org_id', $org_id)->first();
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
        return redirect()->back();
    }

    private function handleImageUpload(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $path = $file->store('public/logos');
            return Storage::url($path);
        }
        return null;
    }
}
