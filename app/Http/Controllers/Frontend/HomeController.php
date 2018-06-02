<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Models\Auth\Tag;
use App\Models\Auth\Comment;
use Illuminate\Http\Request;

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
        $quotes = Quote::with('tags')->latest()->get();
        $tags = Tag::all();
        return view('frontend.index',compact('quotes','tags'));
    }

    public function show($slug)
    {
       $quote = Quote::with('comments.user')->where('slug', $slug)->first();
       //$quote = Quote::where('slug',$slug)->first();
       $tags = Tag::all();
       return view('frontend.show', compact('quote','tags'));
    }
}
