<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$quotes =
        $quotes =Quote::all();
        return view('frontend.index',compact('quotes'));
    }

    public function show($slug)
    {
       $quote = Quote::where('slug',$slug)->first();

       return view('frontend.show', compact('quote'));
    }
}
