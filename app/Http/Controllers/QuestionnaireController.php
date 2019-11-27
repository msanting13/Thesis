<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionnaireRequest;
use App\Question;
use App\Category;
use App\ChoiceKey;

class QuestionnaireController extends Controller
{
    function __construct()
    {
        $this->file_path = public_path('/assets/images/attachments/');
    }
    public function index()
    {
    	$questions = Question::get();
    	return view('admin.questionnaire-landing', compact('questions'));
    }
    public function postQuestion(QuestionnaireRequest $request)
    {
        $id = intval($request->category);
    	$category = Category::find($id);

        $question = $category->questions()->create([
            'content'       =>  $request->name,
            'answers_key'   =>  $request->choices,
        ]);

        $choicesValue = $request->choicesValue;

        for ($i=0; $i < count($choicesValue); $i++) 
        { 
            $key = $request->choicekey[$i];
            $choiceValue = $choicesValue[$i];
            $question->choices()->create([
                'content'   =>      $choiceValue,
                'key'       =>      $key
            ]);
        }

        return redirect()->back();
    }
    public function editQuestion(Request $request)
    {
        $id = intval($request->id);
        $question = Question::with('choices')->find($id);
        //return response()->json($question);
        return view('admin.crud.edit-question', compact('question'));
    }
    public function updateQuestion(Request $request, $id)
    {
        $question = Question::find($id);
        $question->content = $request->name;
        $question->category_id = $request->category;
        $question->answers_key = $request->choices;
        $question->save();

        $choicesValue = $request->choicesValue;

        for ($i=0; $i < count($choicesValue); $i++) 
        { 
            $choiceValue = $choicesValue[$i];
            $question->choices[$i]->content = $choiceValue;
            $question->choices[$i]->save();
        }
        return redirect()->back();
    }
    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->choices()->delete();
        $question->delete();
        return redirect()->back();
    }
    public function fileUpload($file)
    {
            $attachment = $file;
            $attachmentNewName = rand(). '.' .$attachment->getClientOriginalExtension();
            $attachment->move($this->file_path, $attachmentNewName);  
            return $attachmentNewName;   
    }
}
