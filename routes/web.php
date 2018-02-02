<?php

Route::view('/', 'frontend.home')->name('home');
Route::get('login', 'SAMLController@login')->name('login');
Route::get('logout', 'SAMLController@logout')->name('logout');

Route::get('table-data/{module}', 'FrontendController@tableData');
Route::get('countries', 'FrontendController@countries');
Route::get('programmes/{country}', 'FrontendController@programmes');
Route::get('modules/{programme}', 'FrontendController@modules');
Route::get('criterias/{module}', 'FrontendController@criteria');

Route::prefix('dashboard')
    ->middleware(['samlauth', 'can:admin'])
    ->group( function() {

    Route::view('/', 'backend.dashboard')->name('dashboard');
    Route::view('database', 'backend.tree')->name('database');

    Route::post(
        'countries/{country}/programmes/{programme}/modules/{module}/criterias/{criteria}/links',
        'CriteriaController@addlink')->name('link.store');

    Route::delete(
        'countries/{country}/programmes/{programme}/modules/{module}/criterias/{criteria}/links/{link}',
        'CriteriaController@removelink')->name('link.destroy');

    Route::resource('countries', 'CountryController',
        ['except' => ['create', 'edit']]);
    Route::resource('countries.programmes', 'ProgrammeController',
        ['except' => ['index', 'create', 'edit']]);
    Route::resource('countries.programmes.modules', 'ModuleController',
        ['except' => ['index', 'create', 'edit']]);
    Route::resource('countries.programmes.modules.criterias', 'CriteriaController',
        ['except' => ['index', 'create', 'edit', 'show']]);
    Route::resource('users', 'UserController',
        ['only' => ['index', 'store', 'destroy']]);
});
