@extends('layouts.master') 
@section('content')
<section class="content">
    <h1>Case Edit</h1>
    <form action="{{action('CaseController@update', $case->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="box-body">
            <div class="form-group">
                <h4><label>Customer Name</label></h4>
                @if($case->customer)
                <input type="text" class="form-control" name="name" value="{{$case->customer->name}}" readonly> @else
                <input type="text" class="form-control" name="name" value="Customer Not Found" readonly> @endif
            </div>

            <div class="form-group">
                <h4><label>Software</label></h4>
                <select name="soft_id" class="form-control">  
                @foreach($softwares as $software)
                        @if(Auth::user()->type==1)
                    <option value="{{$software->id}}">{{$software->name}}</option>
                        @else
                    <option value="{{$software->id}}" readonly>{{$software->name}}</option>
                    @endif
                @endforeach  
            </select>
            </div>


            <div class="form-group">
                <h4><label>Problem</label></h4>
                <input type="text" class="form-control" name="problem" value="{{$case->problem}}">
            </div>
            <div class="form-group">
                <h4><label>Solution</label></h4>
                <input type="text" class="form-control" name="solution" value="{{$case->solution}}">
            </div>

            <div class="form-group">
                <h4><label>Solved</label></h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="solved" id="yes" value="1" checked>
                    <label class="form-check-label" for="yes">Yes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="solved" id="no" value="0" checked>
                    <label class="form-check-label" for="no">No</label>
                </div>

            </div>


            <div class="form-group">
                <h4><label>Support By</label></h4>
                <select name="user_id" class="form-control">
                    <optgroup label="Selected User">
                <option value="{{$case->user->id}}">{{$case->user->name}}</option>
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
                <input type="text" class="form-control" name="updated_at" value="{{$case->updated_at}}" readonly>
            </div>

            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/custcase" class="btn btn-primary">Back</a>
        </div>
    </form>
    </div>
@endsection