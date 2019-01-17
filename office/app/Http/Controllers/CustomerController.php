<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use App\Customer;
use App\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $customers=Customer::orderBy('id','desc')->paginate(10);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req,[
            'name'=>'required', 
            'email'=>'required|email',
            'phone_no'=>'required'
        ]);
        $name=$req->name;
        $email=$req->email;
        $phone=$req->phone_no;
        $user_id=$req->user_id;

        $customer=new Customer;

        $customer->name=$name;
        $customer->email=$email;
        $customer->phone_no=$phone;
        $customer->user_id=$user_id;

        $customer->save();
        return redirect('/customersearch?phone_no='.$phone);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        $users=User::all();
        return view('customers.edit', compact('customer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        
        $name=$req->name;
        $email=$req->email;
        $phone_no=$req->phone_no;
        $user_name=$req->user_id;

        $customer=Customer::find($id);

        $customer->name=$name;
        $customer->email=$email;
        $customer->phone_no=$phone_no;
        $customer->user_id=$user_name;

        $customer->save();
        return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect ('/customer');
    }
}
