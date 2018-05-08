<?php

namespace App\Http\Controllers;

use App\Country;
use App\Module;
use App\Programme;

class ModuleController extends Controller
{
    public function store(Country $country, Programme $programme)
    {
        if ($programme->country_id !== $country->id) {
            abort(404);
        }

        request()->validate(['name' => 'required|max:255']);
        $f = Module::firstOrNew(['name' => request()->name]);

        if ($f->exists) {
            if ($country->programmes->map(function (Programme $p) {
                return $p->modules->pluck('name');
            })->flatten()->contains(request()->name)) {
                $programme->modules()->syncWithoutDetaching($f);
            } else {
                $programme->modules()->syncWithoutDetaching(Module::create(['name' => request()->name]));
            }
        } else {
            $programme->modules()->syncWithoutDetaching(tap($f)->save());
        }

        $modules = $programme->modules()->orderBy('name')->get();

        return redirect()->route('countries.programmes.show', compact('country', 'programme', 'modules'))
            ->with('flash', request()->name.' successfully created');
    }

    public function show(Country $country, Programme $programme, Module $module)
    {
        if ($programme->country_id === $country->id &&
            $programme->modules()->orderBy('name')->select('id')->get()->contains($module->id)) {
            $module->load('criterias', 'criterias.links');

            return view('backend.criteria', compact('country', 'programme', 'module'));
        }
        abort(404);
    }

    public function update(Country $country, Programme $programme, Module $module)
    {
        if ($programme->country_id === $country->id &&
        $programme->modules()->orderBy('name')->select('id')->get()->contains($module->id)) {
            request()->validate(['name' => 'required|max:255']);

            return tap($module)->update(request()->only('name'));
        }
    }

    public function destroy(Country $country, Programme $programme, Module $module)
    {
        if ($programme->country_id === $country->id &&
        $programme->modules()->orderBy('name')->select('id')->get()->contains($module->id)) {
            $programme->modules()->detach($module->id);
            if ($module->programmes()->count() === 0) {
                $module->delete();
            }
        }
    }
}
