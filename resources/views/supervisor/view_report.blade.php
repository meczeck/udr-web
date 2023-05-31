@extends('layouts.supervisor_layout')

@section('content')
    <div class="relative overflow-x-auto bg-white drop-shadow-md md:p-4">
        <table class="w-full
    text-sm text-left text-gray-500 dark:text-gray-400">
            <thead>
                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Student Name
                    </th>

                    <td scope="row" class="px-2 py-2 ms-2">
                        {{ $dissertation->student->first_name . ' ' . $dissertation->ast_name }}
                    </td>
                </tr>

                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Student Department
                    </th>

                    <td scope="row" class="px-2 py-2 ms-2">
                        {{ $dissertation->student->userDepartment->name }}
                    </td>
                </tr>

                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Course
                    </th>

                    <td scope="row" class="px-2 py-2 ms-2">
                        {{ $dissertation->student->studentCourse->name }}
                    </td>
                </tr>

                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Title
                    </th>

                    <td scope="row" class="px-2 py-2 ms-2">
                        {{ $dissertation->title }}
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Abstract
                    </th>
                    <td class="px-2 py-2 ms-2">
                        <div>
                            {!! $dissertation->abstract !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Year
                    </th>

                    <td class="px-2 py-2 ms-2">
                        {{ $dissertation->year }}
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Document
                    </th>
                    <td class="px-2 py-2">
                        <a class="text-blue-700" href="/download-report/{{ $dissertation->id }}">
                            <i class="fas fa-fw fa-download"></i>

                            <span class="ml-1 underline">Download</span></a>
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="px-2 py-3 text-xs text-neutral-700">
                        Status
                    </th>

                    <td class="px-2 py-2 ms-2">
                        {{ $dissertation->status == 0 ? 'Not verified' : 'Verified' }}
                    </td>
                </tr>

            </thead>
        </table>
    </div>
@endsection
