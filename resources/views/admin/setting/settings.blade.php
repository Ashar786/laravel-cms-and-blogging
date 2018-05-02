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
            <form action="{{ route('setting.update') }}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="site_name">Name</label>
                    <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Name">Contact Number</label>
                    <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Name">Contact Email</label>
                    <input type="text" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Name">Address</label>
                    <input type="text" name="address" value="{{$settings->address}}" class="form-control">


                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" value="Update Settings" class="text-center">
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop