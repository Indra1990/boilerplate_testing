<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Item;

class ItemController extends Controller
{
  public function index()
  {
    $items = Item::latest()->paginate(10);
    return view('backend.item.index', compact('items'));
  }

  public function editItem($id)
  {
    $item = Item::where('nama_barang',$id)->first();
    //dd($item);
    return view('backend.item.edit', compact('item'));
  }

  public function updateItem(Request $request, $id)
  {

    $this->validate($request,[
            'nama_barang' => 'required',
            'no_telp' => 'required',
        ]);

    $item = Item::find($id);
    $item->update([
                 'nama_barang' => $request->nama_barang,
                 'no_telp' => $request->no_telp,
               ]);

    //return redirect('/admin/item/index')->with('success','Successfully Update Item');
    return redirect()->action('Backend\ItemController@index')->with('success','Successfully Update Item');

  }
}
