<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Quiz;
use App\Option;
use App\QuestionCategory;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    $category=Category::all();
    return view('pages.quiz',compact('category'));
   
}

public function start($cat_id){

    $category=Category::find($cat_id);
    return view('pages.start',compact('category'));
}
public function questionPage($cat_id){
 $quiz=Quiz::where('category_id',$cat_id)->get();
 
      return view('pages.quizPage',compact('quiz'));
}

public function submitOption(Request $request){
    $this->validate($request,[
        'option_id'=>'required'
        ]);

        dd($request->all());
        $quiz=Option::where('quiz_id',$request->ques_id)->get();
        return view('pages.done')->with('ok');
 
}
    

}
