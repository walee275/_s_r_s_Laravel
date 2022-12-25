<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\registeration;

class registerationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registerations = registeration::with('student','course')->get();
        return view('admin.registrations.index', ['registerations' => $registerations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::with('user')->get();

        $courses = course::all();

        return view('admin.registrations.add', ['students'=> $students, 'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, registeration $registeration)
    {
        $request->validate([
            'student' => ['required', 'unique:registerations,student_id,' . $registeration->id . ',id,course_id,' . $request->course],
            'course' => ['required']
        ],[
            'student.unique'=> "The student is already registered with this course!"
        ]);

        $is_registration_created = registeration::create([
            'student_id' =>$request['student'],
            'course_id' =>$request['course']
        ]);
        if($is_registration_created){
            return back()->with('success', 'Registeration added successfully');
        }else{
            return back()->with('failed', 'Registeration has failed to add!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(registeration $registeration)
    {
        $students = Student::with('user')->get();

        $courses = course::all();
        return view('admin.registrations.edit', ['registeration' => $registeration, 'students'=>$students, 'courses'=>$courses]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registeration $registeration)
    {
        $request->validate([
            'student' => ['required', 'unique:registerations,student_id,' . $registeration->id . ',id,course_id,' . $request->course],
            'course' => ['required']
        ],[
            'student.unique'=> 'This student is already registered with this course'
        ]);

        $is_registration_created = registeration::find($registeration->id)->update([
            'student_id' =>$request['student'],
            'course_id' =>$request['course']
        ]);
        if($is_registration_created){
            return back()->with('success', 'Registeration added successfully');
        }else{
            return back()->with('failed', 'Registeration has failed to add!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(registeration $registeration)
    {

        $is_registeration_deleted = registeration::find($registeration->id)->delete();
        if($is_registeration_deleted){
            return back()->with('success', 'Registeration deleted successfully');
        }else{
            return back()->with('failed', 'Registeration has failed to delete!');
        }
    }
}
