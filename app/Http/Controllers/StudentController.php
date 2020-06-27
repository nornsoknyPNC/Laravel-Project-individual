<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Auth;
use Image;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('followup.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $students = new Student;
        $students->firstname = $request->get('firstname');
        $students->lastname = $request->get('lastname');
        $students->class = $request->get('class');
        $students->description = $request->get('description');
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/students/' . $filename ) );
            $students->picture = $filename;
        }else{
            return $request;
            $students->image='';
        }
        $students->user_id = $user->id;

        $students->save();
        return redirect('home'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('student.edit',compact('students'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('student.detail',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find(Auth::id());
        $students = Student::find($id);
        $students->firstname = $request->get('firstname');
        $students->lastname = $request->get('lastname');
        $students->class = $request->get('class');
        $students->description = $request->get('description');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/students/' . $filename ) );
            $students->picture = $filename;
        }else{
            return $request;
            $students->image='';
        }
        $students->user_id = $user->id;

        $students->save();
        return redirect('home'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function outFollowup($id) {
        $students = Student::find($id);
        $students ->activeFollowup = true;
        $students ->save();
        return back();
    }
    public function backFollowup($id) {
        $students = Student::find($id);
        $students ->activeFollowup = false;
        $students ->save();
        return back();
    }
}
