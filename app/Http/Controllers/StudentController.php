<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    
    public function student(){
        return view('student');
    }

    public function Usersave(Request $request){

        $data = [

            'name' => $request->name,
            'class' => $request->email,
            'phone' => '11111111',

        ];


        // $insert = DB::table('users')->insert($data);

        $insert = Students::create($data);

        if ($insert) {
            return response()->json(['status' => 'success']);
            // return redirect()->back()->with('success', 'User added successfully!');
        } 
        return response()->json(['status' => 'error']);

    }
}
