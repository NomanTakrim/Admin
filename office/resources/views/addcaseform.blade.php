@extends('layouts.master') 
@section('content')

<div class="container">
    <h1>Case Update</h1>
    <form action="/cases" method="POST">
        @csrf
        <div class="form-group">
            <h4><label>Customer Name</label></h4>
            <input type="text" class="form-control" name="name" value="{{$customer->name}}" readonly>
            <input type="hidden" class="form-control" name="customer_id" value="{{$customer->id}}">

        </div>


        <div class="form-group">
            <h4><label>Software</label></h4>
            <select name="soft_id" class="form-control">
                            
                                @foreach($softwares as $software)
                        <option value="{{$software->id}}">{{$software->name}}</option>
                            @if(Auth::user()->type==1)
                                <option value="{{$software->id}}">{{$software->name}}</option>
                            @else
                                <option value="{{$software->id}}" readonly>{{$software->name}}</option>
                            @endif
                        @endforeach  
                    </select>

        </div>

        {{--
        <div class="form-group">
            <h4><label>Software</label></h4>
            <select name="soft_id" class="custom-select mb-1">
                <option value="acronis">ACRONIS</option>
                <option value="barracuda">BARRACUDA</option>
                <option value="eset">ESET</option>
                <option value="observeit">OBSERVEIt</option>
                <option value="group_ib">GROUP-IB</option>
                <option value="tripware">TRIPWARE</option>
                <option value="qratorlabs">QRATORLabs</option>
                <option value="network_intelligence">Network Intelligence</option>
            </select>
        </div> --}}

        <div class="form-group">
            <h4><label>Problem</label></h4>
            <input type="text" class="form-control" name="problem">
        </div>


        <div class="form-group">
            <h4><label>solution</label></h4>
            <input type="text" class="form-control" name="solution">
        </div>

        <div class="form-group">
            <h4><label>Remark</label></h4>
            <input type="text" class="form-control" name="remark">
            <input type="hidden" class="form-control" name="url" value="/customersearch?phone_no={{$customer->phone_no}}">
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="solved" id="yes" value="1" checked>
                <label class="form-check-label" for="yes">
              Yes
            </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="solved" id="no" value="0" checked>
                <label class="form-check-label" for="no">
              No
            </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/customersearch?phone_no={{$customer->phone_no}}" class="btn btn-primary">Back</a>

    </form>
</div>
@endsection