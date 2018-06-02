<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Models\Auth\Comment;
use App\Models\Auth\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

  public function edit($id)
  {
//  $comment = Comment::where('id',$id)->first();
    //$comment = Quote::with('comments')->where('id',$id)->first();
  //  $comment = Comment::with('quote.user')->where('slug', $slug)->first();

    $comment = Comment::findOrFail($id);
  //  dd($comment);
    return view('frontend.show.edit', compact('comment'));
  //  Response::json(['status' => $comment]);
    //$comment = Comment::with('quotes.user')->where('id', $id)->first();
  //  return response()->json();
  //  return response()->json(['status'=>$comment],201);

  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
        'subject' => 'required|min:5'
    ]);

    $comment = Comment::findOrFail($id);
     if ($comment->isOwner()) {

       $comment->update([
            'subject' => $request->subject,
          ]);
    }else {
      return false;
    }
    return redirect('show/'.$comment->quote->slug)->withFlashInfo('msg', 'komentar berhasil di update');

 }
}
