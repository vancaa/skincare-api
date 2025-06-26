<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,reseller,customer'
        ]);

        $user->role = $request->role;
        $user->save();

        return response()->json([
            'message' => 'Role berhasil diperbarui',
            'user' => $user
        ]);
    }
}
