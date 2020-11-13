<div class="pull-right">
    @if(!empty($follow->user_id))
    @if(($follow->user_id == Auth::user()->id) and ($follow->question_id == $question->id))
        <div class="own">
        @include('inc.hidden')
        <button class="btn btn-sm btn-primary" id="dfollow">Unfollow</button>
        </div>
        <div style="display: none" class="own1">
            @include('inc.hidden')
            <button class="btn btn-sm btn-primary" id="dfollow">Unfollow</button>
            </div>
    <div style="display: none" id="showFollo">
        @include('inc.hidden')
        <button class="btn btn-sm btn-primary" id="follow">Follow</button>
    </div>

        @else
        @include('inc.hidden')
        <button class="btn btn-sm btn-primary" id="follow">Follow</button>
        @endif
        @else
        <div id="showFollo">
            @include('inc.hidden')
            <button class="btn btn-sm btn-primary" id="follow">Follow</button>
        </div>
        <div style="display: none" class="own1">
            @include('inc.hidden')
            <button class="btn btn-sm btn-primary" id="dfollow">Unfollow</button>
            </div>

    @endif
        </div>
