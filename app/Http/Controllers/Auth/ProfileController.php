<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index(Request $request, $user_id = null)
    {
        $user = $request->user();

        if (!is_null($user_id)) {
            $user = User::where('id', $user_id);
        }
        return inertia('Auth/profile', ['user_data' => $user]);
    }
}
