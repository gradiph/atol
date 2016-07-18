<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;

use Mobilocator\Http\Requests;

class MemberController extends Controller
{
    public function home()
	{
		return view('member_home');
	}
}
