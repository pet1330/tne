@extends('layout')
@section('content')
<div class="hero-body justify-center">
    <div class="field">
        <a class="button is-primary is-outlined" href="{{ route('dashboard') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to Dasboard
        </a>
    </div>
    <div class="title has-text-centered">
        Admin
    </div>
    <div class="columns">
        <div class=" column is-10 is-offset-1">
            <p>Create New Admins</p>
            <div class="box">
                <form method="POST" action="{{ route('users.store') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input
                                    name="first_name"
                                    type="text"
                                    placeholder="First Name"
                                    class="input is-{{ $errors->has('first_name') ? 'danger' : 'primary' }}"
                                    value="{{ old('first_name') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    @if ($errors->has('first_name'))
                                    <p class="help is-danger"> {{ $errors->first('first_name') }} </p>
                                    @endif
                                </p>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input
                                    name="last_name"
                                    type="text"
                                    placeholder="Last Name"
                                    class="input is-{{ $errors->has('last_name') ? 'danger' : 'primary' }}"
                                    value="{{ old('last_name') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    @if ($errors->has('last_name'))
                                    <p class="help is-danger"> {{ $errors->first('last_name') }} </p>
                                    @endif
                                </p>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input
                                    name="university_email"
                                    type="text"
                                    placeholder="Email"
                                    class="input is-{{ $errors->has('university_email') ? 'danger' : 'primary' }}"
                                    value="{{ old('university_email') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    @if ($errors->has('university_email'))
                                    <p class="help is-danger"> {{ $errors->first('university_email') }} </p>
                                    @endif
                                </p>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <button class="button is-primary">Add</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content column is-three-fifths is-offset-one-fifth">
        <div class="content">
            <p>Current Admins</p>
            @foreach ($users as $u)
            <div class="box">
                <div class="field is-grouped">
                    <div class="control is-expanded">
                        <div class="columns is-multiline">
                            <p class="button is-white column is-4">{{ $u->name }}</p>
                            <p class="button is-white column is-8">{{ $u->university_email }}</p>
                        </div>
                    </div>
                    @if($u->id !== auth()->id())
                    <div class="control">
                        <form
                            method="POST" action="{{ route('users.destroy', $u->id) }}" accept-charset="UTF-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="button is-white has-text-danger" type="submit">
                            <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection