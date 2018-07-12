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

}
