<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Http\Controllers\Backend\Auth;

class QuoteController extends Controller
{
  public function index()
  {
    $quotes = Quote::latest()->paginate(10);
    return view('backend.quotes.index' ,compact('quotes'));
  }

  public function create()
  {
    return view('backend.quotes.create');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
           'title' => 'required|min:3',
           'subject' => 'required|min:5',
    ]);

  //  $request->tags = array_unique(array_diff($re))
    $slug = str_slug($request->title,'-');
    if (Quote::where('slug',$slug)->first() !=null)
      $slug = $slug .'-'.time();


    $quotes = Quote::create([
      'title'   => $request->title,
      'slug'    => $slug,
      'subject' => $request->subject,
      'user_id' => \Auth::user()->id

      ]);
      return redirect()->action('Backend\QuoteController@index')->with('success','Successfully Create Quote');
  }

  public function show($title)
  {
     $quote = Quote::where('title',$title)->first();

     return view('backend.quotes.show', compact('quote'));
  }
  public function edit($title)
  {
    $quote = Quote::where('title',$title)->first();
    return view('backend.quotes.edit', compact('quote'));

  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
           'title' => 'required|min:3',
           'subject' => 'required|min:5',
    ]);

    //$quote = Quote::where('title',$title)->first();
    $quote = Quote::find($id);

    $quote->update([
      'title'   => $request->title,
      'subject' => $request->subject,
      'user_id' => \Auth::user()->id

      ]);
      return redirect()->action('Backend\QuoteController@index')->with('success','Successfully Update Quote');

  }

}
