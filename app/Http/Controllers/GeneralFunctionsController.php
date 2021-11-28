<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\StateLga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeneralFunctionsController extends Controller
{
    //get all states
    public function getState()
    {
        $states = State::orderby('stname','asc')->get();

        return $states;
    }

    //get lgas
    public function getLgas($id)
    {
        $lgas = StateLga::where('state_id',$id)->orderby('lganame','asc')->get();

        return $lgas;
    }

    
}
