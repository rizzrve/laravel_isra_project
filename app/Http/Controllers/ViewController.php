<?php

namespace App\Http\Controllers;

class ViewController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    // ========== USER ROUTES ==========
    public function user()
    {
        return view('user.dashboard');    
    }

    // ========== ADMIN ROUTES ==========
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function adminGenre()
    {
        return view('admin.genre');
    }

    // public function adminPP()
    // {
    //     return view('admin.pp');
    // }

    // public function adminTP()
    // {
    //     return view('admin.tp');
    // }

    // public function adminVP()
    // {
    //     return view('admin.vp');
    // }

    public function adminRR()
    {
        return view('admin.rr');
    }

    public function adminRA()
    {
        return view('admin.ra');
    }

    public function adminRTP()
    {
        return view('admin.rtp');
    }

    // public function adminProject()
    // {
    //     return view('admin.project');
    // }

    public function landing()
    {
        return view('landing');
    }

    public function getVulnerabilitiesByGroup($groupId)
{
    $vulnerabilities = Vulnerability::where('vulnerability_group_id', $groupId)->get();
    $options = '<option value="">Select Vulnerability</option>';
    foreach ($vulnerabilities as $vulnerability) {
        $options .= '<option value="' . $vulnerability->id . '">' . $vulnerability->name . '</option>';
    }
    return $options;
}

}
