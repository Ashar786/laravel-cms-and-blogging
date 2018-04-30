@extends('layouts.app')

@section('content')

    <div class="card">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
        <div class="card-header">
            Create New Post
        </div>

        <div class="card-body">
            <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" value="{{$post->featured}}" class="form-control">
                </div>

                <div class="for-group">
                    <label for="category"> Select Categories</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" placeholder="{{$post->content}}" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" value="Store Post" class="text-center">
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop