<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.students');
    }

    public function addstudent(Request $request)
    {
        // create
        // firstorcreate
        // firstornew
        // updateorcreate
        student::create([
            'studentname'     =>  $request['username'],
            'studentpassword' =>  $request['password'],
            'studentemail'    =>  $request['email'],
            'studentphone'    =>  $request['phone'],
            'studentage'      =>  $request['age'],
            'gender'          =>  $request['gender'],
        ]);
        // $add = new student;
        // $add->studentname = request('username');
        // $add->studentpassword = request('password');
        // $add->studentemail = request('email');
        // $add->studentphone = request('phone');
        // $add->studentage = request('age');
        // $add->gender = request('gender');
        // $add->save();
        return back();
        // return Redirect('students');
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
        $students = student::all();
        // $students = student::paginate(5);
        // $students = student::orderby('studentage')->paginate(5);
        // $students = student::get(['studentname','gender','studentphone','studentage','studentemail']);
        // return dd($students);
        // return view('layouts.students',['students'=>$students]);
        return view('layouts.students',compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
