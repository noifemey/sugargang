<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarrController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('wealthavatarr.index');
    }
}
