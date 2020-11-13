@extends('layouts.main')

@section('main')

    <div class="row">
        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-7 col-lg-7">
<div class="input-group mb-2">
<input type="text" id="search" name="search" class="form-control">
<div class="input-group-append">
<span class="fa fa-sort"
style="font-size:19pt; margin:left:10px; padding:5px;
color:green;
border:1px solid grey

"></span>
</div>
</div>
</div>
    </div>
    
<div class="row">
    <div class="col-md-8">
<h3 style="text-align:center">Recent Questions</h3>


<div id="search_list">
@if(count($questions) > 0)
@foreach ($questions as $que )

<div class="card list-card">
    <div class="card-body">
    <h5 class="card-title">
        <a href="/trid=f/{{$que->id}}"> {{ $que->topic}}</a>
    </h5>
    <div style="margin-bottom:50px; padding:10px">
    <span class="card-text category pull-left"> {{ $que->category}}</span>


    </div>


<div>
    <span class=" pull-right" style="color: darkgrey"> Posted by <i style="color: darkgrey" >{{$que->question_provider}}</i></span>
</div>

    </div>

    <div class="card-footer">
        <span class="pull-left"> {{ $que->created_at->diffForHumans()}}</span>

        <span style="margin-left:40px"><span class="fa fa-book"></span>{{$que->countAns}}</span>
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

{{$questions->links()}}

@else

<h3 class="alter" style="text-align:center">No Post Available</h3>

@endif
</div>


    </div>
    <div class="col-md-4" style="background-color:blueviolet">
        
    </div>
</div>
@endsection
