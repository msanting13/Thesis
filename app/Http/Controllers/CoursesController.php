<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CoursesRequest;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function coursesData()
    {
        return datatables()->of(Course::query())->addColumn('department', function ($department) {
                return $department->department->department_name;
            })->addColumn('action', function ($course) {
                return view('admin.crud.courses-btn', compact('course'));
            })->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.courses');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request)
    {
        Course::create([
            'course_code'   =>  $request->course_code,
            'course_descr'  =>  $request->course_descr,
            'department_id' =>  $request->department
        ]);
        return back()->with('success','Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $program)
    {
        return view('admin.crud.edit-courses', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $program
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesRequest $request, Course $program)
    {
        $program->course_code = $request->course_code;
        $program->course_descr = $request->course_descr;
        $program->department_id = $request->department;
        $program->save();
        return back()->with('success','Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $program)
    {
        $program->delete();
        return back()->with('success','Successfully deleted!');
    }
}
