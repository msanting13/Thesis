<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionnaireRequest;
use App\QuestionType;
use App\Question;
use App\Category;
use App\ChoiceKey;
use Hash;

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
    //create questionnaire
    public function create($id)
    {
        $questionnaireType = QuestionType::find($id);
        switch ($questionnaireType->code) {
            case 'MC':
                return view('admin.questionnaire-forms.multiple-choice-form', compact('id'));
                break;
            case 'I':
                return view('admin.questionnaire-forms.identification-form', compact('id'));
                break;
            case 'FITB':
                return view('admin.questionnaire-forms.fill-in-the-blank-form', compact('id'));
                break;
            default:
                return abort(404);
                break;
        }
    }
    public function postQuestion(QuestionnaireRequest $request, $type_id)
    {
        $id = intval($request->category);
    	$category = Category::find($id);

        $questionnaireType = QuestionType::find($type_id);

        $question = $category->questions()->create([
            'content'       =>  $request->content,
            'answers_key'   =>  $request->answerkey, //(is_array($request->answerkey)) ? json_encode($request->answerkey) : $request->answerkey,
            'type_id'       =>  $questionnaireType->id
        ]);

        if ($questionnaireType->code == 'MC') 
        {
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
        }

        return redirect()->route('questionnaire');
    }
    public function editQuestion(Question $question)
    {
        switch ($question->type->code) {
            case 'MC':
                return view('admin.crud.questionnaire-forms.edit-multiple-choice-question', compact('question'));
                break;
            case 'I':
                return view('admin.questionnaire-forms.identification-form', compact('question'));
                break;
            case 'FITB':
                $answers = json_decode($question->answers_key);
                return view('admin.crud.questionnaire-forms.edit-fill-in-the-blank-question', compact('question','answers'));
                break;
            default:
                return abort(404);
                break;
        }
    }
    public function updateQuestion(Request $request, $id)
    {
        $question = Question::find($id);
        $question->content = $request->content;
        $question->category_id = $request->category;
        if ($request->has('answerkey')) {
            $question->answers_key = (is_array($request->answerkey)) ? json_encode($request->answerkey) : $request->answerkey;
        }
        $question->save();

        if ($question->type->code == 'MC') {
            $choicesValue = $request->choicesValue;
            for ($i=0; $i < count($choicesValue); $i++) 
            { 
                $choiceValue = $choicesValue[$i];
                $question->choices[$i]->content = $choiceValue;
                $question->choices[$i]->save();
            }
        }
        return redirect()->route('questionnaire');
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
