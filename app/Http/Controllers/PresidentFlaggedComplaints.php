<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use App\Models\Ministry;
use App\Models\Flag;
use Auth;
use DB;

class PresidentFlaggedComplaints extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = "select * from complaints";
        // $complaints = DB::select($query, [true]);
        // $created_at = $complaints[0]->created_at;

        // echo $created_at;
        // $flag_date = date('Y-m-d', strtotime('+3 months'));
        // echo $flag_date; //2021-07-04 13:31:34

        
        $name = Auth::user()->name;

        $complaints = User::where('name', 'admin');
        $now = date('Y-m-d H:i:s');;

        // $complaints = DB::table('complaints')->where ('ministry', 'ministry of work');
        $query = "select * from complaints where PresidentFlag = 1";
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
        return view ('PresidentFlags')->with('complaints', $complaints);
        // return view ('Presidentdashboard')->with('complaints', $complaints);
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
    public function update(Request $request, $id, $ministry)
    {
        //
        $complaint = Complaint::find($id);
        $complaint->PresidentFlag = '1';

        if (($complaint->PresidentFlag) == ''){
            $complaint->PresidentFlag = '1';
        }
        else {
            $complaint->PresidentFlag = '';
        }

        $query1 = "delete from flags where ministry_id = '".$ministry."'";
        $ministries = DB::select($query1, [true]);
        
        // $Flag->save();
        // print_r($complaint->status);
        // $complaint->status = '1';
        // $complaint->user_id = auth()->user()->id;
        $complaint->save();
        // $op = $request->input('complaint')." ".$request->input('full_name')." ".$request->input('ministry');
        return redirect('/PresidentFlags');
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
