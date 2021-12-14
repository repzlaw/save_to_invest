<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockSavingsController extends Controller
{
    //return lock savings page
    public function index()
    {
        return inertia('lock-savings/index');
    }
}
