@extends('layouts.app')
@section('content')

    <div class="card">
        {{--@include('admin.category.error')--}}
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            <form action="{{route('category.update',['id' => $categor->id])}}"  method = "post">
                {{csrf_field()}}
                <label for="category">Category name</label>
                <input type="text" name="name" class="form-control" value="{{$catego->name}}">
                <div class="text-center">
                    <input type="submit" value="Update category">
                </div>
            </form>
        </div>
    </div>
@endsection