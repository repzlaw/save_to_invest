<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingsController extends Controller
{
    //return savings page
    public function index()
    {
        return inertia('Savings/index');
    }
}
