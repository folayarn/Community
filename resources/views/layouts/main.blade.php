@extends('layouts.app')

@section('content')
<div class="col-md-12 her">
Menu
</div>
    <div class="row" style="margin-top:50px">
       <div class="col-md-3 sidebar" >
           
<div class="col-md-3" id="top">
            <span><span class="fa fa-user"></span> DashBoard</span>
</div>
<ul class="col-md-3 tabs">

<li><a href="/create-questions"> Post Question</a> </li>

<li><a href="/my-q">My Questions({{$var}})</a></li>

<li><a href="/following">Followed Questions({{$follow}})</a></li>


<li><a href="/ans">My Answers({{$myanswer}})</a></li>

<li><a href="/quiz">Quiz</a></li>

<li><a href="/home">Questions</a></li>

<li> <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                          <span style="color:rgb(221, 137, 137)" class="fa fa-sign-out"></span>
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

