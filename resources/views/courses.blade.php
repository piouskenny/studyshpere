@extends('Layout.app')
@section('content')
<section id="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center pb-5">
                <div data-aos="zoom-out">
                    <h1><span>COURSES</span></h1>
                </div>
            </div>

        </div>
    </div>


</section>

<main id="main">
    <!-- ======= Courses Card Section ======= -->
    <section id="about" class="about container">
        <div class="container-fluid">

            <div class="row p-1">
                <h2>Courses</h2>

                @forelse($courses as $course)
                <div class="card col-md-4 my-2 pb-2">
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

                    <a href="{{route('singleCourses',$course->id)}}" class="btn btn-primary">
                        Enroll
                    </a>
                </div>

                @empty
                <div class="flex justify-content-center">
                    <div class="alert alert-danger text-center">
                        No Course Available yet
                    </div>
                </div>

                @endforelse

            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
