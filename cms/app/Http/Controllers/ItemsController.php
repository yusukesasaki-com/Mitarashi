<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\Post;

class ItemsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function getIndex()
    {
      $items = Item::orderBy('sort', 'asc')->orderBy('id', 'asc')->get();
      return view('items.index', compact('items'));
    }

    public function getPosts($id)
    {
      $item = Item::findOrFail($id);
      $posts = Post::where('item_id', '=', $id)->orderBy('published_at', 'desc')->orderBy('id', 'desc')->get();
      return view('posts.index', compact('item', 'posts'));
    }

    public function getCreate()
    {
      return view('items.create');
    }

    public function postStore(Request $request)
    {
      $rules = [
        'title' => 'required'
      ];
      $this->Validate($request, $rules);
      $sort = Item::max('sort') + 1;
      Item::create(['title' => $request->title, 'sort' => $sort]);
      \Session::flash('flash_message', 'Itemを作成しました。');
      return redirect('items');
    }

    public function getEdit($id)
    {
      $item = Item::findOrFail($id);
      return view('items.edit', compact('item'));
    }

    public function patchUpdate(Request $request, $id)
    {
      $rules = [
        'title' => 'required'
      ];
      $item = Item::findOrFail($id);
      $this->Validate($request, $rules);
      $item->update($request->all());
      \Session::flash('flash_message', $item->title . '　を更新しました。');
      return redirect('items');
    }

    public function deleteDestroy($id)
    {
      $item = Item::findOrFail($id);
      $title = $item->title;
      $item->delete();
      \Session::flash('flash_message', $title . '　を削除しました。');
      return redirect('items');
    }
}
