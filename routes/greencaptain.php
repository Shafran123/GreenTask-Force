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

Route::get('/viewreport/{id}', 'ReportController@viewreportcaptain') -> name('view one by one for captain ');

