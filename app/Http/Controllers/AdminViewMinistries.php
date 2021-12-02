<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Ministry;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminViewMinistries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $ministries = Ministry::all();

        $ministry_users = "select * from users where role_id = 3 or role_id = 4";
        // $query = "select * from complaints where user_id = '".$user_id."'";
        $ministry_users = DB::select($ministry_users, [true]);
        // $data = ['complaints' => $complaints, 'ministries' => $ministries];

        // print_r($data['complaints']);
        // return view ('dashboard')->with('complaints', $complaints);
        // return view ('dashboard')->with('complaints', $ministry_users);
    // }
        

        // print_r($ministries);
        // return view ('dashboard')->with('complaints', $complaints);
        return view ('adminMinistries')->with('ministries', $ministry_users);
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
        $ministry_name = $request->input('ministry_name');
        function generateRandomString($length) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        }

        $ministry = Ministry::where('ministry_name', '=', $ministry_name)->first();

        if ($ministry === null) { //If the ministry is not in DB, add it
            $ministry_add_user = new User;

            $ministry_name = $request->input('ministry_name');
            $ministry_add_user->name= $ministry_name;
            $ministry_add_user->email=generateRandomString(5).'@gmail.com';

            $ministry_generated_pin = generateRandomString(5);

            $ministry_add_user->pin = $ministry_generated_pin;

            // $ministry_pwd = $request->input('ministry_pin');
            
            $ministry_add_user->password = Hash::make($ministry_generated_pin);

            if ($ministry_name == 'President'){
                $ministry_add_user->role_id = '4';
            }else{
                $ministry_add_user->role_id = '3';
            }
            
            $ministry_add_user->save();



            $current_user = $ministry_add_user -> id; //Gets the Currently added ministry
           // user doesn't exist

            $ministry = new Ministry;
            $ministry->ministry_name = $request->input('ministry_name');
            $ministry->user_id = $current_user;
            $ministry->save();
            return redirect('/AdminViewMinistries')->with('success', 'Ministry has been added');

        }else{
            return redirect ('/AdminViewMinistries')->with('error', 'Ministry Already exists');
        }
        

// echo  generateRandomString();  // OR: generateRandomString(24)
        

        
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
        $ministry = User::find($id);

        $ministry_name = $ministry->name;

        $delete_ministry = "delete from ministries where user_id = ".$id."";
        $delete_min = DB::select($delete_ministry, [true]);
        // $delete_ministry = Ministry::find($ministry_name);

        $ministry->delete();
        // $delete_min->delete();
        // print_r ($delete_ministry);
        return redirect('/AdminViewMinistries')->with ('deleted', 'Ministry has been deleted');
    }
}
