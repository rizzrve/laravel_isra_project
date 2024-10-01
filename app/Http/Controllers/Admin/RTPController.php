<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RTPController extends Controller
{
    // ====================================
    // READ
    // ====================================
    public function view()
    {
        return view('admin.risk-treatment-plan.index');
    }
}
