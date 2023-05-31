@extends('layouts.student_layout')


@section('content')
    @if ($dissertationCount < 1)
        <div class="alert alert-warning alert-dismissible fade show" role="alert"">
            <p class="text-lg font-normal">You have not submitted your report yet</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @else
        <div class="alert alert-info alert-dismissible fade show" role="alert"">
            <p class="text-lg font-normal">You have already submitted your report. <span class="undeline text-blue-700" ><a href="{{ route('create.report') }}">You can review here</a></span></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
