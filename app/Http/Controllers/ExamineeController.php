<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExamineeRequest;
use Yajra\DataTables\Facades\Datatables;
use App\User;
use Hash;

class ExamineeController extends Controller
{
	public function index()
	{
		return view('admin.examinee');
	}
	public function examineeData()
	{
		return datatables()->of(User::query()->orderBy('updated_at', 'DESC'))->addColumn('action', function ($examinee) {
				$id = $examinee->id;
				$name = $examinee->name;
                return view('admin.crud.examinee-btn', compact('id','name'));
            })->make(true);
	}
	public function examineeProfile($id)
	{
		$examinee = User::with('preferredCourses')->find($id);
		return view('admin.examinee-profile', compact('examinee'));
	}
	public function postExaminee(ExamineeRequest $request)
	{
		$user = User::create([
			'name'				=>	$request->name,
			'address'			=>	$request->address,
			'birth_date'		=>	$request->birthdate,
			'gender'			=>	$request->gender,
			'cellnumber'		=>	$request->cellnumber,
			'email'				=>	$request->email,
			'password'			=>	Hash::make($request->password),
			'school_year_id'	=>	$request->syID,
		]);

		$user->preferredCourses()->create([
			'first_preferred_course'	=>		$request->first_preferred,
			'second_preferred_course'	=>		$request->second_preferred
		]);


		return redirect()->back();
	}
	public function editExaminee(Request $request)
	{
		$id = $request->id;
		$examinee = User::with('preferredCourses')->find($id);
		return view('admin.crud.edit-examinee', compact('examinee','id'));
	}
	public function updateExaminee(ExamineeRequest $request, $id)
	{
		$examinee = User::find($id);
		$examinee->update([
			'name'				=>	$request->name,
			'address'			=>	$request->address,
			'birth_date'		=>	$request->birthdate,
			'gender'			=>	$request->gender,
			'cellnumber'		=>	$request->cellnumber,
			'email'				=>	$request->email
		]);
		$examinee->preferredCourses->save([
			'first_preferred_course'	=>		$request->first_preferred,
			'second_preferred_course'	=>		$request->second_preferred
		]);
		return redirect()->back();
	}
	public function deleteExaminee($id)
	{
		$examinee = User::find($id);
		$examinee->delete();
		return redirect()->back();
	}
    protected function generateCode($limit)
    {
		$code = '';
		for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
		return $code;
    }
}
