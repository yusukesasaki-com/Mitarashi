<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Item;

class PostsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['getList', 'getSummary']]);
    }

    public function getCreate($item_id)
    {
      return view('posts.create', compact('item_id'));
    }

    public function postStore(Request $request)
    {
      $rules = [
        'item_id' => 'required',
        'title' => 'required',
        'body' => 'required',
        'published_at' => 'required|date'
      ];
      $this->validate($request, $rules);
      Post::create($request->all());
      return redirect('items/posts/' . $request->item_id);
    }

    public function getEdit($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.edit', compact('post'));
    }

    public function patchUpdate(Request $request, $id)
    {
      $rules = [
        'title' => 'required',
        'body' => 'required',
        'published_at' => 'required|date'
      ];
      $post = Post::findOrFail($id);
      $this->Validate($request, $rules);
      $post->update($request->all());
      \Session::flash('flash_message', $post->title . '　を更新しました。');
      return redirect('items/posts/' . $post->item_id);
    }

    public function deleteDestroy($id)
    {
      $post = Post::findOrFail($id);
      $title = $post->title;
      $item_id = $post->item_id;
      $post->delete();
      \Session::flash('flash_message', $title . '　を削除しました。');
      return redirect('items/posts/' . $item_id);
    }

    public function getList($item_id, $limit)
    {
      $posts = Post::where('item_id', '=', $item_id)->orderBy('published_at', 'desc')->orderBy('id', 'desc')->limit($limit)->get()->toArray();
      $item = Item::findOrFail($item_id)->toArray();
      return view('posts.list', compact('posts', 'item'));
    }

    public function getGetcodelist($item_id, $num)
    {
      return view('posts.getcode.list', compact('item_id', 'num'));
    }

    public function getSummary($item_id, $limit)
    {
      $posts = Post::where('item_id', '=', $item_id)->orderBy('published_at', 'desc')->orderBy('id', 'desc')->limit($limit)->get()->toArray();
      $item = Item::findOrFail($item_id)->toArray();
      return view('posts.summary', compact('posts', 'item'));
    }

    public function getGetcodesummary($item_id, $num)
    {
      return view('posts.getcode.summary', compact('item_id', 'num'));
    }
}
