@extends('layouts.master') 
@section('content')

<section class="content">
    <div class="box-header with-border">
        <h3 class="box-title">Report Details</h3>
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Software</td>
                    <td>Version</td> 
                    <td>Problem</td>
                    <td>Solution</td>
                    <td>Remark</td>
                    <td>Solved?</td>
                    <td>Customer</td>
                    <td>User</td>
                    <td>Created At</td>
                    <td>Updated At</td>
                </tr>
                @if(!empty($data)) 
                @foreach($data as $soft)

                <tr @if($soft->solved==1) class="table-success" @else class="table-danger" @endif>
                    <td>{{$soft->id}}</td>
                    <td>{{$soft->software->name}}</td>
                    <td>{{$soft->software->version}}</td>
                    <td>{{$soft->problem}}</td>
                    <td>{{$soft->solution}}</td>
                    <td>{{$soft->remark}}</td>
                    @if($soft->solved==1)
                    <td>Solved</td>
                    @else
                    <td>Unsolved</td>
                    @endif
                    <td>{{$soft->customer->name}}</td>
                    <td>{{$soft->user->name}}</td>
                    <td>{{$soft->created_at}}</td>
                    <td>{{$soft->updated_at}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">
                        <div class="text-center">No Data Found</div>
                    </td>
                </tr>
                @endif
            </table>
            <div class="pagination">
            </div>
        <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
        </div>
       
    </div>
</section>
@endsection