<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;

use Mobilocator\Http\Requests;

class GuestController extends Controller
{
    public function home()
	{
		return view('index');
	}
}
