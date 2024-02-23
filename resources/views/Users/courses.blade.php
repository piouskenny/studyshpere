@extends('Layout.dashboard.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper bg-light">
        <section class="bg-light">
            <div class="container">
                <h1 class="my-5">All Courses</h1>

                <!-- ======= Courses Card Section ======= -->
                <div class="row">
                    @forelse($courses as $course)

                    <div class="col-sm-4 mb-4">
                        <div class="card shadow" style="height: 300px">
                            <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                                <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                {{-- <p class="card-text">{{ $course->description }}</p> --}}
                                <a href="{{route('singleCourseDetails',$course->id)}}" class="btn btn-primary">View Course</a>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="flex justify-content-center">
                        <div class="alert alert-danger text-center">
                            No Course Available yet
                        </div>
                    </div>

                    @endforelse

                    <div id="paginate" class="mt-5">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
