<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

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
        // Questions must be group by type
        $questions = Question::with(['categories:id,name', 'type:id,code,name'])
                            ->get()
                            ->groupBy('type.code');

        // Shuffle each Question group.
        $multipleChoice = $questions['MC']->shuffle();
        $fillInTheBlank = $questions['FITB']->shuffle();

        $noOfQuestions  = Question::count();

        return view('home', compact('noOfQuestions', 'multipleChoice', 'fillInTheBlank'));
    }
}
