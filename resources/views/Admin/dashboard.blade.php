@extends('Layout.admin_dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="my-2F">
            @include('components.alert')
        </div>
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

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <h2>Courses</h2>
                    @forelse($courses as $course)
                    <div class="card col-md-4 my-2 pb-0">
                        <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                            <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                        </div>
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
                <div class="shadow-sm p-3 mt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-primary">Tutors</h2>
                        <a href="{{ route('admin_addTutor') }}" class="btn btn-primary"> Add Tutor</a href="{{ route('admin_addTutor') }}">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phonenumber</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tutors as $tutor)
                                <tr class="">
                                    <td scope="row">{{ $tutor->full_name }}</td>
                                    <td>0{{ $tutor->phonenumber }}</td>
                                    <td><button class="btn btn-primary"> View</button></td>
                                </tr>
                                @empty
                                <div class="p-2 text-white bg-danger">
                                    <p>No Student has enrolled for your course yet.</p>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
