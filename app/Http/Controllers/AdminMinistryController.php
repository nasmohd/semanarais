<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminMinistryController extends Controller
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
        $ministry_name = $request->input('ministry_name');

        $ministry = Ministry::where('ministry_name', '=', $ministry_name)->first();
        if ($ministry === null) {
            $ministry_add_user = new User;
            $ministry_add_user->name=$request->input('ministry_name');
            $ministry_add_user->email=($request->input('ministry_pin')).'@gmail.com';

            $ministry_pwd = $request->input('ministry_pin');
            
            $ministry_add_user->password = Hash::make($ministry_pwd);
            $ministry_add_user->role_id = '3';
            $ministry_add_user->save();


            $current_user = $ministry_add_user -> id; //Gets the Currently added ministry
           // user doesn't exist

            $ministry = new Ministry;
            $ministry->ministry_name = $request->input('ministry_name');
            $ministry->user_id = $current_user;
            $ministry->save();
        }
        

        return redirect('/Adminhome');
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
