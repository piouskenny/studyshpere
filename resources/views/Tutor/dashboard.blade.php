@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class=" content-wrapper bg-light">

        <div class="row mb-5">
            <div class="col-md-3 shadow-sm p-4 text-center card_mobile-space rounded rounded-md">
                <h2>Courses</h2>
                <h1>{{$course}}</h1>

            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space rounded rounded-md bg-primary text-light">
                <h2>Student Enrolled</h2>
                <h1> 0 </h1>
            </div>

            <div class="col-md-3 shadow-sm p-4 text-center  card_mobile-space rounded rounded-md bg-success text-white">
                <h2>Average Grade</h2>
                <h1> 0 </h1>
            </div>
        </div>



        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <h2>Courses</h2>
                    @forelse($courses as $course)
                    <div class="card col-md-4 my-2 pb-0">
                        <a href="{{ route('tutorSingleCourse', $course->id) }}">
                            <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                                <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                            </div>
                            <a class="btn btn-primary btn-sm" href="{{route('createCourseContent',$course->id)}}">
                                Add Content
                            </a>
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
            <div class="col-md-4">
                <h2>Assement</h2>
                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            {{-- For each created assement --}}
                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">Assement 1</h1> <button class="btn btn-primary"> View</button>
                            </li>
                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">Assement 2</h1> <button class="btn btn-primary"> View</button>
                            </li>
                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">Assement 3</h1> <button class="btn btn-primary"> View</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
@endsection
