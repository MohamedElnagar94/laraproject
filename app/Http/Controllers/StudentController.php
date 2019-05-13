<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

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

    public function delete($id)
    {
        $delete = student::find($id);
        $delete->delete();
        return back();
    }
    public function deleteall($id=null)
    {
        return request('id');
        // $myCheckboxes = $request->input('id');
        // dd($myCheckboxes);
        // dd($request->all());
        // $ids =  request('id');
        // $ids = $request->ids;
        // dd($ids);
        // DB::table("students")->whereIn('id',explode(",",$ids))->delete();
        // return response()->json(['success'=>"Products Deleted successfully."]);
        // return request('id');
        // if (!$id = null) {
            // $delete = student::find($id);
            // $delete->delete();
        // } else if(request()->has('id')){
            // student::destroy(request('id'));
        // }
        // for($ii = 0; $ii < count($request->id);$ii++){
        //     $student_id_array = $request->id[$ii];
        //     dd($student_id_array);
        // }
        
        // $student = student::whereIn('id', $student_id_array);
        
        // return back();
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
        $students = student::orderby('id')->get(['studentname','gender','studentphone','studentage','studentemail']);
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
        // $myCheckboxes = $student->input('id');
        // dd($myCheckboxes);
        // dd($student->all());
        // $ids_to_delete = array_map(function($item){ return $item['id']; }, $users_to_delete);
        // DB::table('students')->whereIn('id', $ids_to_delete)->delete(); 

        
        // $delete = student::find($student);
        $delete = student::find($student);
        dd($delete);
        // student::destroy(request('id'));
        // $student_id_array = $student->input('id');
        // dd($student_id_array);
        // $student = student::whereIn('id', $delete);
        // student::find($student)->delete();
        // $ids = $student->ids;
        // dd($ids);
        // DB::table("students")->whereIn('id',explode(",",$ids))->delete();
        // return back();
    }
}
