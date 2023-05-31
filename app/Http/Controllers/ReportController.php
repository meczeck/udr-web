<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadReportRequest;
use App\Models\Dissertation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dissertation = '';
        $dissertationCount = Dissertation::where('student_id', '=', Auth::user()->id)->get()->count();
        if ($dissertationCount >= 1) {
            $dissertation = Dissertation::with(['supervisor'])->where('student_id', '=', Auth::user()->id)->first();
        }
        return view('student.index', compact('dissertationCount', 'dissertation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dissertationCount = Dissertation::where('student_id', '=', Auth::user()->id)->get()->count();
        $supervisors = User::where('role_as', '=', 1)->where('department_id', '=', Auth::user()->department_id)->get();
        $supervisorsCount = User::where('role_as', '=', 1)->where('department_id', '=', Auth::user()->department_id)->get()->count();

        $dissertation = '';
        $dissertationCount = Dissertation::where('student_id', '=', Auth::user()->id)->get()->count();
        if ($dissertationCount >= 1) {
            $dissertation = Dissertation::with(['supervisor'])->where('student_id', '=', Auth::user()->id)->first();
        }

        return view('student.report', compact('supervisors', 'supervisorsCount', 'dissertationCount', 'dissertation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadReportRequest $request)
    {

        $doc = $request->file('document')->getClientOriginalName();
        $docName = uniqid() . "_" . $doc;

        $request->file('document')->storeAs('public/documents', $docName);

        $report = Dissertation::create([
            'student_id' => Auth::user()->id,
            'supervisor_id' => $request->input('supervisor'),
            'title' => $request->input('title'),
            'abstract' => $request->input('abstract'),
            'document' => $docName,
            'year' => $request->input('year'),

        ]);

        return back()->with('message', "Report successfully submitted");
    }

    public function downloadReport($id)
    {

        $report_doc = Dissertation::findOrFail($id);

        if (Storage::disk('public')->exists('documents/' . $report_doc->document)) {

            $filepath = public_path("storage/documents/" . $report_doc->document);

            return response()->download($filepath);

            // return  Storage::disk('public')->get("documents/$report_doc->document");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dissertation = Dissertation::with('student.userDepartment', 'student.studentCourse')->where('id', $id)->first();
        return view('supervisor.view_report', compact('dissertation'));
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
    public function update(UploadReportRequest $request, string $id)
    {
        $dissertation = Dissertation::findOrFail($id);
        $path = public_path("storage/documents/$dissertation->document");

        if (File::exists($path)) {
            File::delete($path);
        }

        $doc = $request->file('document')->getClientOriginalName();
        $docName = uniqid() . "_" . $doc;

        $request->file('document')->storeAs('public/documents', $docName);

        // $report = Dissertation::create([
        //     'student_id' => Auth::user()->id,
        //     'supervisor_id' => $request->input('supervisor'),
        //     'title' => $request->input('title'),
        //     'abstract' => $request->input('abstract'),
        //     'document' => $docName,
        //     'year' => $request->input('year'),

        // ]);

        $dissertation->student_id = Auth::user()->id;
        $dissertation->title = $request->input('title');
        $dissertation->abstract = $request->input('abstract');
        $dissertation->document = $docName;
        $dissertation->year = $request->input('year');
        $dissertation->save();

        return back()->with('message', "Report Updated submitted");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
