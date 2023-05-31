<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CoordinatorController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $supervisors = User::with(['userDepartment'])->where('role_as', 1)->orderByDesc('created_at')->get();
        return view('coordinator.index', compact(['supervisors', 'departments']));
    }

    public function store(CreateSupervisorRequest $request)
    {
        try {
            $supervisor = User::create([
                "first_name" => $request->input('fname'),
                "last_name" => $request->input('lname'),
                "email" => $request->input('email'),
                "department_id" => Auth::user()->department_id,
                "password" => Hash::make(ucwords($request->input('lname'))),
                "role_as" => '1',
                'phone' => $request->input('phone'),
            ]);

            return back()->with("message", "Supervisor successfully added");
        } catch (Exception $e) {
            error_log($e->getMessage());
            return back()->with("errors", $e->getMessage());
        }
    }

    public function showUpdate($id)
    {
        $supervisor = User::findOrfail($id);
        return view('coordinator.update_supervisor', compact('supervisor'));
    }

    public function updateSupervisor(UpdateSupervisorRequest $request)
    {
        $supervisor = User::findOrfail($request->input('id'));
        $supervisor->first_name = $request->input('fname');
        $supervisor->last_name = $request->input('lname');
        $supervisor->email = $request->input('email');
        $supervisor->phone = $request->input('phone');
        $supervisor->password = Hash::make(ucwords($request->input('lname')));
        $supervisor->save();

        return redirect()->route('coordinator.index')->with("message", "Supervisor updated successfully");
    }


    public function profile()
    {
        return view('coordinator.profile');
    }
}
