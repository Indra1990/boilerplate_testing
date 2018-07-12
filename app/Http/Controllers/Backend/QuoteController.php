<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Quote;
use App\Models\Auth\Tag;
use App\Models\Auth\User;
use App\Models\Auth\Photo;
use App\Http\Controllers\Backend\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use Validator;

class QuoteController extends Controller
{
  public function index()
  {

    $quotes = Quote::with('tags')->latest()->paginate(10);
    return view('backend.quotes.index' ,compact('quotes'));
  }

  public function create()
  {
    $tags = Tag::all();
    return view('backend.quotes.create',compact('tags'));
  }

  public function store(Request $request)
  {

    //validation tags
    //$request->tags = array_unique(array_diff($request->tags,[0]));
    if(empty($request->tags))
    return back()->withInput($request->input())->with('tag_error','Tag Tidak Boleh Kosong');

    $slug = str_slug($request->title,'-');
    if (Quote::where('slug',$slug)->first() !=null)
      $slug = $slug .'-'.time();

    $quotes = Quote::create([
      'title'   => $request->title,
      'slug'    => $slug,
      'subject' => $request->subject,
      'views' => 0,
      'user_id' => \Auth::user()->id
      ]);

        $photos = $request->photos;
        if ($photos != null) {
          foreach ($photos as $image) {
                // $filename=$image->store('photos');
                $filename = $image->getClientOriginalName();
                $destinationPath = 'img/frontend/quoteImage';

                $image->move($destinationPath, $filename);

                 Photo::create([
                    'filename' => $filename,
                    'quote_id' => $quotes->id
                  ]);

              // $imageId->quotes()->attach($quotes->id);

          }
        }

        $quotes->tags()->attach($request->tags);


      return redirect()->action('Backend\QuoteController@index')->with('success','Successfully Create Quote');
  }

  public function show($title)
  {
     $quote = Quote::where('title',$title)->first();
     return view('backend.quotes.show', compact('quote'));
  }

  public function edit($title)
  {
    $quote = Quote::where('slug',$title)->first();
      $tags = Tag::all();
      $photo = $quote->photos()->get();

      return view('backend.quotes.edit', compact('quote','tags','photo'));

  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
           'title' => 'required|min:3',
           'subject' => 'required|min:5',
    ]);

    $request->tags = array_unique(array_diff($request->tags, [0]));
    if(empty($request->tags))
   return back()->withInput($request->input())->with('tag_error','Tag Tidak Boleh Kosong');

     $slug = str_slug($request->title,'-');
     if (Quote::where('slug',$slug)->first() !=null)
       $slug = $slug ;
    //$quote = Quote::where('title',$title)->first();
    $quote = Quote::find($id);

    $quote->update([
      'title'   => $request->title,
      'slug'   => $slug,
      'subject' => $request->subject,
      'user_id' => \Auth::user()->id
    ]);

    // $photos = $request->file('photos');
    //
    // // $photos = $request->photos;
    // // $photos = $quote->photos;
    // foreach ($photos as $image) {
    //
    //   $filename = $image->getClientOriginalName();
    //   $destinationPath = 'img/frontend/quoteImage';
    //

    //   $image->move($destinationPath, $filename);
    //
    //   $photo = new Photo;
    //   $photo->quote_id = $quote->id;
    //   // $oldfile = $photo->filename;
    //   $photo->filename = $filename;
    //
    //   $photo->save();
    //
    //   \File::delete($destinationPath.$photo->filename);
    //
    // // \File::delete($destinationPath.$oldfile);  // or unlink($filename);
    //
    // }

      $quote->tags()->sync($request->tags);

      // return redirect()->action('Backend\QuoteController@index')->with('success','Successfully Update Quote');
       return redirect()->action('Backend\PhotoController@editImage',$quote->slug);

  }

  public function destroy($id)
  {
    $quote = quote::findOrFail($id);
    $filename= $quote->photos;

    foreach ($filename as $key) {
      \File::delete(public_path('/img/frontend/quoteImage/'.$key->filename));
    }

    $quote->delete();

    return response()->json([
      'code' => '200',
      'delete' => 'success',
        $quote
    ]);
  }

}
