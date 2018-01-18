@extends('layout')
@section('content')
<div class="hero-body justify-center">
    <div class="field">
        <a class="button is-primary is-outlined" href="{{ route('countries.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to Country List
        </a>
    </div>
    <div class="title has-text-centered">
        {{ $country->name }} - Programmes
    </div>
    <div class="columns">
        <div class="column">
            <div class="box">
                <form method="POST" action="{{ route('countries.programmes.store', $country->id) }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <input
                                type="text"
                                value="{{ old('name') }}"
                                name="name"
                                class="input is-{{ $errors->any() ? 'danger' : 'primary' }}"
                                placeholder="Create New Programme"
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
    @forelse($country->programmes()->orderBy('name')->get()->chunk(3) as $row)
        <div class="columns">
            @foreach ($row as $pr)
                <resource-box
                    :attributes="{{ $pr }}"
                    path="{{ route('countries.programmes.show', [$country->id, $pr->id]) }}">
                </resource-box>
            @endforeach
        </div>
    @empty
    <div class="box is-fullwidth">
        <p class="button is-white is-fullwidth">
            {{ ucfirst($country->name) }} does not have any programmes
        </p>
    </div>
    @endforelse
</div>
@endsection