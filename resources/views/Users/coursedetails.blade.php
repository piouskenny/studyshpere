@extends('Layout.dashboard.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <section class="bg-light">
            <div class="container">

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
                        <p class="mt-3"> {{ $course->description }} </p>

                        <div class="mt-5">
                            <form method="post" action={{route('enroll',$course->id)  }}>
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-primary w-75">Enroll Now</button>
                            </form>
                        </div>
                    </div>


                </div>
        </section>
    </div>
</div>
@endsection
