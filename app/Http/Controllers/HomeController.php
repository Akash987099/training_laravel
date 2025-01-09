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
    
}
