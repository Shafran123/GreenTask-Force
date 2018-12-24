<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('member')->user();

    //dd($users);

    return view('member.home');
})->name('home');


Route::get('/newreport', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('member')->user();

    //dd($users);

    return view('member.newreport');
})->name('new report');


Route::get('/reports', function () {
   // $reportdata = App\Report::all();
    
   

   $users[] = Auth::user();
   $users[] = Auth::guard()->user();
   $users[] = Auth::guard('member')->user();
   $usersname = Auth::guard('member')->user()->name;

   $reportdata = DB::table('reports')->where('posted_by', '=', $usersname)->get();

    //dd($reportdata);
       // dd($reportdata);
     return view('member.reports')->with('reports',$reportdata);
})->name('my reports');




Route::post('/new_report', 'ReportController@store') -> name('Register New Report');

Route::get('/viewreport/{id}', 'ReportController@viewreport') -> name('view one by one ');

//Route::get('/reports/{id}', 'ReportController@report') -> name('view one by one ');

Route::get('/deletereport/{id}', 'ReportController@delete') -> name('Delete Report');



