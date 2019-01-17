<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Cases;
use App\Customer;
use App\User;
use App\Software;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function table()
    {
       $products=Customer::all();
       return view('table', compact('products'));
    }

    public function cases(Request $req)

    {
        //return $req->all();        
        $software=$req->soft_id;
        $problem=$req->problem;
        $solution=$req->solution;
        $remark=$req->remark;
        $solved=$req->solved;
        $customer_id=$req->customer_id;
        //$customerdata=Customer::find($customer_id);
        $url=$req->url;
        //$user_id=Auth::id();
        
        $newcase=new Cases;
        $newcase->soft_id=$software;
        $newcase->problem=$problem;
        $newcase->solution=$solution;
        $newcase->remark=$remark;
        $newcase->solved=$solved;
        $newcase->customer_id=$customer_id;
        $newcase->user_id=Auth::id();


        $newcase->save();

        return redirect($url);
    }

    public function customer()
    {
        $customer=Cases::all();
        echo $customer->soft_id.' -- ';
        echo $customer->problem.' -- ';
        echo $customer->solution.' -- ';
        echo $customer->remark.' -- ';
        echo $customer->solved.' -- ';
        echo $customer->customer_id.' -- ';
        echo $customer->cases->name.' -- ';
        echo $customer->user->name;
    }

    public function addcaseform()
    {
        
        return view('addcaseform');
    }

    public function addcase($id)
    {
        $softwares=Software::all();
        $customer=Customer::find($id);
        return view('addcaseform', compact('customer', 'softwares'));
    }

    public function search(Request $req)
    {
        //return $req->all();
        $phone=$req->phone_no;
        $customer=Customer::where('phone_no', $phone)->first();
        if(!empty($customer)){
        $cid = $customer->id;
        $requ=request()->query();
        $cases = Cases::where('customer_id', $cid)->orderBy('id', 'desc')->paginate(5)->appends($requ);
        return view('customersearch', compact('customer','cases'));
        }
        else {
            return view('customers.create');
        }
    }
}
