@extends('layouts.default')

@section('title', 'Edit Item')

@section('content')
  @include('layouts.nav')
  <h1>Edit Item</h1>

  {!! Form::model($item, ['url' => ['items/update', $item->id], 'method' => 'PATCH']) !!}
    @include('items.form', ['submitButton' => 'Edit Item', 'checked' => false])
  {!! Form::close() !!}
@endsection
