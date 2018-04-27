@extends('layouts.app')
@section('content')
    <div class="card">
        <table class="table table-hover">
            <thead>
            <th>
                Image
            </th>
            <th>
               Post
            </th>
            <th>
                Edit
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
                        {{$post->content}}
                    </td>
                    <td>
                        {{--<a href="{{route('post.edit',['id' => $post->id])}}" ><button type="button" class="btn btn-success">edit post</button></a>--}}
                    </td>
                    <td>
                        <a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-danger">delete post</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection