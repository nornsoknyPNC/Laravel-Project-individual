<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request,$id) {
        $user = User::find(Auth::id());
        $students=Student::find($id);
        $comments = new Comment;
        $comments->comment = $request->get('comment');
        $comments->user_id = $user->id;
        $comments->student_id = $students->id;
        $comments->save();
        return back();
    }

    public function getComment() {
        $comments = Comment::all();
        return view('student.detail',compact('comments'));
    }

    public function showEdit($id) {
        $comments = Comment::find($id);
        return view('comment.edit',compact('comments'));
    }

    public function edit(Request $request,$id) {
        $user = User::find(Auth::id());
        $comments = Comment::find($id);
        $comments->comment = $request->get('comment');
        $comments->user_id = $user->id;
        $comments->save();
        return redirect('home') ;
    }

    public function delete($id) {
            $comments = Comment::find($id);
            $comments->delete();
            return back();
    }
}
