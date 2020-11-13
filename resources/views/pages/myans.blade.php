@extends('layouts.main')

@section('main')

<div class="col-md-9">
<h3 style="text-align:center">Recent Answers Provided by you </h3>


<div id="search_list">
@if(count($answer) > 0)
@foreach ($answer as $que )


<div class="card list-card">
    <div class="card-body">
    <span class="card-title">
        <a href="/trid=f/{{$que->question_id}}">{!! Str::words($que->body,10,'...')!!}</a>

    </div>
    <div class="card-footer">
        <span class="pull-left"> {{ $que->created_at->diffForHumans()}}</span>
    </div>
    </div>
@endforeach

{{$answer->links()}}

@else

<h3 class="alter" style="text-align:center">You have not Provided answer to Questions </h3>

@endif
</div>



    </div>

@endsection
