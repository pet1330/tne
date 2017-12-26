@extends('layout')
@section('content')
<div class="hero-body justify-center">
    <div class="field">
        <a class="button is-primary is-outlined" href="{{ route('countries.programmes.show', [$country->id, $programme->id]) }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to Modules
        </a>
    </div>
    <div class="title has-text-centered">
        {{ $module->name }} - Criteria
    </div>
    <div class="columns">
        <div class="column">
            <div class="box">
                <form method="POST" action="{{ route('countries.programmes.modules.criterias.store',
                    [$country->id, $programme->id, $module->id]) }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <input
                                type="text"
                                value="{{ old('description') }}"
                                name="description"
                                class="input is-{{ $errors->any() ? 'danger' : 'primary' }}"
                                placeholder="Create New Criteria"
                                aria-required="true">
                        </div>
                        <div class="control">
                            <button class="button is-primary" type="submit">Add</button>
                        </div>
                    </div>
                </form>
                @if ($errors->any()) <p class="help is-danger"> {{ $errors->first() }} </p> @endif
            </div>
        </div>
    </div>
    @foreach ($module->criterias->chunk(2) as $row)
    <div class="columns">
        @foreach ($row as $c)
        <criteria-box
        :attributes="{{ $c }}"
        path="{{ route('countries.programmes.modules.criterias.update',
        [$country->id, $programme->id, $module->id, $c->id]) }}">
        </criteria-box>
        @endforeach
    </div>
    @endforeach
</div>
@endsection