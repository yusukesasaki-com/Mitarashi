@extends('layouts.default')

@section('title', 'Add Item')

@section('content')
  @include('layouts.nav')
  <h1>Add Item</h1>

  {!! Form::open(['url' => 'items/store', 'method' => 'post']) !!}
    {!! Form::label('title', 'タイトル') !!}
    {!! Form::text('title', null) !!}
    <br>
    {!! Form::submit('Add Item', ['data-role' => 'button']) !!}
  {!! Form::close() !!}
@endsection
