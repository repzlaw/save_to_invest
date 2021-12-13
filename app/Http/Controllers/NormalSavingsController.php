<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalSavingsController extends Controller
{
    //return normal savings page
    public function index()
    {
        return inertia('normal-savings/index');
    }
}
