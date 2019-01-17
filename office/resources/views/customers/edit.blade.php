@extends('layouts.master') 
@section('content')
<section class="content">

    <h1>Customer Edit</h1>
    <form action="{{action('CustomerController@update', $customer->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">

        <div class="box-body">

            <div class="form-group">
                <h4><label>Customer Name</label></h4>
                <input type="text" class="form-control" name="name" value="{{$customer->name}}">
            </div>

            <div class="form-group">
                <h4><label>Email</label></h4>
                <input type="text" class="form-control" name="email" value="{{$customer->email}}">
            </div>

            <div class="form-group">
                <h4><label>Phone no.</label></h4>
                <input type="text" class="form-control" name="phone_no" value="{{$customer->phone_no}}">
            </div>

            <div class="form-group">
                <h4><label>Registerd By</label></h4>
                <select name="user_id" class="form-control">
                                              <optgroup label="Selected User">
                                          <option value="{{$customer->user->id}}">{{$customer->user->name}}</option>
                                              </optgroup>
                                              <optgroup label="Select from UserList">
                                          @foreach($users as $user)
                                              @if(Auth::user()->type==1)
                                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                              @else
                                                  <option value="{{$user->id}}" readonly>{{$user->name}}</option>
                                              @endif
                                          @endforeach
                                              </optgroup>
                                      </select>
            </div>
            <div class="form-group">
                <h4><label>Updated At</label></h4>
                <input type="text" class="form-control" name="updated_at" value="{{$customer->updated_at}}" readonly>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/customer" class="btn btn-primary">Back</a>
    </form>
    </form>
    </div>
    </div>
@endsection