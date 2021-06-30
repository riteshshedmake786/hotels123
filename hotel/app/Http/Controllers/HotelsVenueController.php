<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsVenueController extends Controller
{
    public function getHotelsVenueHome()
    {
        
        return view('front/layout/main');
    }
}
