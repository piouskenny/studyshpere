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

            @include('components.alert')

            <div class="row  justify-content-center mb-5">
                <h2>Course Detail</h2>



                <div class="col-md-6">
                    <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img rounded" />
                </div>
                <div class="col-md-6 mt-4">
                    <h1>{{$course->course_name}}</h1>
                    <small class="text-primary">By: {{ $course->tutor->full_name}} </small>
                    <h4 class='mt-3'>Content Type: {{$course->course_type}}</h4>
                    <p class="text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate ullam vel
                        eum, expedita minima nostrum ea deleniti ipsum fuga voluptatibus officia omnis sint adipisci sed
                        corrupti ducimus ad deserunt? Ullam necessitatibus hic unde et odio ad aliquam soluta voluptate
                        animi aspernatur. Architecto enim vero incidunt necessitatibus, ab aliquam ea odit?</p>

                    <div class="mt-5">
                        <form method="post" action={{route('enroll',$course->id)  }}>
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-primary w-75">Enroll Now</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
</main>
@endsection
