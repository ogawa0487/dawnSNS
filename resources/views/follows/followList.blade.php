@extends('layouts.login')

@section('content')
<table>
  @foreach ($posts as $post)
  <tr>
      <td>{{ $post->posts }}</td>
      <td>{{ $post->username }}</td>
      <td>{{ $post->created_at }}</td>
  </tr>
  @endforeach
</table>

@endsection
