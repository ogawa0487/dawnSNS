@extends('layouts.login')

@section('content')
プロフィール画面到達！
{!! Form::open(['url' => 'upProfile']) !!}
  <div>
    Username
    {!! Form::input('text', 'newUsername', $user->username, ['required', 'class' => 'form-control']) !!}
  </div>

  <div>
    Mailadress
    {!! Form::input('text', 'newMail', $user->mail, ['required', 'class' => 'form-control']) !!}
  </div>

  <div>
    Password
    {!! Form::input('text', 'new', '●●●●●●', ['required', 'class' => 'form-control']) !!}
  </div>

  <div>
    newPassword
   {!! Form::input('text', 'newPass', null, ['class' => 'form-control']) !!}
  </div>

  <div>
    Bio
    {!! Form::input('text', 'newBio', $user->bio, ['required', 'class' => 'form-control']) !!}
  </div>

  <div>
    Iconimage
    {!! Form::input('text', 'newIcon', $user->images, ['required', 'class' => 'form-control']) !!}
  </div>
<button type="submit" class="btn btn-primary pull-right">更新したい</button>
{!! Form::close() !!}



@endsection
