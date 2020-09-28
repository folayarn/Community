@extends('layouts.main')

@section('main')

<div  class="col-md-9">
<h3>Rules</h3>

<p> The following are the Rules to follow when posting question on this platform:
<ol>
<li>Dont post abusive statement</li>
<li>Always post a meaningful and solvable Answers</li>

</ol>

</div>
<div class="row" id="create">
<div class="col-md-1" >

</div>
<div class="col-md-8" >
    <div class="alert">  </div>
<div class="pull-right" style="margin-bottom:20px"><a href="/trid=f/{{$question->id}}">Return to the Question</a></div>
<form id="post_questionss">
    <div > <h4 style="color:green; padding:7px ">*Answer To: {{$question->topic}}* </h4></div>

<input type="hidden" name="id" value="{{$answer->id}}" />
    <div class="form-group">
        <label class="label-control">Write your Answer</label>
        <textarea name="body" id="editor"
        class=" form-control textarea" cols="40" rows="6"></textarea>
        </div>
<button class="btn btn-primary pull-right send_btn">
    Edit Answer</button>


</form>

</div>

</div>


@endsection

