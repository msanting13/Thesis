<?php

namespace App\Http\Controllers;

use App\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Auth;

class SchoolYearController extends Controller
{
    protected $table = 'tbl_school_years';
    public function schoolyearData()
    {
        return datatables()->of(SchoolYear::query())->addColumn('status', function ($status) {
                return ($status->is_open) ? new HtmlString('<div id="sy'.$status->id.'" ><a class="btn btn-circle btn-success btn-sm closeSchoolYear" href="javascript:void(0)" data-id="'.$status->id.'" data-textval="'.$status->school_year.'"><i class="fa fa-eye"></i></a></div>') : new HtmlString('<a class="btn btn-circle btn-danger btn-sm" href="javascript:void(0)" data-id="{{ $id }}" data-backdrop="static"><i class="fa fa-eye-slash"></i></a>');
            })->addColumn('action', function ($schoolyear) {
                return view('admin.crud.school-year-setting-btn', compact('schoolyear'));
            })->make(true);
    }
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
        if (Auth::guard('admin')->once(['email' => Auth::user()->email, 'password' => $request->password])) 
        {
            if (SchoolYear::HasSchoolYear($request->schoolyear) > 0) 
            {
                $message = 'exist';
            }

            elseif (SchoolYear::HasActiveSchoolYear() > 0) 
            {
                $message = 'hasActive';
            }
            else
            {
                SchoolYear::create([
                    'school_year'   =>  $request->schoolyear
                ]);

                $message = 'success';
            }
        }
        else
        {
            $message = 'invalidCredential';
        }

        return response()->json([
            'message'       =>      $message,
            'schoolyear'    =>      $request->schoolyear
        ]);  
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
        return $schoolYear;
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
        $schoolYear->delete();
        return back();
    }
    public function schoolyearClose(SchoolYear $schoolYear)
    {
        $schoolYear->is_open = 0;
        $schoolYear->save();
        return response()->json([
            'message'       =>      'success',
            'schoolyear'    =>      $schoolYear->school_year,
        ]);  
    }
}
