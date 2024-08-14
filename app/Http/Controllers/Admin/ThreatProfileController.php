<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThreatProfile;

class ThreatProfileController extends Controller
{
    public function view()
    {
        $threatProfiles = ThreatProfile::all();
        return view('admin.tp', compact('threatProfiles'));
    }

    public function create(Request $request)
    {        
        $validatedData = $request->validate([
            'threatType' => 'required|string',
            'threatDescription' => 'required|string'
        ]);

        ThreatProfile::create($validatedData);
         
        return redirect(route('admin.tp'));
    }
}
