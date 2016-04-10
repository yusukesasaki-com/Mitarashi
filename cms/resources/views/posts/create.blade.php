@extends('layouts.default')

@section('title', 'Add Post')

@section('content')
  @include('layouts.nav')
  <h1>Add Post</h1>

  {!! Form::open(['url' => 'posts/store', 'method' => 'POST']) !!}
    {!! Form::input('hidden', 'item_id', $item_id) !!}

    {!! Form::label('タイトル') !!}
    {!! Form::text('title', null) !!}
    <br>
    {!! Form::label('本文') !!}
    {!! Form::textarea('body', null, ['class' => 'tinymce']) !!}
    @include('tinymce::tpl')
    <br>
    {!! Form::label('投稿日') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d')) !!}
    <br>
    {!! Form::label('状態') !!}
    <label>{!! Form::radio('state', '0', true) !!} 下書</label>
    <label>{!! Form::radio('state', '1') !!} 公開</label>
    <br>
    {!! Form::submit('新規投稿', ['data-role' => 'button']) !!}
  {!! Form::close() !!}
@endsection
