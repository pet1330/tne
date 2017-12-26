<?php

namespace App\Http\Controllers;

use App\Country;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::select([ 'id', 'name' ])->get();
            return request()->ajax() ?
            $countries : view('backend.country', compact('countries'));
    }

    public function store()
    {
        request()->validate(['name' => 'required|max:255']);
        Country::create([ 'name' => request()->name ]);
        $countries = Country::select([ 'id', 'name' ])->get();
        return redirect()->route('countries.index', compact('countries'))
            ->with('flash', request()->name . ' successfully created');
    }

    public function show(Country $country)
    {
        return view('backend.programme', compact('country'));
    }

    public function update(Country $country)
    {
        request()->validate(['name' => 'required|max:255']);
        return tap($country)->update(request()->only('name'));
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return $country->id . " has been deleted";
    }
}
