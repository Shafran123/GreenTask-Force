<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    public function store(Request $request){
     
        //    dd($request -> all()); 
    
        //check File Is Available Or Not
        if($request->hasFile('file')){
           
          $filename =  $request->file->getClientOriginalName();

         $request->file->storeAs('public/postimages',$filename);
           
           // return 'yes';
        }
        else{
            return 'no';
        }

        $addreport = new Report;
        $addreport ->posted_by  = $request ->postedby; 
        $addreport ->title      = $request ->title;
        $addreport ->date       = $request ->date;
        $addreport ->impact     = $request ->impact;
        $addreport ->city       = $request ->city;
        $addreport ->description       = $request ->desc;
        $addreport ->latitude    = $request ->lat;
        $addreport ->longitude    = $request ->lng;
        $addreport ->image = $filename;
    
        $addreport->save();
    
       // $staffdata = Staff::all();
       // dd($gcdata);
        //return redirect()->back();
        return redirect()->back();
    
        }


        public function viewreport($id){

            $viewreportdata = Report::find($id);   
             
        
          //  dd($viewreport);
            return view('member.viewreport')->with('viewreport',$viewreportdata);
        
        }


        public function viewreportcaptain($id){

            $viewreportdata = Report::find($id);   
             
        
          //  dd($viewreport);
            return view('greencaptain.viewreport')->with('viewreport',$viewreportdata);
        
        }

       


        public function delete($id){

            $reportdelete = Report::find($id);    
        
            $reportdelete->delete();
            return redirect()->back();
        
        }
}
