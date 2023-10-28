@extends('layouts.login')

@section('content')

<div>Name
  <span>{{ $icon->username }}</span>
</div>
<div>Bio
  <span>{{ $icon->bio }}</span>
</div>

@if($followings->contains($icon->id))
    {!! Form::open(['url' => '/deletefollow']) !!}
    {!! Form::hidden('id', $icon->id ) !!}
    <button type="submit" class="btn btn-success pull-right">フォローを外す</button>
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/newfollow']) !!}
    {!! Form::hidden('id', $icon->id ) !!}
    <button type="submit" class="btn btn-success pull-right">フォローする</button>
    {!! Form::close() !!}
@endif

<table>
  @foreach ($profile as $pro)
  <tr>
<td><img src="{{ asset('storage/images/'.$pro->images) }}" ></a></td>
      <td>{{ $pro->posts }}</td>
      <td>{{ $pro->username }}</td>
      <td>{{ $pro->created_at }}</td>
  </tr>
  @endforeach
</table>

@endsection
