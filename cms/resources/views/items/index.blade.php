@extends('layouts.default')

@section('title', 'Items')

@section('content')
  @include('layouts.nav')
  <h1>Items</h1>

  <ul>
    @foreach ($items as $item)
        <li>{!! link_to(url('items/posts', $item->id), $item->title) !!} {{ $item->sort }} | {!! link_to(url('items/edit', $item->id), '編集') !!}</li>
    @endforeach
  </ul>
@endsection
