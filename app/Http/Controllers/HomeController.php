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
            return response()->json(['status' => 'success']);
            // return redirect()->back()->with('success', 'User added successfully!');
        } 
        return response()->json(['status' => 'error']);
        // return redirect()->back()->with('error', 'Failed to add user. Please try again.');
    }

    public function Userdelete(Request $request){

        // dd($request->all());

        $id = $request->id;

        $delete = DB::table('users')->where('id' , $id)->delete();

        if ($delete) {
            return response()->json(['status' => 'success']);
            return redirect()->back()->with('success', 'User Delete successfully!');
        } 

        return response()->json(['status' => 'success']);
        return redirect()->back()->with('error', 'Failed to add user. Please try again.');

    }

    public function Userupdate(Request $request){

        // dd($request->all());

        $id = $request->id;

        $data = DB::table('users')->where('id' , $id)->first();

        // dd($data);  

        return view('update' , compact('data'));

    }

    public function Useredit(Request $request){

        // dd($request->all());

        $id = $request->id;

        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => '11111111',

        ];


        $update = DB::table('users')->where('id' , $id)->update($data);

        if ($update) {
            return redirect()->back()->with('success', 'User Update successfully!');
        } 

        return redirect()->back()->with('error', 'Failed to add user. Please try again.');

    }

    public function Userlist(Request $request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value'];
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $columnIndex = $columnIndex_arr[0]['column']; 
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];

        
        $data = DB::table('users');

        if($searchValue != NULL){
            $data->where('name' , 'like', '%' . $searchValue . '%');
        }

        $totalRecordswithFilter = $data->count();
        $totalRecords = $totalRecordswithFilter;
        $list = $data->skip($start)->take($length)->orderby('id' , 'desc')->get();

        // $data = admin::all();
          
        $data_arr = array();
        foreach($list as $key => $record){
 
            $id = $record->id;
           
            $check = '<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="'.$id.'">
								<label for="checkbox1"></label>
							</span>';
            $action  = '&nbsp;<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="'.$id.'"><i class="material-icons" title="Edit">&#xE254;</i></a>';
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete" data-id="'.$id.'"><i class="material-icons" title="Delete">&#xE872;</i></a>';
// deleteEmployeeModal
            $data_arr[] = array(
              "id" => ++$start,
              'check' => $check,
              'name'  => $record->name,
              'email' => $record->email,
              'password' => $record->password,
              "action" => $action,
            );

        }

        $response = array(
            "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr,
        );

        // dd($response);
        echo json_encode($response);

    }
    
}
