<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Cases;

class UserController extends Controller
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
        $users=User::orderBy('id', 'desc')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'email'=>'required|email|unique:users',
            'type'=>'required',
            'password'=>'required',
            'password'=>'required|confirmed'
        ]);

        $name=$req->name;
        $type=$req->type;
        $email=$req->email;
        $password=$req->password;

        $user=new User;

        $user->name=$name;
        $user->type=$type;
        $user->email=$email;
        $user->password=bcrypt($password);

        $user->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('users.show', compact('user'));
        //return $user;
        //return 'Got you from show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('users.edit', compact('user'));
        //return 'got you from edit';
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
        $type=$req->type;
        $email=$req->email;

        $user=User::find($id);

        $user->name=$name;
        $user->type=$type;
        $user->email=$email;

        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function userview($id)
    {
        $user=User::find($id);
        return view('users.passchange', compact('user'));
    }

    public function changepass(Request $req, $id)
    {
        $password=$req->password;
        $changepass=User::find($id);
        //return $changepass;
        
        $changepass->password=bcrypt($password);
        $changepass->save();
        return redirect('/users');
    }

   
}
