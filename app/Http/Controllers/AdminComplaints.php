<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use App\Models\Ministry;
use DB;
// use App\Models\Complaint;


class AdminComplaints extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $Userlist = User::where('id', '<=', $correctedComparisons)->get();
        // $MinistryCount = "select count(id) as ministries from users where role_id != 3";

        $MinistryCount = "select count(id) as ministries from ministries";
        $MinistryCount = DB::select($MinistryCount, [true]);

        $MinistryCount = $MinistryCount[0]->ministries;
        // echo ($MinistryCount[0]->ministries);
        // print_r($MinistryCount);
        // $MinistryCount = Ministry::count();
        $ComplaintCount = Complaint::count();

        $UserCount = "select count(id) as users from users where role_id != 3 and id > 1 and role_id != 4";
        $UserCount = DB::select($UserCount, [true]);
        $UserCount = $UserCount[0]->users;
        // $UserCount = User::count();

        // print_r($UserCount);

        $data = [
            'ComplaintCount' => $ComplaintCount, 
            'UserCount' => $UserCount
        ];
        // print_r($data);
        // echo($data['UserCount']);
        
        return view ('Admindashboard')->with('data', ['ComplaintCount' => $ComplaintCount, 'UserCount' => $UserCount, 'MinistryCount' => $MinistryCount]);
        // return view ('Admindashboard')->with('UserCount', $data);
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
