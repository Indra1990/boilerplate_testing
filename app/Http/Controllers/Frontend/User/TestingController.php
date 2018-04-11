<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestingController extends Controller
{
    public function index()
    {
      return view('frontend.user.testing');
    }
}
