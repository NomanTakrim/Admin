@extends('layouts.master') 
@section('content')
<section class="content">
    <h1>Software Edit</h1>
    <form action="{{action('SoftwareController@update', $software->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="box-body">
            <div class="form-group">
                <h4><label>Software</label></h4>
                <select name="name" class="form-control">
                <optgroup label="Selected Software">  
                    @foreach($softwares as $software)  
                            <option value="{{$software->id}}">{{$software->name}}</option>
                           
                    </optgroup>
                    <optgroup label="Select from list">
                                @if(Auth::user()->type==1)
                              
                                    <option value="{{$software->id}}">{{$software->name}}</option>
                                
                                @else
                                
                                    <option value="{{$software->id}}" readonly>{{$software->name}}</option>
                                
                                @endif
                            
                            
                            @endforeach
                        </optgroup>
                       
                          
                   
                        </select>

            </div>



            <div class="form-group">
                <h4><label>Version</label></h4>

                <input type="text" class="form-control" name="version" value="{{$software->version}}">
            </div>

            <div class="form-group">
                <h4><label>Updated At</label></h4>
                <input type="text" class="form-control" name="updated_at" value="{{$software->updated_at}}" readonly>
            </div>

            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/software" class="btn btn-primary">Back</a>
        </div>
    </form>
</section>
@endsection