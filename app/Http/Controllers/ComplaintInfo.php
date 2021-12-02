<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Ministry;
use Auth;
use DB;
use App\Models\User;;

class ComplaintInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user_id = Auth::user()->role_id;


        // echo $user_id;
        $ministries = Ministry::all();
        $complaint = Complaint::find($id);

        $data = ['complaints' => $complaint, 'ministries' => $ministries];


        if ($user_id == 1){//Admin
            return view('AdminComplaintedit')->with('complaint', $data);
        }

        if ($user_id == 2){ //Normal
            return view('Complaintedit')->with('complaint', $data);
        }

        if ($user_id == 3){ //Minister
            return view('MinistryComplaintedit')->with('complaint', $data);
        }

        if ($user_id == 4){ //President
            return view('PresidentComplaintedit')->with('complaint', $data);
        }
        
        // print_r($complaint);
        // return $complaint;
        // return view('Complaintedit')->with('complaint', $data);
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
