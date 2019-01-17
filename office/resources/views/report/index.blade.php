@extends('layouts.master') 
@section('content')

<section class="content">

  <div class="box-header with-border">
    <h3 class="box-title">Report</h3>
  </div>

  <form class="form-inline" action="/report" method="post">
    <div class="form-group mb-2">
      <label for="datapickerfrom" class="sr-only">From</label>
      <input type="text" name="from" class="form-control" id="datapickerfrom" placeholder="From">

    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label for="datapickerto" class="sr-only">To</label>
      <input type="text" name="to" class="form-control" id="datapickerto" placeholder="To">
    </div>
    @csrf
    <button type="submit" class="btn btn-primary mb-2">Search</button>
  </form>
  <div class="box-body">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$data['todayreport']}}</h3>
            <p>Today</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="/report/today" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$data['yesterdayreport']}}</h3>

            <p>Yesterday</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/report/yesterday" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$data['lastweekreport']}}</h3>

            <p>Last Week</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/report/lastweek" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$data['lastmonthreport']}}</h3>

            <p>Last Month</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/report/lastmonth" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$data['customers']}}</h3>
            <p>Customers</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="/customer" class="small-box-footer">
                      More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$data['unsolvedcount']}}</h3>

            <p>Unsolved</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#bottom" class="small-box-footer">
                      More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$data['acroniscount']}}</h3>

            <p>Acronis This Month
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/report/acronis" class="small-box-footer">
                      More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$data['esetcount']}}</h3>

            <p>ESET This Month
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/report/eset" class="small-box-footer">
                      More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>

  <div class="box">
    <div class="box-body">
      <h3>All Unsolved</h3>
      <table class="table table-bordered">
        <tr>
          <td>
            <h4>ID</h4>
          </td>
          <td>
            <h4>Software
              <h4>
          </td>
          <td>
            <h4>Version
              <h4>
          </td>
          <td>
            <h4>Problem
              <h4>
          </td>
          <td>
            <h4>Solution
              <h4>
          </td>
          <td>
            <h4>Remark
              <h4>
          </td>
          <td>
            <h4>Customer
              <h4>
          </td>
          <td>
            <h4>User
              <h4>
          </td>
          <td>
            <h4>Updated At
              <h4>
          </td>
        </tr>

        @foreach($unsolved as $un)
        <tr>
          <td><a href="/custcase/{{$un->id}}">{{$un->id}}</a></td>
          <td>{{$un->software->name}}</td>
          <td>{{$un->software->version}}</td>
          <td>{{str_limit($un->problem, 10)}}</td>
          <td>{{str_limit($un->solution, 10)}}</td>
          <td>{{$un->remark}}</td>
          @if($un->customer)
          <td>{{$un->customer->name}}</td>
          @endif
          <td>{{$un->user->name}}</td>
          <td>{{$un->updated_at}}</td>
        </tr>
        @endforeach
      </table>

      <div class="pagination">
        {{$unsolved->links()}}
      </div>
      <div id="bottom"></div>
    </div>
  </div>
</section>
@endsection