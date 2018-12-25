<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('staff')->user();

    //dd($users);

    return view('staff.home');
})->name('home');


Route::get('/allreports', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('staff')->user();

    

    $staff_report_data = DB::table('reports')->where('verified', '=', 1)->get();

    //dd($staff_report_data);

    return view('staff.allreports')->with('reports',$staff_report_data);
})->name('Verified Reports');

Route::get('/view_verified_report/{id}', 'ReportController@view_verified_report') -> name('view one by one for staff ');

Route::post('/marks_as_done/{id}', 'ReportController@mark_as_done') -> name('mark as done by staff');

