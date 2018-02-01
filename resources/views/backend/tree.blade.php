@extends('layout')
@section('content')
<div class="hero-body justify-center">
  <div class="field">
    <a class="button is-primary is-outlined" href="{{ route('dashboard') }}">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to Dashboard
    </a>
  </div>
  @foreach(App\Country::get() as $cr)
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">{{ $cr->name }}</b> - [{{ $cr->programmes_count }}]</p>
    <span class="card-header-icon"><span class="icon">[C]</span></span>
    </header>
    <div class="card-content">
      <div class="content">
        @foreach($cr->programmes as $p)
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">{{ $p->name }}</b> - [{{ $p->modules_count }}]</p>
            <span class="card-header-icon"><span class="icon">[P]</span></span>
          </header>
          <div class="card-content">
            <div class="content">
              @foreach($p->modules as $m)
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title">{{ $m->name }}</b> - [{{ $m->criterias_count }}]</p>
                  <span class="card-header-icon"><span class="icon">[M]</span></span>
                </header>
                <div class="card-content">
                  <div class="content">
                    @foreach($m->criterias()->with('links')->get() as $c)
                    <div class="card">
                      <header class="card-header">
                        <p class="card-header-title">{{ $c->description }}</p>
                        <span class="card-header-icon"><span class="icon">[Cr]</span></span>
                      </header>
                      <div class="card-content">
                        <div class="content">
                          @if($c->links->isNotEmpty()) Linked Criteria:
                          @else
                          No Connected Links
                          @endif
                          <ul>
                            @foreach($c->links as $lc)
                            <li> {{ $lc->description }} - <b>({{ $lc->module->name }})</b> </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection