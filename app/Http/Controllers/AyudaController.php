<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AyudaController extends Controller
{
	public function index()
	{
		if (Auth::user()->type == 'admin') {
			return view ('admin.ayuda.index');
		} else {
			return view ('member.ayuda.index');
		}
	}
}
