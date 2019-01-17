@extends('layouts.master') 
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Software Details</h3>
        </div>
        <div class="box-body">

        <table class="table table-bordered">

            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Version</td>
                <td>Updated At</td>
                <td>Created At</td>
                @if(Auth::user())
                <td>Edit</td>
                @endif @if(Auth::user()) @if(Auth::user()->type==1)
                <td>Delete</td>
                @endif @endif
            </tr>

            @foreach($softwares as $software)
            <tr>
                <td><a href="software/{{$software->id}}">{{$software->id}}</a></td>
                <td>{{$software->name}}</td>
                <td>{{$software->version}}</td>
                <td>{{$software->updated_at}}</td>
                <td>{{$software->created_at}}</td>
                @if(Auth::user())
                <td>
                    <a href="/software/{{$software->id}}/edit" class="btn btn-warning">Edit</a>
                </td>
                @endif @if(Auth::user()) @if(Auth::user()->type==1)
                <td>
                    <form action="{{action('SoftwareController@destroy', $software->id)}}" method="POST">
                        <input type="hidden" name="_method" value="delete"> @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">DELETE</button>
                    </form>
                </td>
                @endif @endif
            </tr>
            @endforeach
        </table>
        <hr>
        <a class="btn btn-primary" href="/">Back</a>
    </div>
    
    <div class="pagination">
            {{$softwares->links()}}
        </div>
    </div>
    

</section>
@endsection