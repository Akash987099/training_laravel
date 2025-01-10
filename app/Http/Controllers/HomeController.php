<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    
    public function index(){

        $data = DB::table('users')->paginate(10);
        // dd($data);
        return view('welcome' , compact('data'));
    }

    public function Usersave(Request $request){

        // dd($request->all());

        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => '11111111',

        ];


        $insert = DB::table('users')->insert($data);

        if ($insert) {
            return redirect()->back()->with('success', 'User added successfully!');
        } 

        return redirect()->back()->with('error', 'Failed to add user. Please try again.');
    }

    public function Userdelete(Request $request){

        // dd($request->all());

        $id = $request->id;

        $delete = DB::table('users')->where('id' , $id)->delete();

        if ($delete) {
            return redirect()->back()->with('success', 'User Delete successfully!');
        } 

        return redirect()->back()->with('error', 'Failed to add user. Please try again.');

    }
    
}
