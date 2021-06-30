<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('supplier')->user();

    //dd($users);

    return view('supplier.home');
})->name('home');

