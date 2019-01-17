@extends('layouts.master') 
@section('content')
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Case Details</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <td>Case ID</td>
                    <td>{{$case->id}}</td>
                </tr>
                <tr>
                    <td>Customer name</td>
                    @if($case->customer)
                    <td>{{$case->customer->name}}</td>
                    @else
                    <td>Customer not found</td>
                    @endif
                </tr>
                <tr>
                    <td>Software </td>
                    <td>{{$case->software->name}}</td>
                </tr>
                <tr>
                    <td>Version </td>
                    <td>{{$case->software->version}}</td>
                </tr>
                <tr>
                    <td>Problem </td>
                    <td>{{$case->problem}}</td>
                </tr>
                <tr>
                    <td>Solution </td>
                    <td>{{$case->solution}}</td>
                </tr>
                <tr>
                    <td>Solved</td>
                    @if($case->solved==1)
                    <td>Yes</td>
                    @else
                    <td>No</td>
                    @endif
                </tr>
                <tr>
                    <td>Created At </td>
                    <td>{{$case->created_at}}</td>
                </tr>
            </table>
            <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
        </div>
    </div>
</section>
@endsection