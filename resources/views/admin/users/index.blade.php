@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <li class="list-group-item">
                <a href={{route('user.create')}}> Add New Users</a>
            </li>
        </div>
        <table class="table table-hover">
            <thead>
            <th>
                User Avatar
            </th>
            <th>
                Name
            </th>
            <th>
                Permission
            </th>
            <th>
                Delete
            </th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{asset($user->Profile->avatar)}}" width="60px" height="60px" style="border-radius: 50%;">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        @if($user->admin)
                            <a href="{{route('user.admin',['id' => $user->id])}}" ><button type="button" class="btn btn-primary">Remove Admin</button></a>
                        @else
                            <a href="{{route('user.admin',['id' => $user->id])}}" ><button type="button" class="btn btn-danger">Make Admin</button></a>
                            @endif
                    </td>
                    <td>
                        <a href="{{route('user.delete',['id' => $user->id])}}" ><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection