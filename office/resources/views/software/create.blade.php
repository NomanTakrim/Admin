@extends('layouts.master') 
@section('content')

<div class="container">
    <h1>Add Software</h1>
<form action="{{action('SoftwareController@store')}}" method="post">
       
        <div class="form-group">
            <h4><label>Software Name</label></h4>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <h4><label>Version</label></h4>
            <input type="text" class="form-control" name="version">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="/software">Back</a>

    </form>
</div>
@endsection