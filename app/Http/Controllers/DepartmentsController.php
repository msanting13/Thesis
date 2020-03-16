<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('admin.departments', compact('departments'));
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
    public function store(Request $request)
    {
        $this->validate(request(),[
            'department_name'   =>  'required|string|unique:tbl_departments|min:2|regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/'
        ],[
            'department_name.reqex' => 'The department name field must not contain any special characters',
        ]);

        Department::create([
            'department_name'   =>  $request->department_name
        ]);
        return back()->with('success','Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $college
     * @return \Illuminate\Http\Response
     */
    public function show(Department $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $college)
    {
        return view('admin.crud.edit-departments', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $college)
    {
        $this->validate(request(),[
            'department_name'   =>  ['required', 'string', 'min:2,', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/', Rule::unique('tbl_departments')->ignore($college->id)]
        ]);

        $college->department_name = $request->department_name;
        $college->save();
        return back()->with('success','Successfully updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $college)
    {
        $college->delete();
        return back()->with('success','Successfully deleted!');;
    }
}
