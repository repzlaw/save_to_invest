<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard(Request $request)
    {
        return inertia('dashboard');
    }


    
}
