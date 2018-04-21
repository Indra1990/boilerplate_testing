<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Models\Auth\Comment;
use App\Models\Auth\Tag;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request, $slug)
  {
    $this->validate($request,[
        'subject' => 'required|min:5'
    ]);

  // $quote = Quote::where('slug',$slug)->first();
   $quote = Quote::findOrFail($slug);

    $comment = Comment::create([
        'subject' => $request->subject,
        'quote_id' => $slug,
        'user_id' => Auth::user()->id,
    ]);
  //  dd($comment);
    return redirect('/show/'.$quote->slug)->with('success','Successfully Comment');
  }
}
