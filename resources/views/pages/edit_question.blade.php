@extends('layouts.main')

@section('main')

<div  class="col-md-9">
<h3>Rules</h3>

<p> The following are the Rules to follow when posting question on this platform:
<ol>
<li>Dont post abusive statement</li>
<li>Always post a meaningful and solvable questions</li>

</ol>

</div>
<div class="row" id="create">
<div class="col-md-1" >

</div>
<div class="col-md-8" >
    <div class="alert"></div>
<form id="post_questionsss">
<div class="form-group">
<label class="label-control">Topic</label>
<input type="hidden" name="id" value="{{$question->id}}" />
<input type="text" name="topic" class=" form-control" value="{{$question->topic}}" />
</div>
<div class="form-group">
    <label class="label-control">Subject</label>
    <input type="text" name="subject" class=" form-control"
    value="{{$question->category}}"/>
    </div>
    <div class="form-group">
        <label class="label-control">Body</label>
        <textarea name="body" id="editor"
        class=" form-control textarea" cols="40" rows="6" value="{{$question->body}}"></textarea>

        </div>

<button class="btn btn-primary pull-right send_btn">
   Edit</button>


</form>

</div>

</div>


@endsection
