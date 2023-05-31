<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationrequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Dissertation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();

        return view('Auth.register', compact('departments', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistrationrequest $request)
    {

        User::create([
            "first_name" => $request->input('fname'),
            "last_name" => $request->input('lname'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "department_id" => $request->input('department'),
            "course_id" => $request->input('course'),
            "password" => Hash::make($request->input('password')),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with("message", "User deleted successfully");
    }
}
