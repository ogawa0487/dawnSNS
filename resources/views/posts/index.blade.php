@extends('layouts.login')

@section('content')
<div class='container'>
     {!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか？']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">投稿</button>
    {!! Form::close() !!}
</div>

<table>
  @foreach ($posts as $post)
  <tr>
      <td><img src="{{ asset('images/'.$post->images) }}" alt=""></td>
      <td>{{ $post->posts }}</td>
      <td>{{ $post->username }}</td>
      <td>{{ $post->created_at }}</td>
      <td>
        {!! Form::open(['url' => 'post/update']) !!}
          <div class="form-group">
          {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
          {!! Form::hidden('id', $post->id ) !!}
          </div>
          <button type="submit" class="btn btn-primary pull-right">編集</button>
        {!! Form::close() !!}
      </td>
      <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
  </tr>
  @endforeach
</table>
@endsection
