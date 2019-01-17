@extends('layouts.master') 
@section('content')
<div class="container">
  <h3>Change Password</h3>
  <div class="panel panel-default">
    <div class="panel-body">
    <form id="form-change-password" role="form" method="post" action="/changepass/{{$user->id}}" novalidate class="form-horizontal">
        <div class="col-md-9">
          <label for="password" class="col-sm-4 control-label">Change Password</label>
          <div class="col-sm-8">
            <div class="form-group">
              <input type="password" class="form-control" id="id" name="password" placeholder="Password">
            </div>
          </div>
        </div>
        @csrf
        <button type="submit" class="btn btn-danger">Submit</button>
      </form>
    </div>
  </div>
</div>
</section>
@endsection
 {{-- {{action('UserController@update', $user->id)}} --}} {{-- <input type="hidden" name="_method" value="PUT">--}}