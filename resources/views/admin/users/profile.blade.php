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
            Update Profile
        </div>

        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">PassWord</label>
                    <input type="password" name="password"  class="form-control">
                </div>

                <div class="form-group">
                    <label for="avatar">avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About Me</label>
                    <input type="text" name="about" value="{{$user->profile->about}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook Link</label>
                    <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Youtube">Youtube Link</label>
                    <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" value="Update Profile" class="text-center">
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop