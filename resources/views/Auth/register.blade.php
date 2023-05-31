@extends('layouts.app')


@section('content')
    @if (session('msg'))
        <p>{{ session('msg') }}</p>
    @endif

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="flex justify-center w-full">

        <div class="w-[500px]  shadow-lg px-4 py-8 rounded-md">
            <p class="text-center font-extrabold">User Registration</p>
            <form id="user-reg" method="Post" action="{{ Route('user.register') }}">
                @csrf
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="fname" placeholder="Enter First Name">
                    @if ($errors->has('fname'))
                        <div class="error-text">{{ $errors->first('fname') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lname" placeholder="Enter Last Name">
                    @if ($errors->has('lname'))
                        <div class="error-text">{{ $errors->first('lname') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                        placeholder="Enter email">
                    @if ($errors->has('email'))
                        <div class="error-text">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input maxlength="10" required type="number" class="form-control" id="phone" name="phone"
                        placeholder="Enter Phone Number">
                    @if ($errors->has('phone'))
                        <div class="error-text">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

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
                    <label for="course">Course:</label>
                    <select class="form-control" name="course" id="course">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course'))
                        <div class="error-text">{{ $errors->first('course') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password">
                    @if ($errors->has('password'))
                        <div class="error-text">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Password"
                        name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <div class="error-text">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div class="flex justify-between items-center mt-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <p><span class="mr-2">Already have an account?</span><a href="{{ route('user.login') }}">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .error-text {
            color: red;
        }
    </style>
@endpush
