@extends('layouts.login')

@section('content')
<table>
  @foreach ($posts as $post)
  <tr>
<td><a href="/OtherProfile/{{ $post->id }}"><img src="{{ asset('storage/images/'.$post->images) }}" ></a></td>
      <td>{{ $post->posts }}</td>
      <td>{{ $post->username }}</td>
      <td>{{ $post->created_at }}</td>
  </tr>
  @endforeach
</table>

@endsection
