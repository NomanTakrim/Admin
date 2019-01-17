@extends('layouts.master') 
@section('content')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Case Details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <h2>
                    <tr>
                        <td>
                            ID
                        </td>
                        <td>
                            Customer Name
                        </td>
                        <td>
                            Software
                        </td>
                        <td>
                            Version
                        </td>
                        <td>
                            Problem
                        </td>

                        <td>
                            Solution
                        </td>
                        <td>
                            Solved
                        </td>
                        <td>
                            Support By
                        </td>
                        <td>
                            Created At
                        </td>
                        <td>
                            Edit
                        </td>
                        <td>
                            Delete
                        </td>
                    </tr>
                </h2>
                @foreach($cases as $case)
                <tr>
                    <td><a href="custcase/{{$case->id}}">{{$case->id}}</td>
                @if($case->customer)
                <td>{{$case->customer->name}}</td>
                @else
                <td>Not Found</td>
                @endif
                <td>{{$case->software->name}}</td>
                <td>{{$case->software->version}}</td>
                <td>{{str_limit($case->problem, 10)}}</td>
                <td>{{str_limit($case->solution, 10)}}</td>
                @if($case->solved==1)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                @if($case->user)
                <td>{{$case->user->name}}</td>
                @else
                <td>Not Found</td>
                @endif
                <td>{{$case->created_at}}</td>
                <td><a href="/custcase/{{$case->id}}/edit" class="btn btn-warning" >Edit</a></td>
                    @if(Auth::user()) @if(Auth::user()->type==1)
                    <td>
                        <form action="{{action('CaseController@destroy', $case->id)}}" method="post">
                            <input type="hidden" name="_method" value="delete"> @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                    </form>
                </td>
                @endif
                @endif
            </tr>
            @endforeach
        </table>
        <hr>
        <a class="btn btn-primary" href="/">Back</a>
    </div>
   

    
    <div class="pagination">
            {{$cases->links()}}
    </div>

</div>
</section>
@endsection