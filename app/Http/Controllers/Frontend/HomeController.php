<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Models\Auth\Tag;
use App\Models\Auth\Photo;
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
    public function index(Request $request)
    {
      $search = urldecode($request->input('search'));
      if (!empty($search)) {

        $quotes =Quote::with('tags')->where('title','like','%'.$search.'%')->get();
        $tags = Tag::all();

      }else {

        $quotes = Quote::with('tags')->latest()->get();
        $tags = Tag::all();
      }

        return view('frontend.index',compact('quotes','tags'));
    }

    public function show($slug)
    {
       $quote = Quote::with('comments.user.photos')->where('slug', $slug)->first();
       // $photo = Photo::with('quote')->get();
       $photo = $quote->photos()->get();
       $points = $quote->views + 1;
       $quote->update([
         'views'   => $points,
       ]);

       $tags = Tag::all();
       return view('frontend.show', compact('quote','tags', 'views','photo'));
    }

    public function filterTag($tag)
    {

       $tags = Tag::all();

       $quotes = Quote::with('tags')->whereHas('tags', function($query) use($tag){
           $query->where('slug', $tag);
           })->get();

      return view('frontend.index', compact('quotes','tags'));
    }
}
