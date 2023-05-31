<?php

namespace App\Http\Controllers;

use App\Models\Dissertation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    public function index()
    {
        $dissertations = Dissertation::with('student.userDepartment', 'student.studentCourse')->where('supervisor_id', Auth::user()->id)->get();
        return view('supervisor.index', compact('dissertations'));
    }

    public function verify($id)
    {
        $diss = Dissertation::findOrFail($id);

        $diss->status = true;
        $diss->save();

        return back()->with('msg', "Student verified successfully");
    }

    public function profile()
    {
        return view('supervisor.profile');
    }

}
