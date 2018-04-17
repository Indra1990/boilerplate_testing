<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\Tag;

class TagController extends Controller
{
    public function tags()
    {
      $tags = Tag::all();
      return view('frontend.index',compact('tags'));
    }
}
