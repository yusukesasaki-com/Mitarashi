@extends('layouts.default')

@section('title', 'Posts')

@section('content')
 @include('layouts.nav')
  <h1>{{ $item->title }} <small>{!! link_to(url('posts/create', $item->id), ' + ') !!}</small></h1>

  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>タイトル</th>
          <th class="operation">操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr>
            <td>{{ $post->title }}</td>
            <td>
              編集 ｜
              削除
            </td>
          </tr>
        @empty
          <li>記事がありません</li>
      @endforelse
      </tbody>
    </table>
  </div>
@endsection
