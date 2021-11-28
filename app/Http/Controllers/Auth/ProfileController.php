<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    function index()
    {
        return inertia('Profile/index');
    }

    // verify email
    public function verifyEmail(Request $request)
    {
        $id = Auth::id();
        if ($request->has('id')) {
            $id = $request->id;
        }
        $user = User::where('id',$id)->first();
        $user->sendEmailVerificationNotification();

        return true;
    }

    //get user details
    public function getUser(){
        $id = Auth::id();
        $user = User::where('id',$id)->first(['name','email','phone','email_verified_at','image','lga_id',
                                                'gender','marital_status','dob','address','religion','id']);
        return $user;
    }

    //update profile
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::where('id', request('id'))->first();
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json(['message'=>'incorrect password'], 422);
        }
        
        $user->update($request->validated());
        
        return true;
    }
}
