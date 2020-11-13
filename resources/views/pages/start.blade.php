@extends('layouts.main')

@section('main')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="margin-top:150px">
    <h3 style="text-align:center"> Welcome {{Auth::user()->name}}!!</h3>
<p style="text-align:center">Your about to attempt Quiz on {{$category->category}} </p>

    <a href="/quiz/{{$category->id}}/wq" style="margin-left:200px" class="btn btn-lg btn-success">
    Start</a>
    </div>
<div class="col-md-3"></div>
</div>

@endsection