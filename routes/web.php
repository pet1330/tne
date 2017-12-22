<?php

Route::get('/', function() { return view('frontend.home'); })->name('home');
Route::get('login', 'SAMLController@login')->name('login');
Route::get('logout', 'SAMLController@logout')->name('logout');

Route::get('table-data/{module}', function(App\Module $module) {
    return $module->criterias->map(function(App\Criteria $c) {
        return $c->links()->with('module','module.programmes',
        'module.programmes.country')->get(); })->flatten()->toArray();
});

Route::get('countries', function() {
    return App\Country::select(['id', 'name'])->get();
});

Route::get('programmes/{country}', function (App\Country $country) {
    return $country->programmes()->select(['id', 'name'])->get();
});

Route::get('modules/{programme}', function (App\Programme $programme) {
    return $programme->modules()->select(['id', 'name'])->get();
});

Route::get('criterias/{module}', function (App\Module $module) {
    return $module->criterias()->select(['id', 'description'])->get()->unique('description');
});

Route::prefix('dashboard')
    ->middleware(['samlauth', 'can:admin'])
    ->group( function() {

    Route::view('/', 'backend.dashboard')->name('dashboard');

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
