@extends('layouts.login')

@section('content')
<div class='container'>
     {!! Form::open(['url' => 'userSearch']) !!}
    <div class="form-group">
    {!! Form::input('text', 'keyword', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">検索</button>
    {!! Form::close() !!}
</div>

  @foreach ($users as $user)
  <div>
    {{ $user->username }}
    @if($followings->contains($user->id))
    {!! Form::open(['url' => '/deletefollow']) !!}
    {!! Form::hidden('id', $user->id ) !!}
    <button type="submit" class="btn btn-success pull-right">フォローを外す</button>
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/newfollow']) !!}
    {!! Form::hidden('id', $user->id ) !!}
    <button type="submit" class="btn btn-success pull-right">フォローする</button>
    {!! Form::close() !!}
    @endif
  </div>
  @endforeach
</div>


@endsection
