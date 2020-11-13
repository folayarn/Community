@extends('layouts.main')

@section('main')

<div class="row">
        <div class="col-md-11">
           <form action="/xs" method="POST">
            @foreach( $quiz as $qu)
            <div class="card" style="margin-bottom:15px">
                <div class="card-header">
            {{$qu->quiz}}
                </div>
                <div class="card-body">
                    <input name="question[{{$qu->id}}]" type="hidden" value="{{$qu->id}}"/>
                    <ul>
                    @foreach ($qu->option as $opt)
                        <li>
                <input name="question[{{$opt->id}}]" type="radio" value="{{$opt->id}}"/> 
                <span>{{$opt->option}}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
                @endforeach
<button type="submit" class="btn btn-primary pull-right">Submit</button>

           </form>
            </div>
        

        
                <div class="col-md-1"></div>
</div>
@endsection