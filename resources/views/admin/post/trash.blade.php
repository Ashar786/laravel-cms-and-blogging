@extends('layouts.app')
@section('content')
    <div class="card">
        <table class="table table-hover">
            <thead>
            <th>
                Image
            </th>
            <th>
                Trashed post
            </th>
            <th>
                Restore
            </th>
            <th>
                Delete
            </th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <img src="{{$post->featured}}" width="90px" height="50px">
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        <a href="{{route('post.restore',['id' => $post->id])}}" ><button type="button" class="btn btn-success">Restore</button></a>
                    </td>
                    <td>
                        <a href="{{route('post.kill',['id' => $post->id])}}" class="btn btn-danger">delete post</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection