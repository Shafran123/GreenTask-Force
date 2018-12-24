<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');



Route::get('/addgc',function(){
    $gcdata=App\Greencaptain::all();
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();


    return view('admin.addgc')->with('gcs',$gcdata);
})->name('Addgc');



Route::get('/staff',function(){
    $staffdata=App\Staff::all();
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();


    return view('admin.staff')->with('staffs',$staffdata);
})->name('Staff');

Route::get('/posts',function(){
    $postdata=App\Post::all();
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();


    return view('admin.posts')->with("posts",$postdata);
})->name('View Post');


Route::get('/addpost',function(){
   
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();


    return view('admin.addpost');
})->name('Add Post');



Route::post('/reg_new_gcaptain', 'GCController@store') -> name('Register New GC');

Route::get('/deletegc/{id}', 'GCController@delete') -> name('Delete Gc');

Route::post('/updategc/{id}', 'GCController@update') -> name('Update GC Rec');

Route::post('/reg_new_staff', 'StaffController@store') -> name('Register New Staff');

Route::get('/deletestaff/{id}', 'StaffController@delete') -> name('Delete Staff');

Route::post('/updatestaff/{id}', 'StaffController@update') -> name('Update Staff Record');

Route::post('/new_post', 'PostController@store') -> name('New Post');

Route::get('/deletepost/{id}', 'PostController@delete') -> name('Delete Post');

Route::post('/updatepost/{id}', 'PostController@update') -> name('Update Post Record');