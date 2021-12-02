<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Ministry;
use Auth;
use DB;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dashboard of our complaints
        $query1 = "select * from ministries where ministry_name != 'President'";
        $ministries = DB::select($query1, [true]);
        // $ministries = Ministry::all();

        $user_id = Auth::user()->id;

        $query = "select * from complaints where user_id = '".$user_id."'";
        $complaints = DB::select($query, [true]);
        $data = ['complaints' => $complaints, 'ministries' => $ministries];

        // print_r($data['complaints']);
        // return view ('dashboard')->with('complaints', $complaints);
        return view ('dashboard')->with('complaints', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('test');

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
        // $this ->validate($request, [
        $this->validate($request, [
            'title' => 'required',
            'complaint' => 'required'
        ]);

        // ]);

        $now = date('Y-m-d H:i:s');

        // echo $now;
        $complaint = new Complaint;
        $complaint->title = $request->input('title');
        $complaint->body = $request->input('complaint');
        $complaint->ministry = $request->input('ministry');
        $complaint->user_id = auth()->user()->id;
        $complaint->flagDate = date('Y-m-d H:i:s', strtotime('+3 months'));
        $complaint->save();

        // $flagDate = $complaint;
        // $op = $request->input('complaint')." ".$request->input('full_name')." ".$request->input('ministry');
        return redirect('/home')->with('success', 'Complaint has been submitted');
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
        $ministries = Ministry::all();
        $complaint = Complaint::find($id);

        $data = ['complaints' => $complaint, 'ministries' => $ministries];


        
        // print_r($complaint);
        // return $complaint;
        return view('edit')->with('complaint', $data);
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
        // $this->validate($request, [
        //     'title' => 'required',
        //     'complaint' => 'required'
        // ]);
        // return 'Yup';
        // ]);
        $complaint = Complaint::find($id);
        $complaint->title = $request->input('title');
        $complaint->body = $request->input('body');
        $complaint->ministry = $request->input('ministry');
        // $complaint->user_id = auth()->user()->id;
        $complaint->save();
        // $op = $request->input('complaint')." ".$request->input('full_name')." ".$request->input('ministry');
        return redirect('/home');
        // return 'H';
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
        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect('/home')->with('deleted', 'Complaint has been deleted');
    }
}
