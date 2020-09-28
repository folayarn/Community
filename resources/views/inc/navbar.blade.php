
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">

    <a class="navbar-brand" href="/">{{config('app.name','MyCV')}}</a>
    <button  class="navbar-toggler btn btn-lg btn-success" type="button"
     data-toggle="collapse" data-target="#navbarsExampleDefault"
     aria-controls="navbarsExampleDefault"
    aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse " id="navbarsExampleDefault">

      <ul class="navbar-nav" id="pully">

        @guest

        <li class="nav-item ">
            <li class="nav-item">

            </li>
            @if (Route::has('register'))
                <li class="nav-item">


                </li>
            @endif
        @else
        @if (!Auth::guard('admin')->check())
            <li class="nav-item">
                <a class="nav-link" href="/home">
               @if (!Auth::user()->image == null)
               <img src={{Auth::user()->image}}
               class="img-fluid rounded" width="30" height="30" />
               @endif
                  {{ Auth::user()->name }}
                </a>
            </li>
@else

        <li class="nav-item">
            <a class="nav-link" href="/admin">
                {{ Auth::guard('admin')->user()->name }}</a>

        </li>
@endif
        @endguest

      </ul>

    </div>

  </nav>

