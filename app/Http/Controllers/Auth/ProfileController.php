<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Course;
use App\Models\CreditScore;
use App\Models\ECash;
use App\Models\Referal;
use App\Models\Training;
use App\Models\WithdrawalBank;

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

        $courses = Course::where('user_id',$id)->count();
        $cash = ECash::where('user_id',$id)->sum('value');
        $train = Training::where('user_id',$id)->count();
        $score = CreditScore::where('user_id',$id)->sum('value');
        $refer = Referal::where('user_id',$id)->count();
        $withdrawal_account = WithdrawalBank::where('user_id',$id)->count();

        return response()->json(['user'=>$user,'cash'=>$cash,'courses'=>$courses,'train'=>$train,'score'=>$score,'refer'=>$refer,
                                'withdrawal_account'=>$withdrawal_account]);
    }

    //update profile
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::where('id', request('id'))->first();
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json(['message'=>'incorrect password'], 422);
        }

        $user->update($request->validated());
        activity()->log('Updated profile details');

        return true;
    }

    // update image
    public function updateImage(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'featured_image' => 'file|required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'user_id' => 'required',
        ]);
        if ($request->hasFile('featured_image')) {
            //process image
            $fileNameToStore = process_image($request->file('featured_image'));
        // dd($fileNameToStore);

            //store image
            $path = $request->file('featured_image')->storeAs('public/images/profile_pic', $fileNameToStore);

            //get old user image if exist
            $user = User::where('id',$request->user_id)->first();
            if ($user) {
                $user_image = $user->file_path;
                if ($user_image) {
                    unlink(storage_path("app/public/images/profile_pic/".$user_image));
                }
            }

            $update = $user->update([
                'image'=>$fileNameToStore,
            ]);

            activity()->log('Updated profile picture');

            return true;
        }
    }
}
