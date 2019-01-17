@extends('layouts.master') 
@section('content')
<div class="container">
    <h3>User Details</h3>
    <table class="table">
        <tr>
            <td>User ID</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td>User name</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Type </td>
            @if($user->type==1)
            <td>Super Admin</td>
            @else
            <td>Admin</td>
            @endif
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>{{$user->updated_at}}</td>

        </tr>
        <tr>
            <td>Created At </td>
            <td>{{$user->created_at}}</td>
        </tr>
    </table>
    <a class="btn btn-primary" href="/userview/{{$user->id}}">Change Password</a>
<a class="btn btn-primary" href="/users">Back</a>
</div>
@endsection