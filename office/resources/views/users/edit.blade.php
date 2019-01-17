@extends('layouts.master') 
@section('content')
<div class="container">
    <h1>User Edit</h1>
    <form action="{{action('UserController@update', $user->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <h4><label>User Name</label></h4>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <h4><label>Type</label></h4>
           
            <input type="text" class="form-control" name="type" value="{{$user->type}}"> 


        </div>

        <div class="form-group">
            <h4><label>Email</label></h4>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <h4><label>Updated At</label></h4>
            <input type="text" class="form-control" name="updated_at" value="{{$user->updated_at}}" readonly>
        </div>

        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/users" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection