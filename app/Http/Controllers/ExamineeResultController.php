<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class ExamineeResultController extends Controller
{
    public function show(User $examinee)
    {
		$middlename = "";
		$size       = count(explode(' ', $examinee->name));
    	
    	// Getting the firstname,middlename and lastname
    	if ($size > 2) {
    		list($firstname, $middlename, $lastname) = explode(' ', $examinee->name);
    	} else {
    		list($firstname, $lastname) = explode(' ', $examinee->name);
    	}

    	$examinee->age = Carbon::now()->diffInYears(Carbon::parse($examinee->birth_date));
    	
		$pdf = \PDF::loadView('admin.examinee-result-form.show', compact('examinee', 'firstname', 'middlename', 'lastname'))->setPaper('a4');
		return $pdf->stream();
    }
}
