<?php

namespace App\Http\Controllers;

use App\Http\Resources\TableData;
use App\Http\Resources\TableDatas;
use App\Module;
use App\Country;
use App\Criteria;
use App\Programme;

class FrontendController extends Controller
{
    public function tableData(Module $module)
    {
        $data = collect(['selected' => null, 'linked' => null, ]);
        $data->put('linked', $module->criterias->map(function(Criteria $c) {
                return $c->links()->orderBy('description')->get();
            })->flatten()->filter(function(Criteria $item) use ($module) {
                return $item->module->id !== $module->id;
            })->flatten()->pluck('description')->unique()->values() );
        $data->put('selected', $module->criterias->pluck('description')->unique()->flatten());
        return $data;
    }

    public function countries()
    {
        return Country::select(['id', 'name'])->orderBy('name')->get();
    }

    public function programmes(Country $country)
    {
        return $country->programmes()->select(['id', 'name'])->orderBy('name')->get();
    }

    public function modules(Programme $programme)
    {
        return $programme->modules()->select(['id', 'name'])->orderBy('name')->get();
    }

    public function criteria(Module $module)
    {
        return $module->criterias()->select(['id', 'description'])->orderBy('description')->get()->unique('description');
    }
}
