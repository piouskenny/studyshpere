@extends('Layout.dashboard.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="my-2F">
            @include('components.alert')
        </div>
        <div class="row mb-5">
            <div class="col-md-4 shadow-sm p-5 text-center card_mobile-space">
                <h2>Enrolled Courses</h2>
                <h1> {{ $courses_enrolled }}</h1>
            </div>

            <div class="col-md-4 shadow-sm p-5 text-center  card_mobile-space">
                <h2>Completed Courses</h2>
                <h1> 0 </h1>
            </div>
        </div>

        <div class="row justify-content-start">
            <h2>Enrolled Courses</h2>
            @forelse ($courses as $course )
            <div class="card col-md-4  my-2">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Food/8-col/img (5).jpg" class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                    <ul class="list-unstyled list-inline mb-0">
                        <li class="list-inline-item">
                            <p class="text-muted">4.5 (413)</p>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="#!" class="btn btn-primary link-secondary p-md-1 mb-0 w-75 btn_card">Continue Learning</a>
                    </div>
                </div>
            </div>
            @empty

            @endforelse





        </div>
    </div>
</div>
@endsection
