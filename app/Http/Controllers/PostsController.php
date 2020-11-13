<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use DB;
use App\FollowPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.Question');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$this->validate($request,[
'topic'=>'required',
'subject'=>'required',
'body'=>'required'
]);

 $question= new Question;
    $question->body=$request->body;
    $question->topic=$request->topic;
    $question->category=$request->subject;
    $question->question_provider=Auth::user()->name;
    $question->user_id=Auth::user()->id;
$question->save();
return response('save to the database');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);
 $answer= $question->answer;
$follow=FollowPost::where('user_id',Auth::user()->id)
->where('question_id',$id)->first();

       return view('pages.show_question',compact('question','answer','follow'));
    }

    public function showAll(){



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::find($id);

        return view('pages.edit_question')->with('question',$question);
    }

    public function showEdit($id,$que){

        $answer=Answer::find($id);
        $question=Question::find($que);
        return view('pages.answer_edit',compact('answer','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'topic'=>'required',
            'subject'=>'required',
            'body'=>'required'
            ]);

            $question=Question::find($id);

                $question->body=$request->body;
                $question->topic=$request->topic;
                $question->category=$request->subject;
                $question->user_id=Auth::user()->id;
                $question->question_provider=Auth::user()->name;
                $question->save();

            return response('updated');


                }





public function answerUpdate(Request $request, $id){

    $this->validate($request,[
                'body'=>'required'
        ]);

        $answer=Answer::find($id);
        $answer->body=$request->body;
        $answer->save();

    return response('updated');
        }









    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function answer($id){

$question=Question::find($id);
        return view('pages.answer_question')->with('question',$question);
    }

    public function postAnswer(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'body'=>'required'
            ]);

          $answer= Answer::create([
                'body'=>$request->body,
                'user_id'=>Auth::user()->id,
                'answer_provider'=>Auth::user()->name,
                'question_id'=>$request->id
             ]);

             if($answer){
$question=Question::find($request->id);
$question->countAns+=1;
$question->save();
             }

             return response('save to the database');



    }
    public function search(Request $request){


        if($request->ajax()) {

            $data = Question::where('topic', 'LIKE',$request->search.'%')->get();


         $output = '';

            if (count($data)>0) {
                $header='<div class="col-md-9 text-center found">'.count($data).' match Found </div>
                ';
                foreach($data as $row){
     $output='<div class="card list-card"><div class="card-body">
     <h5 class="card-title"><a href="/trid=f/'.$row->id.'">'.$row->topic.'</a><br/><br/>
     <span class="card-text category">'. $row->category.'</span>
     <br/>
     <br/>
     <span class=" pull-right" style="color: darkgrey"> Posted by <i style="color: darkgrey" >'.$row->question_provider.'</i></span>

     </div>
     <div class="card-footer">'.$row->created_at->diffForHumans().'</div>
     </div>';
        }

                return   $header.=$output;


            }
            else {
                $questions=Question::orderBy('id','desc')->get();
$header='<div  class="col-md-9 text-center nofound">No match Found </div>
';
                foreach ($questions as $row){

                    $output='
                    <div class="card list-card">
                    <div class="card-body"><h5 class="card-title">
                    <a href="/trid=f/'.$row->id.'">'.$row->topic.'</a><br/><br/>
                    <span class="card-text"><span class="category">
                    '. $row->category.'</span>
                    <br/>
     <br/>
     <span class=" pull-right" style="color: darkgrey"> Posted by <i style="color: darkgrey" >'.$row->question_provider.'</i></span>


                    </p></div>
    <div class="card-footer">'.$row->created_at->diffForHumans().'</div>
</div>

';

            }

         return   $header.=$output;

        }
    }
    }
public function answered(Request $request, $id){

    $this->validate($request,[

        'answered'=>'required'
        ]);

        $question=Question::find($id);

            $question->isAnswered=$request->answered;
            $question->save();

        return response('answered');
            }

            public function myQues(){

                $follow=FollowPost::where('user_id',Auth::user()->id)->first();

          $question= Question::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(4);

          return view('pages.myques',compact('question','follow'));

            }

            public function followedQues(){

                $question=FollowPost::where('user_id',Auth::user()->id)->paginate(10);    
         return view('pages.followed',compact('question'));

            }



public function myAns(){
    $answer= Answer::where('user_id',Auth::user()->id)
    ->orderBy('created_at','desc')->paginate(4);
    return view('pages.myans')->with('answer',$answer);

}


public function followPost(Request $request){

    $this->validate($request,[

        'post_id'=>'required',
        'isFollow'=>'required',
        'isAnswered'=>'required',
        'topic'=>'required',
        'body'=>'required',
        'category'=>'required',
        'question_provider'=>'required',
        'creates'=>'required'
        ]);

        $post= new FollowPost();
        $post->user_id=Auth::user()->id;
        $post->question_id=$request->input('post_id');
        $post->isFollowed=$request->input('isFollow');
        $post->isAnswered=$request->input('isAnswered');
        $post->topic=$request->input('topic');
        $post->creates=$request->input('creates');
        $post->body=$request->input('body');
        $post->category=$request->input('category'); 
        $post->question_provider=$request->input('question_provider');
        $post->save();
return response('following');

}

public function deleteFollow($id){
    $follow=FollowPost::where('question_id',$id);
    $follow->delete();

}

}
