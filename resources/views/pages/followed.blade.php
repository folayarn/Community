@extends('layouts.main')

@section('main')
    <div class="col-md-9">
<h3 style="text-align:center">Following Questions</h3>


<div id="search_list">
@if(count($question) > 0)
@foreach ($question as $que )

<div class="card list-card">
    <div class="card-body">
    <h5 class="card-title"><a href="/trid=f/{{$que->question_id}}"> {{ $que->topic}}</a>
    </h5>
    <div style="margin-bottom:50px; padding:10px">
        <span class="card-text category pull-left"> {{ $que->category}}</span>

        </div>
        <div>
            <span class=" pull-right" style="color: darkgrey"> Posted by <i style="color: darkgrey" >{{$que->question_provider}}</i></span>
        </div>

    </div>
    <div class="card-footer">
        <span class="pull-left"> {{ $que->creates}}</span>
        
            @if($que->isAnswered == true)
<span class="pull-right" style="color:green">Answered
    <span style="color:green" class="fa fa-check"></span> </span>
@else
<span class="pull-right">
Not Answered Yet
    </span>

@endif

    </div>
    </div>
@endforeach

{{$question->links()}}

@else

<h3 class="alter" style="text-align:center">no following questions yet!! </h3>

@endif
</div>



    </div>

@endsection
