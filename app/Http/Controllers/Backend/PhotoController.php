<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Auth;
use App\Models\Auth\Tag;
use App\Models\Auth\Quote;
use App\Models\Auth\User;
use App\Models\Auth\Photo;

class PhotoController extends Controller
{
  public function editImage($title)
  {
    $quote = Quote::where('slug',$title)->first();
    $photo = $quote->photos()->get();
    return view('backend.quotes.editImage', compact('quote','photo'));
  }

  public function deleteImage($id)
  {
     $photo = Photo::findOrFail($id);
     \File::delete(public_path('/img/frontend/quoteImage/'.$photo->filename));
     $photo->delete();

    return redirect()->action('Backend\PhotoController@editImage',[$photo->quote->slug])->withFlashDanger('Successfully Delete Image');
  }

  public function updateImage(Request $request, $id)
  {
        $quote = Quote::where('slug',$id)->first();

        $photos = $request->photos;
        if ($photos != null) {
          foreach ($photos as $image) {

            $filename = $image->getClientOriginalName();
            $destinationPath = 'img/frontend/quoteImage';
            $image->move($destinationPath, $filename);

            $photo = new Photo;
            $photo->quote_id = $quote->id;
            $photo->filename = $filename;
            $photo->save();
          }
        }

        return redirect()->action('Backend\QuoteController@index')->with('success','Successfully Update Quote');

  }

}
