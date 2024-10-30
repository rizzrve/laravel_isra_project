<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $orgs = Organization::all();
        $search = htmlspecialchars($request->input('search'), ENT_QUOTES, 'UTF-8');

        if ( (empty($search)) || ($search === null) || ($search === "") ) {
            $users = [];
            return view('admin.user-management.index', compact('users', 'orgs'));
        } else {
            $users = User::query()
                ->when(
                    $search,
                    function ($query, $search) {
                        return $query->where('name', 'like', "%{$search}%");
                    }
                )
                ->get();

            return view('admin.user-management.index', compact('users', 'orgs'));
        }
    }

    public function update(Request $request, $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'user_mgmt_org' => 'required|exists:organizations,org_id',
        ]);

        // Update the user's email and organization
        $user->email = $request->input('email');
        $user->organization_id = $request->input('user_mgmt_org');

        // Save the updated user
        $user->save();

        // Redirect back with a success message
        return redirect()->route('user-management.index')->with('success', 'User updated successfully.');
    }
}
