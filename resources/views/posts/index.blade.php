@extends('layouts.login')

@section('content')
<div class='container'>
     {!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか？']) !!}
    </div>
    <input type="image" name="btn_confirm" src="./images/post.png"  alt="次へ" value="次へ" width="30" height="30">
    {!! Form::close() !!}
</div>

<table>
  @foreach ($posts as $post)
  <tr>
      <td><img class="icon" src="{{ asset('storage/images/'.$post->images) }}" alt=""></td>
      <td>{{ $post->posts }}</td>
      <td>{{ $post->username }}</td>
      <td>{{ $post->created_at }}</td>

      <td>
        <div class="modalopen"  data-target="modal{{ $post->id }}">
          <img class="life-img" src="./images/edit.png" alt="編集">
        </div>
      </td>

      <td>
        <div class="modal-main js-modal" id="modal{{ $post->id }}">
          <div class="modal-inner">
            <div class="inner-content">
            {!! Form::open(['url' => 'post/update']) !!}
            <div class="form-group">
            {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
            {!! Form::hidden('id', $post->id ) !!}
            </div>
          <button type="submit" class="btn btn-primary pull-right">編集</button>
            {!! Form::close() !!}
            </div>
          </div>
        </div>
      </td>
      <td><a href="/post/{{ $post->id }}/delete"><img src="./images/trash.png" onMouseOver="this.src='./images/trash_h.png'" onMouseOut="this.src='./images/trash.png'" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></a></td>

  </tr>
  @endforeach
</table>
@endsection
