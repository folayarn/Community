@extends('layouts.app')

@section('content')
<div class="col-md-12 her">
Menu
</div>
    <div class="row" style="margin-top:50px">
       <div class="col-md-3 sidebar" >

            <h5 id="top"><span class="fa fa-user"></span> DashBoard</h5>

<ul>

<li><a href="/create-questions"> Post Question</a> </li>
<hr/>
<li><a href="/{{Auth::user()->id}}">My Questions</a></li>
<hr/>
<li><a href="/ans/{{Auth::user()->id}}">My Answers</a></li>
<hr/>
<li><a href="/home">Questions</a></li>
<hr/>
<li> <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                          <span class="fa fa-sign-out"></span>
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>



</li>
</ul>


       </div>


        <div class="col-md-9">


@yield('main')

        </div>



    </div>


@endsection

