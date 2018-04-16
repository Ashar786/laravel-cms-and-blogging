@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Add New Category
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}"  method = "post">
                {{csrf_field()}}
                <label for="category">Category name</label>
                <input type="text" name="name" class="form-control">
                <div class="text-center">
                    <input type="submit" value="Save category">
                </div>
            </form>
        </div>
    </div>
@endsection