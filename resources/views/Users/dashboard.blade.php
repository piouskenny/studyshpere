@extends('Layout.dashboard.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="my-2">
            @include('components.alert')
        </div>
        <div class="row mb-5">
            <div class="col-md-3 shadow-sm p-5 text-center card_mobile-space">
                <h2>Enrolled Courses</h2>
                <h1> {{ $courses_enrolled }}</h1>
            </div>

            <div class="col-md-3 shadow-sm p-5 text-center  card_mobile-space">
                <h2>Completed Courses</h2>
                <h1> 0 </h1>
            </div>

            <div class="col-md-3 shadow-sm p-5 text-center  card_mobile-space">
                <h2>Pending Courses</h2>
                <h1> 3 </h1>
            </div>
        </div>

        <div class="row justify-content-start">
            <h2>Enrolled Courses</h2>
            @forelse($courses as $course)
            <div class="card col-md-4 my-2 pb-2">
                <a href="{{ route('tutorSingleCourse', $course->id) }}">
                    <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                        <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                    </div>
                    {{-- This is the button that will begin to dispay each course content one after the other --}}
                    <a href="" class="btn btn-primary">
                        Learn
                    </a>
                </a>
            </div>

            @empty
            <div class="flex justify-content-center">
                <div class="alert alert-danger text-center rounded rounded-4">
                    You have not enrolled for any course yet
                </div>
            </div>

            @endforelse





        </div>
    </div>
</div>
@endsection
