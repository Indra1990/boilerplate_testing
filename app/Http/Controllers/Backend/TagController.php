<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Auth;
use App\Models\Auth\Tag;

class TagController extends Controller
{
  public function index()
  {
    $tags = Tag::latest()->get();
    return view('backend.tags.index' ,compact('tags'));
  }

  public function create()
  {
    return view('backend.tags.create');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
           'tag_name' => 'required|min:3',
    ]);

    $slug = str_slug($request->tag_name,'-');
    if (Tag::where('slug',$slug)->first() !=null)
      $slug = $slug .'-'.time();


    $tag = Tag::create([
          'tag_name' => $request->tag_name,
          'slug' => $slug,
      ]);

      return redirect()->action('Backend\TagController@index')->with('success','Successfully Create Tags');
  }

  public function edit($id)
  {
    $tag = Tag::where('slug',$id)->first();

    return view('backend.tags.edit', compact('tag'));
  }

   public function update(Request $request, $id)
  {
    $this->validate($request,[
           'tag_name' => 'required|min:3',
    ]);

    $tag = tag::find($id);

    $slug = str_slug($request->tag_name,'-');

    $tag->update([
      'tag_name' => $request->tag_name,
      'slug' => $slug,
      ]);

    return redirect()->action('Backend\TagController@index')->with('success','Successfully Update Tags');
  }

}
