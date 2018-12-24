<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function store(Request $request){
     
        //    dd($request -> all()); 
    
        $staff = new Staff;
        $staff ->name     = $request ->name;
        $staff ->email    = $request ->email;
        $staff ->password = Hash::make($request->tmppassword);
    
        $staff->save();
    
        $staffdata = Staff::all();
       // dd($gcdata);
        //return redirect()->back();
        return view('admin.staff')->with('staffs',$staffdata);      
    
        }

        public function delete($id){

            $staffdelete = Staff::find($id);    
        
            $staffdelete->delete();
            return redirect()->back();
        
        }

        public function update(Request $request,$id){
    
            $id=$request->id;
            $name=$request->name;
            $email=$request->email;
            $number=$request->number;
            $staffupdate = Staff::find($id); 
            $staffupdate ->name =$name;   
            $staffupdate ->email =$email;   
            $staffupdate ->mobile =$number;   
            $staffupdate->save();
            //dd($request);
          
            return redirect()->back();
        }
}
