@extends('Layout.admin_dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5">
            <div class="col-md-3 shadow-sm p-4 text-center card_mobile-space">
                <h2>Courses</h2>
                <h1>{{ $course_count }}</h1>

            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space">
                <h2>Students</h2>
                <h1> {{ $student_count }} </h1>
            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space">
                <h2>Tutor</h2>
                <h1> {{$tutor_count}} </h1>
            </div>
        </div>

        <div class="row  justify-content-start">
            <h2>Courses</h2>


        </div>
    </div>
</div>
@endsection
