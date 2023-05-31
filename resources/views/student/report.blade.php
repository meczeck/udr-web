@extends('layouts.student_layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div>

        @if (session('msg'))
            <div class="alert alert-success">
                {{ Session('msg') }}
            </div>
        @endif

        @if ($dissertationCount >= 1)

            <!--Update Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Report details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="update-report/{{ $dissertation->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="MAX_FILE_SIZE" value="3145728"> <!-- 3 megabytes -->

                                <div class="md:grid grid-cols-2 gap-5">
                                    <div class="form-group">
                                        <label for="title"><span class="text-[red]">*</span>Title : </label>
                                        <input required type="text" class="form-control" id="title" name="title"
                                            value="{{ $dissertation->title }}" placeholder="Enter title">
                                        @if ($errors->has('title'))
                                            <div class="text-red-500">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="year"><span class="text-[red]">*</span>Year : </label>
                                        <input type="number" class="form-control" id="year" name="year"
                                            value="{{ $dissertation->year }}" placeholder="eg. 2023">
                                        @if ($errors->has('title'))
                                            <div class="text-red-500">{{ $errors->first('year') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="md:grid grid-cols-2 gap-5">
                                    <div class="form-group">
                                        <label for="supervisor"><span class="text-[red]">*</span> Supervisor:</label>
                                        <select required class="form-control" name="supervisor" id="supervisor"
                                            value="{{ $dissertation->supervisor->id }} >

                                     @if ($supervisorsCount > 1)
                                         @foreach ($supervisors as $supervisor)
                                            <option value="{{ $supervisor->id }}">
                                            {{ $supervisor->first_name . ' ' . $supervisor->last_name }}
                                            </option>
        @endforeach
    @else
        <option value="#">No supervisor found</option>
        @endif
        </select>
        @if ($errors->has('supervisor_id'))
            <div class="text-red-500">{{ $errors->first('supervisor_id') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="document"><span class="text-[red]">*</span> Upload document </label>
        <input required type="file" class="form-control" id="document" name="document" placeholder="eg. 2023">
        @if ($errors->has('document'))
            <div class="text-red-500">{{ $errors->first('document') }}</div>
        @endif
    </div>
    </div>

    <div class="form-group">
        <label for="summernote"><span class="text-[red]">*</span>Abstract</label>
        <textarea class="form-control" name="abstract" id="summernote">{{ $dissertation->abstract }}</textarea>
        @if ($errors->has('abstract'))
            <div class="text-red-500">{{ $errors->first('abstract') }}</div>
        @endif
    </div>

    <div class="mt-5">
        <Button type="submit" class="w-full bg-[#3C62D1] py-[12px] text-white rounded-md drop-shadow-sm">
            Update
        </Button>
    </div>

    </form>
    </div>
    </div>
    </div>
    </div>

    <div>

        <div>
            <p class="text-md md:text-lg text-center py-4">Report Details</p>

            <div class="relative overflow-x-auto bg-white p-4 md:p-0 drop-shadow-md hidden lg:block">
                <table class="w-full
                text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Abstract
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Year
                            </th>

                            <th scope="col" class="px-2 py-3">
                                Supervisor
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

                        <tr class="bg-white  dark:bg-gray-600 dark:border-gray-400">

                            <td scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $dissertation->title }}
                            </td>
                            <td class="px-2 py-2">
                                <div>
                                    {!! $dissertation->abstract !!}
                                </div>
                            </td>
                            <td class="px-2 py-2">

                                {{ $dissertation->year }}

                            </td>

                            <td lass="px-2 py-2">
                                {{ $dissertation->supervisor->first_name . ' ' . $dissertation->supervisor->last_name }}
                            </td>

                            <td class="px-2 py-2">
                                <a class="text-blue-700" href="download-report/{{ $dissertation->id }}">
                                    <i class="fas fa-fw fa-download"></i>

                                    <span class="ml-1 underline">Download</span></a>
                            </td>

                            <td lass="px-2 py-2">
                                {{ $dissertation->status == 0 ? 'Not verified' : 'Verified' }}
                            </td>
                            <td class="text-center py-2">
                                <button type="button" class="bg-green-700 rounded-md text-white hover:opacity-75 p-2.5"
                                    data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Update
                                </button>


                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>


            <div class="relative overflow-x-auto md:p-0 bg-white drop-shadow-md lg:hidden">
                <table class="w-full
                text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>

                            <td scope="row" class="px-2 py-2 ms-2">
                                {{ $dissertation->title }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Description
                            </th>
                            <td class="px-2 py-2 ms-2">
                                <div>
                                    {!! $dissertation->abstract !!}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Year
                            </th>

                            <td class="px-2 py-2 ms-2">
                                {{ $dissertation->year }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Supervisor
                            </th>

                            <td class="px-2 py-2 ms-2">
                                {{ $dissertation->supervisor->first_name . ' ' . $dissertation->supervisor->last_name }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Document
                            </th>
                            <td class="px-2 py-2 ms-2">
                                <a class="text-blue-700 underline" href="download-report/{{ $dissertation->id }}">
                                    <i class="fas fa-fw fa-download"></i>

                                    Download</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Status
                            </th>

                            <td class="px-2 py-2 ms-2">
                                {{ $dissertation->status == 0 ? 'Not verified' : 'Verified' }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-2 py-3 text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                Actions
                            </th>

                            <td class="text-center py-2 ms-2">

                                <div> <button type="button"
                                        class="bg-green-700 rounded-md text-white hover:opacity-75 p-2.5"
                                        data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Update
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </thead>
                </table>
            </div>
        </div>

    </div>
@else
    <h4 class="text-center font-4 font-extrabold">Report Submission</h4>

    <div class="w-full mt-5 md:mt-10">
        <div class="max-w-[1200px] mx-auto bg-white drop-shadow-md p-4 md:py-8">
            <form action="{{ route('store.report') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="MAX_FILE_SIZE" value="3145728"> <!-- 3 megabytes -->

                <div class="md:grid grid-cols-2 gap-5">
                    <div class="form-group">
                        <label for="title"><span class="text-[red]">*</span>Title : </label>
                        <input required type="text" class="form-control" id="title" name="title"
                            placeholder="Enter title">
                        @if ($errors->has('title'))
                            <div class="text-red-500">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="year"><span class="text-[red]">*</span>Year : </label>
                        <input type="number" class="form-control" id="year" name="year"
                            placeholder="eg. 2023">
                        @if ($errors->has('title'))
                            <div class="text-red-500">{{ $errors->first('year') }}</div>
                        @endif
                    </div>
                </div>

                <div class="md:grid grid-cols-2 gap-5">
                    <div class="form-group">
                        <label for="supervisor"><span class="text-[red]">*</span> Supervisor:</label>
                        <select required class="form-control" name="supervisor" id="supervisor">

                            @if ($supervisorsCount > 1)
                                @foreach ($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}">
                                        {{ $supervisor->first_name . ' ' . $supervisor->last_name }}</option>
                                @endforeach
                            @else
                                <option value="#">No supervisor found</option>
                            @endif
                        </select>
                        @if ($errors->has('supervisor_id'))
                            <div class="text-red-500">{{ $errors->first('supervisor_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="document"><span class="text-[red]">*</span> Upload document </label>
                        <input required type="file" class="form-control" id="document" name="document"
                            placeholder="eg. 2023">
                        @if ($errors->has('document'))
                            <div class="text-red-500">{{ $errors->first('document') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="summernote"><span class="text-[red]">*</span>Abstract</label>
                    <textarea class="form-control" name="abstract" id="summernote"></textarea>
                    @if ($errors->has('abstract'))
                        <div class="text-red-500">{{ $errors->first('abstract') }}</div>
                    @endif
                </div>

                <div class="mt-5">
                    <Button type="submit" class="w-full bg-[#3C62D1] py-[12px] text-white rounded-md drop-shadow-sm">
                        Submit
                    </Button>
                </div>

            </form>
        </div>
    </div>

    @endforelse
    </div>
@endsection

@push('styles')
    <style>
        .error-text {
            color: red'

        }
    </style>
@endpush
