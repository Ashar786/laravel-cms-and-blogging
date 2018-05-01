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
            <form action="{{ route('post.update',['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
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
                            <option value="{{$category->id}}"
                            @if($post->Category->id == $category->id)
                                selected
                                    @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @foreach($tags as $tag)
                        <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                            @foreach($post->tags as $t)
                                @if($tag->id == $t->id)
                                    checked
                                        @endif
                                    @endforeach
                            >{{$tag->tag}}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
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