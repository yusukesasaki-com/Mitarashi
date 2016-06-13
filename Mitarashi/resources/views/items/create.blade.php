@extends('layouts.default')

@section('title', 'Add Item')

@section('content')
  @include('layouts.nav')
  <h1>Add Item</h1>

  {!! Form::open(['url' => 'items/store', 'method' => 'post']) !!}
    @include('items.form', ['submitButton' => 'Add Item', 'checked' => true])
  {!! Form::close() !!}
@endsection
