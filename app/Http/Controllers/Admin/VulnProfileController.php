<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VulnProfile;

class VulnProfileController extends Controller
{
    public function view()
    {
        $vulnProfiles = VulnProfile::all();
        return view('admin.vp', compact('vulnProfiles'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'vulnType' => 'required|string',
            'vulnDescription' => 'required|string'
        ]);

        VulnProfile::create($validatedData);
        
        return redirect(route('admin.vp'));
    }
}
