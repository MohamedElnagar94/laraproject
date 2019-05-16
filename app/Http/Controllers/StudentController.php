<?php

namespace App\Http\Controllers;

use App\student;
// use App\Http\Controllers\Validat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use DB;
use Session;

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

    public static function delete($id=null)
    {
        // return request('id');

        if(request()->has('harddelete')){
            // student::whereIn('id',request('id'))->forceDelete();
            // DB::table("students")->whereIn('id',request('id'))->forceDelete();
            $delete = student::find($id);
            $delete->forceDelete();
            session::flash('delete', 'mohamed');
            // student::forceDelete(request('id'));

        }else if(request()->has('recycle')){
            student::destroy(request('id'));
            session::flash('recycle', 'mohamed');
        }
        // $delete = student::find($id);
        // $delete->delete();
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
    public function recycle($id=null)
    {
        // return request('id');

        // $delete = student::find($id);
        // dd(delete);
        if (request()->has('recycle') && request()->has('id')) {
            // DB::table("students")->whereIn('id',request('id'))->restore();
            student::whereIn('id',request('id'))->restore();
        } else if(request()->has('harddelete') && request()->has('id')){
            student::whereIn('id',request('id'))->forceDelete();
            // session::flash('deletestudent', 'mohamed');

        }
        return back();
    }

    public function addstudent(Request $request)
    {
        // return $validator->errors()->all();
        // create
        // firstorcreate
        // firstornew
        // updateorcreate
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'studentname'       => 'required',
        //     'studentpassword'   => 'required',
        //     'studentemail'      => 'required',
        //     'studentphone'      => 'required',
        //     'studentage'        => 'required',
        //     'gender'            => 'required',
        // ]);
        $data = $this->validate($request,[
            'username'      => 'required|max:100|min:4',
            'email'         => 'required|email|unique:students,studentemail',
            'password'      => 'required|min:8',
            'phone'         => 'required|numeric',
            'age'           => 'required|numeric',
            'gender'        => 'required',
        ],[
            'username.required'      => 'The User Name is required you should enter your user name',
            'username.max'      => 'The User Name must be less than 100 characters',
            'username.min'      => 'The User Name must be more than 4 characters',
            'email.required'         => 'The Email is required you should enter your Email',
            'email.email'         => 'The Field Email must be Email for example: example@example.com',
            'email.unique'         => 'The Email has already been taken',
            'password.required'      => 'The Password is required you should enter your Password',
            'password.min'      => 'The User Name must be more than 8 characters',
            'phone.required'         => 'The Phone Number is required you should enter your Phone Number',
            'phone.numeric'         => 'The Phone Number must be number',
            'age.required'           => 'The Age is required you should enter your Age',
            'age.numeric'         => 'The Age must be number',
            'gender.required'        => 'The Gender is required you must choose one of options',
        ],[
            'username'      => 'User Name',
            'email'         => 'Email',
            'password'      => 'Password',
            'phone'         => 'Phone Number',
            'age'           => 'Age',
            'gender'        => 'Gender',
        ]);
        // $data = $this->validate(request(),[
        //     'studentname'       => 'required',
        //     'studentpassword'   => 'required',
        //     'studentemail'      => 'required',
        //     'studentphone'      => 'required',
        //     'studentage'        => 'required',
        //     'gender'            => 'required',
        // ]);
        // student::create($data);
        student::create([
            'studentname'     =>  $request['username'],
            'studentpassword' =>  $request['password'],
            'studentemail'    =>  $request['email'],
            'studentphone'    =>  $request['phone'],
            'studentage'      =>  $request['age'],
            'gender'          =>  $request['gender'],
        ]);
        session::flash('message', 'mohamed');
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
        // $students = student::all();
        $students = student::withTrashed()->get();
        $recycle = student::onlyTrashed()->get();
        // $students = student::paginate(5);
        // $students = student::orderby('id')->get(['studentname','gender','studentphone','studentage','studentemail']);
        // $students = student::get(['studentname','gender','studentphone','studentage','studentemail']);
        // return dd($students);
        // return view('layouts.students',['students'=>$students]);
        return view('layouts.students',compact('students','recycle'));
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
