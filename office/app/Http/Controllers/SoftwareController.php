<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use App\Software;
class SoftwareController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $softwares=Software::orderBy('id', 'desc')->paginate(10);
        return view('software.index', compact('softwares'));
    }

    
    public function create()
    {
        $software=Software::all();
        return view('software.create', compact('software'));
    }

    public function store(Request $req)
    {
       $name=$req->name;
       $version=$req->version;

       $software=new Software;

       $software->name=$name;
       $software->version=$version;

       $software->save();

       return redirect('/software');
    }

    
    public function show($id)
    {
        $software=Software::find($id);
        return view('software.show', compact('software'));
    }

   
    public function edit($id)
    {
        $softwares=Software::all();
        $software=Software::find($id);
        return view('software.edit', compact('software', 'softwares'));
    }

    
    public function update(Request $req, $id)
    {
        $name=$req->name;
        $version=$req->version;

        $software=Software::find($id);

        $software->name=$name;
        $software->version=$version;

        $software->save();
        return redirect('/software');
    }

    
    public function destroy($id)
    {
        $software=Software::find($id);
        $software->delete();
        return redirect('/software');
    }
}
