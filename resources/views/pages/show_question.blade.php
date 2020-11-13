@extends('layouts.main')

@section('main')
<div class="row">
    <div class="col-md-12">
<h3>{{$question->topic}}</h3>
<div style="padding: 5px; margin-top:20px">
    <span class="category">{{$question->category}}</span>
<span class="pull-right">{{$question->created_at->diffForhumans()}}</span></div>
@include('inc.follow')

<div class="text-left paragraph">
<p>{!! $question->body !!}</p>

</div>

@if(Auth::user()->id == $question->user_id)
<div class="text-left"><a href="/trid=fedits/{{$question->id}}">Edit</a>
@if($question->isAnswered == true)
<h5 class="pull-right" style="color:green">Answered <span style="color:green" class="fa fa-check"></span></h5>
@else
<span class="pull-right" id="all" >
    <input type="hidden" name="id" value="{{$question->id}}"/>
<input type="checkbox" name="answered" value="1" >
mark as Answered
    </span>
@endif
</div>
 @endif

<div style="margin-top:10px">
    <a href="/create-answer/{{$question->id}}" class="btn btn-primary"> 
        Provide Answer</a></div>
        <div class="row">
<div class=" col-md-8 answer">
    @if(count($answer) > 0)
    @foreach($answer as $ans )
    <div class="card" style="margin-bottom: 20px">
    <div class="card-header">{{$ans->answer_provider}}</div>
    <div class="card-body">
        {!!$ans->body!!}
    </div>

    <div class="card-footer">
    <div class="text-left mark">
        @if(Auth::user()->id == $ans->user_id)
        <a href="/crk-fcedit/{{$ans->id}}/ok/{{$question->id}}">Edit</a>
        @endif
            <span class="pull-right">
        {{$ans->created_at->diffForhumans()}}
            </span>
         </div>
    </div>
    </div>
    @endforeach
@else

<h3 style="text-align:center">No Answer for this question </h3>
@endif

</div>
<div class=" col-md-4" style="background-color:blueviolet">
</div>

    </div>
    </div>

</div>


@endsection
