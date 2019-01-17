@extends('layouts.master') 
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">User Data</h3>
        </div>
        <div class="box-body">

            <table class="table table-bordered">

                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Type</td>
                    <td>Email</td>
                    <td>Updated At</td>
                    <td>Created At</td>
                    <td>Edit</td>
                    @if(Auth::user()->type==1)
                    <td>Delete</td>
                    @endif
                </tr>

                @foreach($users as $user)
                <tr>
                    <td><a href="users/{{$user->id}}">{{$user->id}}</a></td>
                    <td>{{$user->name}}</td>
                    @if($user->type==1)
                    <td>Super Admin</td>
                    @else
                    <td>Admin</td>
                    @endif
                    <td>{{$user->email}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    @if(Auth::user()->type==1)
                    <td>
                        <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                            <input type="hidden" name="_method" value="delete"> @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">DELETE</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
            <hr>
            <a class="btn btn-primary" href="/">Back</a>
        </div>
        
        <div class="pagination">
            {{$users->links()}}
        </div>

    </div>
</section>
@endsection