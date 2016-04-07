<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    //
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
      \Session::flash('flash_message', 'Postを更新しました。');
      return redirect('items/posts/' . $post->item_id);
    }

}
