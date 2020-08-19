<?php

namespace App\Http\Controllers;

use App\ChoiceAnswer;
use App\Question;
use App\QuestionChoice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question(){
        $question = Question::first();
        return $question;
    }

    public function choices(){
        $choices = QuestionChoice::all();
        return $choices;
    }

    public function storeAnswers(Request $request){
        $this->validate($request,[
            'question_id' => 'required',
            'choice_id' => 'required'
        ]);
        $answer = new ChoiceAnswer;
        $answer->questionId = $request->question_id;
        $answer->choiceId = $request->choice_id;
        $answer->save();
    }

    public function showAnswers(){
        // not implemented
    }
}
