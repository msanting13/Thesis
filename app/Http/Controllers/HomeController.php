<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questionVariables = [];
        // Questions must be group by type
        $questions = Question::with(['categories:id,name', 'type:id,code,name,instruction'])
                            ->get()
                            ->groupBy('type.code');

        $q = $questions;

        if ($q->has(QuestionType::MULTIPLE_CHOICE)) {
            $multipleChoice = $questions['MC']->shuffle();
            $questionVariables[] = 'multipleChoice';
        } 

        if ($q->has(QuestionType::FILL_IN_THE_BLANK)) {
            $fillInTheBlank = $questions['FITB']->shuffle();
            $questionVariables[] = 'fillInTheBlank';
        } 

        if ($q->has(QuestionType::IDENTIFICATION)) {
            $identification = $questions['I']->shuffle();
            $questionVariables[] = 'identification';
        } 

        $noOfQuestions  = Question::count();
        
        return view('home', compact($questionVariables, 'noOfQuestions'));
    }
}
