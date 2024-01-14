@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5">
            <div class="col-md-3 shadow-sm p-4 text-center card_mobile-space rounded rounded-md">
                <h2>Courses</h2>
                <h1>{{$course}}</h1>

            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space rounded rounded-md bg-success text-light">
                <h2>Student Enrolled</h2>
                <h1> 0 </h1>
            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space rounded rounded-md bg-warning text-white">
                <h2>Average Grade</h2>
                <h1> 0 </h1>
            </div>
        </div>

        <div class="row  justify-content-start">
            <h2>Courses</h2>

            @forelse($courses as $course)
            <div class="card col-md-4 my-2">
                <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                    <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                    <ul class="list-unstyled list-inline mb-0">
                        <li class="list-inline-item">
                            <p class="text-muted">Enrolled (0)</p>
                        </li>
                    </ul>
                </div>


                <a class="btn btn-primary">
                    View Course
                </a>
            </div>
            @empty
            <div class="flex justify-content-center">
                <div class="alert alert-danger text-center">
                    You've not added any course yet
                </div>
            </div>

            @endforelse

        </div>
    </div>
</div>
@endsection
