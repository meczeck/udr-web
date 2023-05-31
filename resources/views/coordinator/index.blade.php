@extends('layouts.coordinator_layout')

@section('content')
    <p class="text-md md:text-lg  text-center">Supervisors</p>

    @if (session('message'))
        <p class="alert alert-success">{{ session('message') }}</p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div>
        <!-- Button trigger modal -->
        <button type="button" class="bg-red-500 rounded-md text-white hover:opacity-75 p-2.5 my-2" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Add Supervisor <i class="fa fa-plus" aria-hidden="true"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-center text-2xl font-bold" id="exampleModalLabel">Register new
                            supervisor</h5>
                        <button type="button" class="btn-close text-red-600" data-bs-dismiss="modal" aria-label="Close"> <i
                                style="width: 10px;" class="fa fa-window-close" aria-hidden="true"></i> </button>
                    </div>
                    <div class="modal-body">
                        <form id="user-reg" method="POST" action="{{ route('store.supervisor') }}">
                            @csrf

                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input required type="text" class="form-control" id="firstName" name="fname"
                                    placeholder="Enter First Name">
                                @if ($errors->has('fname'))
                                    <div class="error-text">{{ $errors->first('fname') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input required type="text" class="form-control" id="lastName" name="lname"
                                    placeholder="Enter Last Name">
                                @if ($errors->has('lname'))
                                    <div class="error-text">{{ $errors->first('lname') }}</div>
                                @endif
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address:</label>
                                <input required type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <div class="error-text">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input  maxlength="10" required type="number" class="form-control" id="phone"
                                    name="phone" placeholder="Enter Phone Number">
                                @if ($errors->has('phone'))
                                    <div class="error-text">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            {{-- 
                            <div class="w-full md:grid grid-cols-2 gap-4">
                                <div class="form-group">
                                    <label for="department">Department:</label>
                                    <select class="form-control" name="department" id="department">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department'))
                                        <div class="error-text">{{ $errors->first('department') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input  disabled readonly required type="text" class="form-control" id="password"
                                        name="password" placeholder="First name will be take as initial passwd">
                                    @if ($errors->has('password'))
                                        <div class="error-text">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="flex justify-end items-center mt-4">
                                <button type="submit"
                                    class="bg-blue-500 rounded-md text-white hover:opacity-75 p-2.5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="relative overflow-x-auto bg-white drop-shadow-md hidden lg:block">
        <table class="w-full
        text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        Index
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Phone
                    </th>

                    <th scope="col" class="px-2 py-3">
                        Department
                    </th>
                    <th scope="col" class="px-2 py-3 text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($supervisors as $index => $supervisor)
                    <tr class="bg-white  dark:bg-gray-600 dark:border-gray-400 border-b-[1px] border-gray-300">
                        <td class="px-2 py-2">
                            {{ $index + 1 }}
                        </td>
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $supervisor->first_name . ' ' . $supervisor->last_name }}
                        </td>
                        <td class="px-2 py-2">
                            <div>
                                {{ $supervisor->email }}
                            </div>
                        </td>
                        <td class="px-2 py-2">
                            {{ $supervisor->phone }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $supervisor->userDepartment->name }}
                        </td>

                        <td class="text-center py-2">
                            <a href="show-update/{{ $supervisor->id }}">
                                <button type="button" class="bg-green-700 rounded-md text-white hover:opacity-75 p-2.5">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Update
                                </button>
                            </a>

                            <button onClick="handleDelete( {{ $supervisor->id }} )" type="button"
                                class="bg-red-500 rounded-md text-white hover:opacity-75 p-2.5">
                               <i class="fa fa-trash" aria-hidden="true"></i> Delete
                            </button>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


@push('myjs')
    <script>
        function handleDelete(id) {
            if (confirm("Proceed to delete supervisor??")) {
                window.location.href="/delete-user/" + id;
            }
        }
    </script>
@endpush
