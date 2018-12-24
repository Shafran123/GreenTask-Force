<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request){
     
        //    dd($request -> all()); 
    
        $newpost = new Post;
        $newpost ->title     = $request ->title;
        $newpost ->content    = $request ->content;
      
    
        $newpost->save();
    
       // $staffdata = Staff::all();
       // dd($gcdata);
        //return redirect()->back();
        return redirect()->back(); 
    
        }

        public function delete($id){

            $postdelete = Post::find($id);    
        
            $postdelete->delete();
            return redirect()->back();
        
        }


        public function update(Request $request,$id){
    
            $id=$request->id;
            $title=$request->title;
            $content=$request->content;
            $number=$request->number;
            $postupdate = Post::find($id); 
            $postupdate ->title =$title;   
            $postupdate ->content =$content;   
          
            $postupdate->save();
            //dd($request);
          
            return redirect()->back();
        }
}
