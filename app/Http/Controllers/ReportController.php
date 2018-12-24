<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use DB;

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


        public function viewpendingreportcaptain($id){

            $viewreportdata = Report::find($id);   
             
        
          //  dd($viewreport);
            return view('greencaptain.pendingreportview')->with('viewreport',$viewreportdata);
        
        }

        public function markasverify(Request $request,$id){
     
            //    dd($request -> all()); 
        //    $assign_t_level = Report::find($id);

            $assign_t_level = new Report;

            $tlevel=$request->t_level ;
          
         
            $markasverify = Report::find($id);   
             
            $markasverify ->verified  = 1   ;

            $markasverify ->threat_level = $tlevel;
            //  dd($markasverify);
        
            $markasverify->save();

          // $assign_t_level->save();

           $pendingreportdata = DB::table('reports')->where('verified', '=', '0')->get();
           
          return view('greencaptain/pendingreports')->with('reports',$pendingreportdata);
          
           // $staffdata = Staff::all();
           // dd($markasverify);
      
   
            }
    
       


        public function delete($id){

            $reportdelete = Report::find($id);    
        
            $reportdelete->delete();
            return redirect()->back();
        
        }
}
