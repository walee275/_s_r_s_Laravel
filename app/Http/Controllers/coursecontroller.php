<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Validation\Rules\Unique;

class coursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = course::all();
        return view('admin.courses.index', ['courses'=> $courses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> ['required']
        ]);

        $is_course_created = course::create([
            'name'=> $request['name']
        ]);
        if($is_course_created){
            return back()->with('success', 'course added successfully');
        }else{
            return back()->with('failed', 'course has failed to add');
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
    public function edit(course $course)
    {
        return view('admin.courses.edit', ['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(course $course, request $request)
    {
        $request->validate([
            'name'=> ['required','unique:courses,name,'. $request->id .',id']
        ]);

        $is_course_created = course::find($course->id)->update([
            'name'=> $request['name']
        ]);
        if($is_course_updated){
            return back()->with('success', 'course updated successfully');
        }else{
            return back()->with('failed', 'course has failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        $is_deleted = course::find($course->id)->delete();
        if($is_deleted){
            return back()->with('success', 'course deleted successfully');

        }else{
            return back()->with('failed', 'course has failed to delete');

        }

    }
}
