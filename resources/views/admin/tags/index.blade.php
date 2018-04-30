@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Add New Tag
        </div>
        <div class="card-body">
            <form action="{{route('tag.store')}}"  method = "post">
                {{csrf_field()}}
                <label for="tag">Tag name</label>
                <input type="text" name="tag" class="form-control">
                <div class="text-center">
                    <input type="submit" value="Save Tag ">
                </div>
            </form>
        </div>
        @if($tags->count() > 0)
        <table class="table table-hover">
            <thead>
            <th>
                Tags Name
            </th>
            <th>
                Edit tag
            </th>
            <th>
                Remove Tag
            </th>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                    </td>
                    <td>
                        <a href="{{route('tag.edit',['id' => $tag->id])}}" ><button type="button" class="btn btn-primary">Edit</button></a>
                    </td>
                    <td>
                        <a href="{{route('tag.delete',['id' => $tag->id])}}" ><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            @endif
    </div>
@endsection