<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('greencaptain')->user();

    //dd($users);

    return view('greencaptain.home');
})->name('home');


Route::get('/reports', function () {
    $reportdata = App\Report::all();
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('greencaptain')->user();

    //dd($reportdata);

    return view('greencaptain.reports')->with('reports',$reportdata);
})->name('all reports');

Route::get('/pendingreports', function () {
    //$pendingreportdata = App\Report::all();
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('greencaptain')->user();

    $pendingreportdata = DB::table('reports')->where('verified', '=', '0')->get();
  //  dd($pendingreportdata);

    return view('greencaptain.pendingreports')->with('reports',$pendingreportdata);
})->name('all reports');


Route::get('/viewreport/{id}', 'ReportController@viewreportcaptain') -> name('view one by one for captain ');


Route::get('/viewpendingreport/{id}', 'ReportController@viewpendingreportcaptain') -> name('view one by one for captain ');

Route::post('/markasverify/{id}', 'ReportController@markasverify') -> name('verify report ');

Route::get('/deletereport/{id}', 'ReportController@delete') -> name('Delete Report'); 