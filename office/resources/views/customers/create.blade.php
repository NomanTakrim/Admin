@extends('layouts.master') 
@section('content')

<div class="container">
    <h1>Add Customer</h1>

    <!-- validation all !-->
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- validation all !-->

    <form action="{{action('CustomerController@store')}}" method="post">


        <div class="form-group">
            <h4><label>Customer Name</label></h4>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            <!-- Individual validation !-->
            {{-- @if($errors->has('name'))
            <div class="alert alert-danger" role="alert">
                {{$errors->first('name')}}
            </div>
            @endif --}}
            <!-- Individual validation !-->
        </div>

        <div class="form-group">
            <h4><label>Email</label></h4>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
            <!-- Individual validation !-->
            {{-- @if($errors->has('email'))
            <div class="alert alert-danger" role="alert">
                {{$errors->first('email')}}
            </div>
            @endif --}}
            <!-- Individual validation !-->
        </div>
        <div class="form-group">
            <h4><label>Phone no.</label></h4>
            <input type="text" class="form-control" name="phone_no" value="{{old('phone_no')}}">
            <!-- Individual validation !-->
            {{-- @if($errors->has('phone_no'))
            <div class="alert alert-danger" role="alert">
                {{$errors->first('phone_no')}}
            </div>
            @endif --}}
            <!-- Individual validation !-->
        </div>
        <div class="form-group">
            <h4><label>Support By.</label></h4>
            <input type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}" readonly>
        </div>


        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="/customer">Back</a>

    </form>
</div>
@endsection