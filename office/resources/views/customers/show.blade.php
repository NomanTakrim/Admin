@extends('layouts.master') 
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">customer Details</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
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
                <tr>
                    <td>Updated At </td>
                    <td>{{$customer->updated_at}}</td>
                </tr>
            </table>
            <a class="btn btn-primary" href="/customer">Back</a>
        </div>
        
    </div>
</section>
@endsection