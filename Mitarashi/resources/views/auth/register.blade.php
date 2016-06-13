@extends('layouts.default')

@section('css')
  <link rel="stylesheet" href="/cms/css/login.css">
@endsection

@section('title', 'Register')

@section('content')

<h1>Register</h1>

<div class="register_form">
  {!! Form::open(['url' => 'auth/register']) !!}
    {!! Form::label('name', '名前') !!}
    {!! Form::text('name', null, ['placeholder' => 'Your Name']) !!}

    {!! Form::label('email', 'メールアドレス') !!}
    {!! Form::text('email', null, ['placeholder' => 'example@example.com']) !!}

    {!! Form::label('password', 'パスワード') !!}
    {!! Form::password('password', null) !!}

    {!! Form::label('password_confirmation', 'パスワード確認') !!}
    {!! Form::password('password_confirmation', null) !!}

    {!! Form::submit('登録', ['data-role' => 'button']) !!}
  {!! Form::close() !!}
</div>
@endsection
