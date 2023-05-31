@extends('layouts.app')


@section('content')



    <div class="flex justify-center w-full">

        <div class="w-[450px]  shadow-lg px-4 py-8 rounded-md">
            <p class="text-center font-extrabold text-md md:text-2xl">User Login</p>
            @if ($errors->any())
                <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach

                </div>
            @endif
            @if (session('message'))
                <p class="alert alert-danger">
                    {{ session('message') }}
                </p>
            @endif
            <form id="user-reg" method="Post" action="{{ Route('user.login') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                        placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password">
                </div>
                <div class="flex justify-between items-center mt-4">
                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                    <p><span class="mr-2">Don't have an account?</span><a href="{{ route('user.register') }}">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
