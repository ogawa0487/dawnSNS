@extends('layouts.login')

@section('content')
<div class='container'>
     {!! Form::open(['url' => '']) !!}
    <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">検索</button>
    {!! Form::close() !!}
</div>

<div class='container'>
  @foreach ($users as $user)
      {{ $user->username }}
  @endforeach
</div>


@endsection
