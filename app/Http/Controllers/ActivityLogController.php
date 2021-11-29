<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    // user index
    public function userIndex($user_id)
    {
        // dd($user_id);
        $user = User::where('id',$user_id)->first();
        return Inertia::render('ActivityLog/SingleUser',['user_id' => $user_id, 'username'=>$user->lname.' '.$user->fname ]);
    }

    //get user activity
    public function getUserActivity($user_id)
    {
        // dd(23);
        $activity_log = Activity::join('users as u', 'u.id', '=', 'causer_id')
                                ->select('activity_log.*', 'u.name')
                                ->where('u.id', $user_id)
                                ->orderBy('updated_at','desc')->paginate(10);
        
        foreach ($activity_log as $value) {
           $value->my_updated_at = $value->updated_at->diffForHumans();
        }
        
        return $activity_log;
    }
}
