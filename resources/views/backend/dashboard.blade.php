@extends('layout')
@section('content')
<div class="hero-body justify-center">
    <div class="columns">
      <div class="column has-text-centered">
        <div class="box bookmark box-0">
          <article>
            <h1 class="title has-text-dark is-4">Information</h1>
            <i class="fa fa-globe fa-3x" aria-hidden="true"></i>
          </article>
          <br>
          <a class="button is-primary is-outlined" href="{{ route('countries.index') }}">View</a>
        </div>
      </div>
      <div class="column has-text-centered">
        <div class="box bookmark box-2">
          <article>
            <h1 class="title has-text-dark is-4">Users</h1>
            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
          </article>
          <br>
          <a class="button is-primary is-outlined" href="{{ route('users.index') }}">View</a>
        </div>
      </div>
    </div>
  </div>
@endsection