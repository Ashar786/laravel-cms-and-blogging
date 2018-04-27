@extends('layouts.app')
@section('content')

    <div class="card">
        @include('admin.includes.error')
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            <form action="{{route('category.update',['id' => $category->id])}}"  method = "post">
                {{csrf_field()}}
                <label for="category">Category name</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                <div class="text-center">
                    <input type="submit" value="Update category">
                </div>
            </form>
        </div>
    </div>
@endsection