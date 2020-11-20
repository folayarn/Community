@extends('layouts.main')

@section('main')

<div class="row">
        <div class="col-md-11">
           <form action="/xs" method="POST">
            @csrf
            
            @foreach( $quiz as $qu)
            <div class="card" style="margin-bottom:15px">
                <div class="card-header">
            {{$qu->quiz}}
                </div>
                <div class="card-body">
                    <input name="question[{{$qu->id}}]" type="hidden" value="{{$qu->id}}"/>
                    
                    @foreach ($qu->option as $opt)
                        <div class="form-check">
                <input class="form-check-input" name="question[{{$qu->id}}]" 
                type="radio" value="{{$opt->id}}"/> 
                <label class="form-check-label">{{$opt->option}}</label>
                        </div>
                    @endforeach
                    
                </div>
            </div>
                @endforeach
<button type="submit" class="btn btn-primary pull-right">Submit</button>

           </form>
            </div>
        

        
                <div class="col-md-1"></div>
</div>
@endsection