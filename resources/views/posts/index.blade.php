@extends('layouts.login')

@section('content')
        <table>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->posts }}</td>
                <!-- <td></td>投稿者の名前 ？-->
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </table>
@endsection
