<?php

namespace App\Http\Controllers;

use App\ChoiceAnswer;
use App\Question;
use App\QuestionChoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'choice_id' => 'required',
            'choice' => 'required'
        ]);
        $answer = new ChoiceAnswer;
        $answer->question_id = $request->question_id;
        $answer->choice_id = $request->choice_id;
        $answer->choice = $request->choice;
        $answer->save();
        return ['redirect' => route('answers')];
    }

    public function showAnswers(){
        $answers = ChoiceAnswer::all();
        $answersA = $answers->where('choice_id',1);
        $answersB = $answers->where('choice_id',2);
        $answersC = $answers->where('choice_id',3);
        $answersD = $answers->where('choice_id',4);
        // percentage x/total*100
        $data = [
            "answersA"=>[
                "choice" => $answersA->first()->choice,
                "number" => count($answersA),
                "percentage" => $this->calculatePercentage(count($answersA),count($answers))
            ],
            "answersB"=>[
                "choice" => $answersB->first()->choice,
                "number" => count($answersB),
                "percentage" => $this->calculatePercentage(count($answersB),count($answers))
            ],
            "answersC" => [
                "choice" => $answersC->first()->choice,
                "number" => count($answersC),
                "percentage" => $this->calculatePercentage(count($answersC),count($answers))
            ],
            "answersD" => [
                "choice" => $answersD->first()->choice,
                "number" => count($answersD),
                "percentage" => $this->calculatePercentage(count($answersD),count($answers))
            ]
        ];
        return $data;
    }

    public function calculatePercentage($number, $total){
        return round($number/$total*100);
    }
}
