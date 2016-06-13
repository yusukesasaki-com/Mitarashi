@extends('layouts.default')

@section('css')
  <link rel="stylesheet" href="/cms/css/login.css">
@endsection

@section('title', 'Login')

@section('content')
  <h1>Login</h1>

  <div class="login_form">
    {!! Form::open(['url' => 'auth/login']) !!}
      {!! Form::label('email', 'メールアドレス') !!}
      {!! Form::text('email', null, ['placeholder' => 'example@example.com']) !!}

      {!! Form::label('password', 'パスワード') !!}
      {!! Form::password('password', null) !!}

      {!! Form::submit('ログイン', ['data-role' => 'button']) !!}
    {!! Form::close() !!}
  </div>
@endsection
