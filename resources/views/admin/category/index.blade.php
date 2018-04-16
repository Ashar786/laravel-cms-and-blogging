@extends('layouts.app')
@section('content')
    <div class="card">
        <table class="table table-hover">
            <thead>
                <th>
                    Category Name
                </th>
                <th>
                    Edit Category
                </th>
                <th>
                    Delete Category
                </th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{route('category.edit',['id' => $category->id])}}" ><button type="button" class="btn btn-primary">Edit</button></a>
                        </td>
                        <td>
                            <a href="{{route('category.delete',['id' => $category->id])}}" ><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection