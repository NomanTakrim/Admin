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
                    <td>Software ID</td>
                    <td>{{$software->id}}</td>
                </tr>
                <tr>
                    <td>User name</td>
                    <td>{{$software->name}}</td>
                </tr>
                <tr>
                    <td>Version </td>
                    <td>{{$software->version}}</td>
                </tr>

                <tr>
                    <td>Updated At</td>
                    <td>{{$software->updated_at}}</td>

                </tr>
                <tr>
                    <td>Created At </td>
                    <td>{{$software->created_at}}</td>
                </tr>
            </table>
            <a class="btn btn-primary" href="/software">Back</a>
        </div>
    </div>
</section>
@endsection