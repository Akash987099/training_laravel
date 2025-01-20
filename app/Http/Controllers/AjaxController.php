<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    
    public function Ajax(){
        return view('Ajax.add');
    }

   

}
