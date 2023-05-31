@extends('layouts.coordinator_layout')

@section('content')
<p class="text-md md:text-lg  text-center">Profile</p>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="flex items-center justify-center bg-gray-200 h-28">
                <i class="fa fa-user-circle" style="font-size: 70px" aria-hidden="true"></i>
            </div>
            <div class="py-4 px-6">
                <h2 class="text-2xl font-bold mb-2">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h2>
                <p class="text-gray-600 mb-4">{{ Auth::user()->email }}</p>
                <div class="flex justify-end">
                    <a href="#" class="text-blue-500 font-bold">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection 
