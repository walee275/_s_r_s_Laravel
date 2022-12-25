<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\File;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('user')->get();
        // return dd($students);
        return view('admin.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.add');
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
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'profile_picture' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        // return dd($request);

        $file = $request['profile_picture'];
        $filename = $file->getClientOriginalName();
        $filename = time() . "-" . $filename;


        $is_user_created = user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'profile_picture' => $filename,
            'user_type' => "student",
        ]);
        if ($is_user_created) {

            $is_file_uploaded = $file->move(public_path('uploads'), $filename);

            if ($is_file_uploaded) {
                $is_student_created = student::create([
                    'user_id' => $is_user_created->id
                ]);
                if ($is_student_created) {
                    return back()->with('success', 'Student added successfully');
                } else {
                    return back()->with('failed', 'Student has fsiled to add');
                }
            } else {
                return back()->with('failed', 'Picture has failed to upload');
            }
        } else {
            return back()->with('failed', 'user has fsiled to add');
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
    public function edit(student $student)
    {
        return view('admin.students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(student $student, request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $student->user_id . ',id'],
            'profile_picture' => ['mimes:png,jpg,jpeg']
        ]);

        $file = $request->file('profile_picture');
        $file_name = '';
        $old_file_name = '';

        if ($file) {
            $file_name = "p-" . microtime(true) . "." . $file->extension();
            $old_file_name = $student->user->profile_picture;
        } else {
            $file_name = $student->user->profile_picture;
        }

        $is_user_updated = User::find($student->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => $file_name
        ]);

        if ($is_user_updated) {
            if ($file) {
                File::delete(public_path('uploads/' . $old_file_name));
                $is_file_uploaded = $file->move(public_path('uploads'), $file_name);
                if ($is_file_uploaded) {
                    return back()->with('success', 'Magic has been spelled');
                } else {
                    return back()->with('failed', 'Magic has failed to spell');
                }
            } else {
                return back()->with('success', 'Magic has been spelled');
            }
        } else {
            return back()->with('failed', 'Magic has failed to spell');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $is_file_deleted = File::delete('uploads/'.$student->user->profile_picture);

        if($is_file_deleted){
            $is_student_deleted = User::find($student->user_id)->delete();

            if($is_student_deleted){
                return back()->with('success', 'Student successfully deleted');

            }else{
            return back()->with('failed', 'Student has failed to delete!');
            }
        }
    }
}
