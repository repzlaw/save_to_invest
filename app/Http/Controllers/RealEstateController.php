<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    //return real estate savings page
    public function index()
    {
        return inertia('real-estate/index');
    }
}
