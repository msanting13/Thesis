<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamineeResultController extends Controller
{
    public function index()
    {
		$pdf = \PDF::loadView('admin.examinee-result-form.index')->setPaper('a4');
		return $pdf->stream();
    }
}
