@extends('layouts.coordinator_layout')

@section('content')

<div class="max-w-[430px] mx-auto bg-white drop-shadow-md p-4 rounded-lg" > 
    <p class="text-xl font-bold text-center" > Update Supervisor details </p> 
    <form id="user-reg" method="POST" action="{{ route('update.supervisor') }}">
        @csrf

        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input required type="text" class="form-control" id="firstName" name="fname" placeholder="Enter First Name" value="{{ $supervisor->first_name }}" >
            @if ($errors->has('fname'))
                <div class="error-text">{{ $errors->first('fname') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input required type="text" class="form-control" id="lastName" name="lname" value="{{ $supervisor->last_name }}"
                placeholder="Enter Last Name">
            @if ($errors->has('lname'))
                <div class="error-text">{{ $errors->first('lname') }}</div>
            @endif
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Email address:</label>
            <input required type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $supervisor->email }}"
                placeholder="Enter email">
            @if ($errors->has('email'))
                <div class="error-text">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input maxlength="10" required type="number" class="form-control" id="phone" name="phone" value="{{ $supervisor->phone }}"
                placeholder="Enter Phone Number">
            @if ($errors->has('phone'))
                <div class="error-text">{{ $errors->first('phone') }}</div>
            @endif
        </div>

        <input type="hidden" name="id" value="{{ $supervisor->id }}">

        <div class="flex justify-end items-center mt-4">
            <button type="submit" class="bg-blue-500 rounded-md text-white hover:opacity-75 p-2.5">Update</button>
        </div>
    </form>
</div>
@endsection('content')