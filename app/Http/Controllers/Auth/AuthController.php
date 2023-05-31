<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationrequest;
use App\Models\Dissertation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            "department_id" => $request->input('department'),
            "course_id" => $request->input('course'),
            "password" => Hash::make($request->input('password')),
        ]);

        if ($request->validated()) {


            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];
            if (Auth::attempt($credentials)) {

                return redirect()->route('student.index')->with('msg', "Account successfully created");
            }
        }
    }


    public function login(Request $request)
    {
        // Retrieve the user credentials from the form input
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $student = User::where('email', $request->input('email'))->first();

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            // Redirect or perform any other actions
            if (Auth::user()->role_as === 1) {
                return redirect()->route('supervisor.index')->with('msg', "You have successfully logged in");
            } else if (Auth::user()->role_as === 0) {
                return redirect()->route('coordinator.index')->with('msg', "You have successfully logged in");
            } else {
                return redirect()->route('student.index')->with('msg', "You have successfully logged in");
            }
        } else {
            // Authentication failed
            // Redirect back or display an error message
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }

    public function showUserLogin()
    {
        return view('Auth.login');
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
        //
    }
}
