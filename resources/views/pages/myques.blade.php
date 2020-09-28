@extends('layouts.main')

@section('main')
    <div class="col-md-9">
<h3>Recent Questions Posted you</h3>


<div id="search_list">
@if(count($question) > 0)
@foreach ($question as $que )

<div class="card list-card">
    <div class="card-body">
    <h5 class="card-title"><a href="/trid=f/{{$que->id}}"> {{ $que->topic}}</a>
    </h5>
    <span class="card-text category"> {{ $que->category}}</span>
    <br/>
    <br/>

    <span class=" pull-right" style="color: darkgrey"> Posted by <i style="color: darkgrey" >{{$que->question_provider}}</i></span>



    </div>
    <div class="card-footer">
        <span class="pull-left"> {{ $que->created_at->diffForHumans()}}</span>

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

<h3 class="alter" class="text-center">you have not post any Question</h3>

@endif
</div>



    </div>

@endsection
