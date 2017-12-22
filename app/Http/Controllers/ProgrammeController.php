<?php

namespace App\Http\Controllers;

use App\Country;
use App\Programme;

class ProgrammeController extends Controller
{

    public function store(Country $country)
    {
        request()->validate(['name' => 'required|max:255']);
        $country->programmes()->save( Programme::make([ 'name' => request()->name ]) );
        $programmes = $country->programmes;
        return redirect()->route('countries.show', compact('countries', 'country'))
            ->with('flash', request()->name . ' successfully created');


        // return redirect()->route('counties.programmes', compact('countries', 'programmes'))->with('flash', request()->name . ' successfully created');

        // return view('backend.programme', compact('country'))->with('flash', request()->name . ' successfully created');
    }

    public function show(Country $country, Programme $programme)
    {
        if ($programme->country_id !== $country->id) abort(404);

        return view('backend.module', compact('country', 'programme'));
    }

    public function update(Country $country, Programme $programme)
    {
        if ($programme->country_id !== $country->id) abort(404);

        request()->validate(['name' => 'required|max:255']);
        return tap($programme)->update(request()->only('name'));
    }

    public function destroy(Country $country, Programme $programme)
    {
        if ($programme->country_id !== $country->id) abort(404);

        $programme->delete();
        return $programme->name . " deleted.";
    }
}