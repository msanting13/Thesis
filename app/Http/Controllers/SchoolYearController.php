<?php

namespace App\Http\Controllers;

use App\SchoolYear;
use Illuminate\Http\Request;
use Hash;
use Auth;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.schoolyear.school-year-setting');
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
        $email = Auth::user()->email;
        if (Auth::guard('admin')->once(['email' => $email, 'password' => $request->password])) 
        {
            SchoolYear::create([
                'school_year'   =>  $request->schoolyear
            ]);
            return response()->json([
                'message'       =>  true,
                'schoolyear'    =>  $request->schoolyear  
            ]);   
        }
        else
        {
            return response()->json([
                'message' => false,
            ]);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolYear $schoolYear)
    {
        //
    }
}
