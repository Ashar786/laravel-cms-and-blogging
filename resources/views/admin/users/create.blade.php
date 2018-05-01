@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Add New User
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}"  method = "post">
                {{csrf_field()}}
                <label for="name">User name</label>
                <input type="text" name="name" class="form-control">
                <label for="email">User Email</label>
                <input type="email" name="email" class="form-control">
                <div class="text-center">
                    <input type="submit" value="Add User">
                </div>
            </form>
        </div>
    </div>
@endsection