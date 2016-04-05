@extends('layouts.default')

@section('title', 'Posts')

@section('content')
 @include('layouts.nav')
  <h1>{{ $item->title }} <small>{!! link_to(url('posts/create', $item->id), ' + ') !!}</small></h1>

  <ul>
    @forelse ($posts as $post)
      <li>{{ $post->title }}</li>
    @empty
      <li>記事がありません</li>
    @endforelse
  </ul>
@endsection
