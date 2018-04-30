@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Tag
        </div>
        <div class="card-body">
            <form action="{{route('tag.update',['id'=> $tag->id])}}"  method = "post">
                {{csrf_field()}}
                <label for="tag">Tag name</label>
                <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
                <div class="text-center">
                    <input type="submit" value="Save Tag ">
                </div>
            </form>
        </div>
    </div>
@endsection