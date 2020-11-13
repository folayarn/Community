

        <input type="hidden" name="ques_id" value="{{$question->id}}"/>
        <input type="hidden" name="isFollow" value="1"/>
        <input type="hidden" name="body" value="{{$question->body}}"/>
        <input type="hidden" name="topic" value="{{$question->topic}}"/>
        <input type="hidden" name="creates" value="{{$question->created_at}}"/>
        <input type="hidden" name="category" value="{{$question->category}}"/>
        <input type="hidden" name="question_provider" value="{{$question->question_provider}}"/>
        <input type="hidden" name="isAnswered" value="{{$question->isAnswered}}"/>
        