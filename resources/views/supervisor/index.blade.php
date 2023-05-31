@extends('layouts.supervisor_layout')


@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <p class="text-md md:text-lg mb-2 text-center">Students</p>

    <div class="relative overflow-x-auto bg-white drop-shadow-md">
        <table class="w-full
    text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        S/No
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Student Name
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Student's Department
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Student's Course
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Title
                    </th>

                    <th scope="col" class="px-2 py-3">
                        Year
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Document
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dissertations as $index => $dissertation)
                    <tr class="bg-white  dark:bg-gray-600 border-b-[1px] border-gray-200 dark:border-gray-400">
                        <td class="px-2 py-2">

                            {{ $index + 1 }}

                        </td>
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $dissertation->student->first_name . ' ' . $dissertation->student->last_name }}
                        </td>
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $dissertation->student->userDepartment->name }}
                        </td>
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $dissertation->student->studentCourse->name }}
                        </td>
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $dissertation->title }}
                        </td>
                        {{-- <td class="px-2 py-2">
                            <div>
                                {!! $dissertation->abstract !!}
                            </div>
                        </td> --}}
                        <td class="px-2 py-2">

                            {{ $dissertation->year }}

                        </td>

                        <td class="px-2 py-2">
                            <a class="text-blue-700" href="/download-report/{{ $dissertation->id }}">
                                <i class="fas fa-fw fa-download"></i>

                                <span class="ml-1 underline">Download</span></a>
                        </td>

                        <td lass="px-2 py-2">
                            {{ $dissertation->status == 0 ? 'Not verified' : 'Verified' }}
                        </td>
                        <td class="text-center py-2">
                            <div class="flex items-center gap-2">
                                @if ($dissertation->status === 0)
                                    <button onClick="allowVerify({{ $dissertation->id }})" id="verifyBtn" type="button"
                                        class="bg-green-700 rounded-md text-white hover:opacity-75 p-2.5"
                                        data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Verify
                                    </button>
                                @else
                                    <button disabled type="button" class="bg-gray-700 rounded-md text-gray-200 p-2.5">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Verified
                                    </button>
                                @endif

                                <a href="show-report/{{ $dissertation->id }}">
                                    <button type="button" class="bg-blue-700 rounded-md text-white p-2.5">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection

@push('myjs')
    <script>
        const myButton = document.getElementById('verifyBtn');

        // myButton.addEventListener('click', function() {
        //     console.log('Button clicked!');
        // });


        function allowVerify(event) {
            if (confirm("Proceed to verify this student?")) {
                window.location.href = "verify/" + event;
            }
        }
    </script>
@endpush
