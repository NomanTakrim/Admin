<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cases;
use App\Customer;
use App\User;
use App\Software;

class CaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $software=Software::all();
        $customers=Customer::all();
        $users=User::all();
        $cases=Cases::orderBy('id', 'desc')->paginate(6);
        return view('cases.index', compact('cases', 'users', 'customers', 'software'));
    }

    public function create()
    {
        return view('cases.create');
    }

    public function store(Request $req)
    {
       
    }
 
    public function show($id)
    {
       $case=Cases::find($id);
       return view('cases.show', compact('case'));
    }

    public function edit($id)
    {
        $softwares=Software::all();
        $case=Cases::find($id);
        $users=User::all();
        $customers=Customer::all();
        return view('cases.edit', compact('case', 'users', 'customers', 'softwares'));
    }

    public function update(Request $req, $id)
    {
        $software=$req->soft_id;
        $problem=$req->problem;
        $solution=$req->solution;
        $solved=$req->solved;
        $users=$req->user_id;

        $case=Cases::find($id);

        $case->soft_id=$software;
        $case->problem=$problem;
        $case->solution=$solution;
        $case->solved=$solved;
        $case->user_id=$users;

        $case->save();
        return redirect('/custcase');
    }

    public function destroy($id)
    {
        $cases=Cases::find($id);
        $cases->delete();
        return redirect('/custcase');
    }
}
