@extends('layouts.master') 
@section('content')

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Customer Data</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone no.</td>
                    <td>Created At</td>
                    <td>Edit</td>
                    @if(Auth::user()->type==1)
                    <td>Delete</td>
                    @endif
                </tr>
                @foreach($customers as $customer)
            <tr>
                <td><a href="customer/{{$customer->id}}">{{$customer->id}}</a></td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone_no}}</td>
                <td>{{$customer->created_at}}</td>
                <td>
                    <a href="/customer/{{$customer->id}}/edit" class="btn btn-warning">Edit</a>
                </td>
                @if(Auth::user()->type==1)
                <td>
                    <form action="{{action('CustomerController@destroy', $customer->id)}}" method="post">
                        <input type="hidden" name="_method" value="delete"> @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">DELETE</button>
                    </form>
                </td>
                @endif

            </tr>
            @endforeach
            </table>
            <hr>
            <a class="btn btn-primary" href="/report">Back</a>
        </div>
        
        <!-- /.box-body -->
        <div class="box-footer clearfix">
                {{$customers->links()}}
        </div>
        
    </div>
</section>

@endsection