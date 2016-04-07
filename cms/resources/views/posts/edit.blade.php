@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
  @include('layouts.nav')
  <h1>Edit Post</h1>

  {!! Form::model($post, ['url' => ['posts/update', $post->id], 'method' => 'PATCH']) !!}
    {!! Form::label('title', 'タイトル') !!}
    {!! Form::text('title', null) !!}
    <br>
    {!! Form::label('本文') !!}
    {!! Form::textarea('body', null) !!}
    <br>
    {!! Form::label('投稿日') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d', strtotime($post->published_at))) !!}
    <br>
    {!! Form::label('状態') !!}
    <label>{!! Form::radio('state', '0') !!} 下書</label>
    <label>{!! Form::radio('state', '1') !!} 公開</label>
    <br>
    {!! Form::submit('Edit Post', ['data-role' => 'button']) !!}
  {!! Form::close() !!}
@endsection
