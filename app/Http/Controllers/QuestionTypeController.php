<?php

namespace App\Http\Controllers;

use App\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    public function index()
    {
    	$qTypes = QuestionType::get();
    	return view('admin.question-type', compact('qTypes'));
    }

    public function edit($id)
    {
        $qType = QuestionType::find($id);
        return view('admin.crud.edit-question-type', compact('qType'));
    }

    public function update(Request $request, $id)
    {
        $qType = QuestionType::find($id);
        $qType->instruction = $request->instruction;
        $qType->save();
        return redirect()->back()->with('success','Successfully updated!');
    }
}
