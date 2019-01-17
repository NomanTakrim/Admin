@extends('layouts.master') 
@section('content')

<div class="container">
    <h1>Add Cases</h1>
    <form action="{{action('CaseController@store')}}" method="POST">
            

        <div class="form-group">
            <h4><label>Customer Name</label></h4>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <h4><label>Software</label></h4>
            <input type="text" class="form-control" name="sotf_id">
        </div>
        <div class="form-group">
            <h4><label>Problem</label></h4>
            <input type="text" class="form-control" name="problem">
        </div>
        <div class="form-group">
            <h4><label>Solution</label></h4>
            <input type="text" class="form-control" name="solution">
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
            <br><div class="form-group">
                <h4><label>Support By</label></h4>
                <input type="text" class="form-control" name="user_id" value="">
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="/custcase">Back</a>

    </form>
    </div>
@endsection