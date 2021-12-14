<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MortgageController extends Controller
{
    //return mortgage savings page
    public function index()
    {
        return inertia('mortgage/index');
    }
}
