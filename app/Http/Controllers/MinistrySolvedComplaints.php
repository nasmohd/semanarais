<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use App\Models\Ministry;
use Auth;
use DB;

class MinistrySolvedComplaints extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $name = Auth::user()->name;

        $complaints = User::where('name', 'admin');

        // $complaints = DB::table('complaints')->where ('ministry', 'ministry of work');
        $query = "select * from complaints where ministry = '".$name."' and status = '1'";
        $complaints = DB::select($query, [true]);

        // $data = ['complaints' => $complaints, 'ministries' => $ministries];
        // $data = ['complaints' => $complaints];
        // echo $name;
        // print_r($data);
        // return view ('dashboard')->with('complaints', $complaints);
        // return view ('Ministrydashboard')->with('complaints', $data);
        $ministries = Ministry::all();

        // $complaints = Complaint::all();
        $data = ['complaints' => $complaints, 'ministries' => $ministries];

        // print_r($complaints);
        // return view ('dashboard')->with('complaints', $complaints);
        return view ('MinistrySolved')->with('complaints', $complaints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
