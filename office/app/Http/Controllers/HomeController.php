<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Customer;
use App\Cases;
use App\Software;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today=Carbon::today();
        $todayreportget=Cases::whereDate('updated_at', '=', $today)->get();
        $todayreport=$todayreportget->count();

        $yesterday=Carbon::yesterday();
        $yesterdayreportget=Cases::wheredate('updated_at', '=', $yesterday)->get();
        $yesterdayreport=$yesterdayreportget->count();

        $today1=$today->addDay(1)->toDateString();

        $lastweek=$today->subweek()->toDateString();
        $lastweekreportget=Cases::whereBetween('updated_at', [$lastweek, $today1])->get();
        $lastweekreport=$lastweekreportget->count();

        $lastmonth=$today->subMonth()->toDateString();
        $lastmonthreportget=Cases::whereBetween('updated_at', [$lastmonth, $today1])->get();  //last month all report getting
        $lastmonthreport=$lastmonthreportget->count();  //last month report counting

        $lastmonthid = $lastmonthreportget->pluck('soft_id')->toArray();  //software id($lastmonthid) has been converted into array from $lastmonthreportget
        $acronisid = Software::where('name', 'acronis')->get()->pluck('id')->toArray();  //acronis id converted into array by comparing 'name' & 'acronis' in Model(Software)
        $esetid= Software::where('name', 'eset')->get()->pluck('id')->toArray();  ////eset id converted into array by comparing 'name' & 'eset' in Model(Software)
        
        $acronis = array_intersect($acronisid, $lastmonthid);  //matching array of software_id($lastmonthid) & acronis_id 
        $eset = array_intersect($esetid, $lastmonthid);  //matching array of software_id & eset

        $esetdata = Cases::whereIn('soft_id', $eset)->get();  //getting all eset data from Model(Cases)
        $esetcount= $esetdata->count();  //counting all eset data  
        
        $acronisdata = Cases::whereIn('soft_id', $acronis)->get();  //getting all acronis data from Model(Cases)
        $acroniscount = $acronisdata->count();  //counting all acronis data
        
        $customers=Customer::count();
        $users=User::count();
        $unsolved=Cases::where('solved', 0)->orderBy('id', 'desc')->paginate(10);
        $unsolvedcount=$unsolved->count();
        $data=[
            'todayreport'=>$todayreport,
            'yesterdayreport'=>$yesterdayreport,
            'lastweekreport'=>$lastweekreport,
            'lastmonthreport'=>$lastmonthreport,
            'users'=>$users,
            'unsolved'=> $unsolved,
            'unsolvedcount'=>$unsolvedcount,
            'customers'=>$customers,
            'esetcount'=>$esetcount,
            'acroniscount'=>$acroniscount
        ];
        return view('index', compact('data', 'unsolved', 'yesterdayreport'));
    }
}
