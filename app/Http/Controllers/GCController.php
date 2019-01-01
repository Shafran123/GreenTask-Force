<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Greencaptain;
use Illuminate\Support\Facades\Hash;

class GCController extends Controller
{
    public function store(Request $request){
     
    //    dd($request -> all()); 

    $gc = new Greencaptain;
      

    $gc ->name     = $request ->name;
    $gc ->email    = $request ->email;
    $gc ->password = Hash::make($request->tmppassword);

    $gc->save();

    $gcdata = Greencaptain::all();
   // dd($gcdata);
    //return redirect()->back();
    return view('admin.addgc')->with('gcs',$gcdata);      

    }
    public function delete($id){

        $gcdelete = Greencaptain::find($id);    
    
        $gcdelete->delete();
        return redirect()->back();
    
    }



    public function update(Request $request,$id){
    
        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $number=$request->number;
        $gcupdate = Greencaptain::find($id); 
        $gcupdate ->name =$name;   
        $gcupdate ->email =$email;   
        $gcupdate ->number =$number;   
        $gcupdate->save();
        //dd($request);
      
        return redirect()->back();
    }
}
