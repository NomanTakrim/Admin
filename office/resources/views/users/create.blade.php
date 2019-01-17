@extends('layouts.master') 
@section('content')

<div class="container">
    <h1>Add User</h1>

    <!-- validation all !-->
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- validation all !-->

<form action="{{action('UserController@store')}}" method="post">
       
        <div class="form-group">
            <h4><label>User Name</label></h4>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>

        <div class="form-group">
            <h4><label>Type</label></h4>
            <select name="type" class="custom-select mb-1">
                    <optgroup label="Selected User">
                    <option value="0">Admin</option>
                    </optgroup>
                    <optgroup label="Select from list">
                    <option value="1">Super Admin</option>
                    </optgroup>
                  </select>
        </div>
        <div class="form-group">
            <h4><label>Email</label></h4>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <h4><label>Password</label></h4>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <h4><label>Confirm Password</label></h4>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="/users">Back</a>

    </form>
</div>
@endsection