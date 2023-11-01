@extends('layouts.login')

@section('content')
プロフィール画面到達！
{!! Form::open(['url' => 'upProfile',  'files' => true]) !!}
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
    {!! Form::input('text', 'newBio', $user->bio, ['class' => 'form-control']) !!}
  </div>

  <div>
    Iconimage

    <input type="file" name="image">
     @if ($errors->has('image_name'))
  <span class="text-danger">{{$errors->first('image_name')}}</span>
  @endif
  @if ($errors->has('image'))
  <span class="text-danger">{{$errors->first('image')}}</span>
  @endif

  </div>
<button type="submit" class="btn btn-primary pull-right">更新したい</button>
{!! Form::close() !!}

@endsection
