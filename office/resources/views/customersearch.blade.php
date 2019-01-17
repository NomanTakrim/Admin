@extends('layouts.master')
@section('content')
    <div class="container">
        <h3>Customer Details</h3>
        <table class="table">
            <tr>
                <td>Customer ID</td>
                <td>{{$customer->id}}</td>
            </tr>
            <tr>
                <td>Name </td>
                <td>{{$customer->name}}</td>
            </tr>
            <tr>
                <td>Email </td>
                <td>{{$customer->email}}</td>
            </tr>
            <tr>
                <td>Phone No </td>
                <td>{{$customer->phone_no}}</td>
            </tr>
            <tr>
                <td>User Name </td>
                <td>{{$customer->user->name}}</td>
            </tr>
            <tr>
                <td>Created At </td>
                <td>{{$customer->created_at}}</td>
            </tr>
        </table>
        <hr>
        <h3>Cases</h3>
        <form action="/addcaseform" method="POST">
            <a class="btn btn-primary" href="/case/{{$customer->id}}">Add Cases</a>
        <table class="table">
           <h2><tr>
            <td><h5>ID</h5></td>
            <td><h5>Software</h5></td>
            <td><h5>Problem</h5></td>
            <td><h5>Solution</h5></td>
            <td><h5>Remark</h5></td>
            <td><h5>Solved</h5></td>
            <td><h5>Supp. By</h5></td>
        </tr></h2>
            
            @foreach($cases as $case)
            <tr>
                <td>{{$case->id}}</td>
                <td>{{$case->soft_id}}</td>
                <td>{{$case->problem}}</td>
                <td>{{$case->solution}}</td>
                <td>{{$case->remark}}</td>
                @if($case->solved==1)
                <td>Done</td>
                @else
                <td>Not done</td>
                @endif @if($case->user)
                <td>{{$case->user->name}}</td>
                @else
                <td>User not found</td>
                @endif
            </tr>
            @endforeach
        </table>

        <div class="pagination">
            {{$cases->appends(request()->query())->links()}}
        </div>
       
    </form>
    </div>
@endsection 