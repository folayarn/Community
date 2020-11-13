@extends('layouts.main')

@section('main')
@foreach ($category as $cat)

<ol style="text-align:left">
<li><h6><a href="/quiz/{{$cat->id}}">{{$cat->category}}</a></h6></li>
</ol>
    
@endforeach

@endsection