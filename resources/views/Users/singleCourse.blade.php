@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
    <i class="fa fa-whatsapp wp-button"></i>
    <p class="text-success h4 text-center my-2">Contact Tutor</p>
</a>
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <h1 class="h2">{{ $course->course_name }}</h1>

        <div class="row mb-5 p-5">
            <div class="col-md-8 shadow-sm">
                @forelse($courseContent as $content)
                <div>
                    <div class="shadow-sm my-2">
                        <ul>
                            <l1 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{ route('user_learnSingleCourse',$content->id) }}" class="nav-link text-dark">

                                        <h4 class="">{{$content->content_name}}</h4>
                                        <small>- video</small>
                                    </a>
                                </div>

                                <div>
                                    ✅
                                </div>

                            </l1>
                        </ul>
                    </div>
                </div>

                @empty
                <div class="text-warning text-center ">
                    NO CONTENT ADDED FOR THIS COURSE YET
                </div>
                @endforelse


                    @if($courseCompleted == true)
                        <div>
                            <p class="text-primary">You have completed this course</p>
                        </div>
                    @else
                        <div class="p-3">
                            <form method="post" action="{{ route('user_submitCompletedCourse') }}">
                                @csrf
                                @method('POST')
                                <div class="form-check">
                                    <small class="d-block text-dark">Check the completed box after you have completed this course</small class="d-block text-secondary  ">
                                    <div class="d-flex mt-3 align-items-center">
                                        <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden/>
                                        <input type="text" name="courses_id" value="{{$course->id}}" id="" hidden />
                                        <input class="" type="checkbox" value="completed" id="flexCheckDefault" name="completed" />
                                        <p class="form-check-label h1 mx-2">
                                            Completed
                                        </p>
                                        <button type="submit" class="btn  btn-sm btn-primary">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

            </div>
            <div class="col-md-4 shadow-sm">

                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            {{-- For each created assement --}}
                            <li class="d-flex justify-content-center align-items-center my-2">
                                <a href="{{ route('user_feedback', $course->id) }}" class="btn btn-danger text-center"> Give Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <h2>Assement</h2>
                </div>

                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            {{-- For each created assement --}}
                            @if($assessment == true)
                            <li class="d-flex justify-content-center align-items-center my-2">
                                @if($courseCompleted == true)
                                <a href="{{ route('user_takeAssesment', $course->id) }}" class="btn btn-primary"> Take Assessment</a>
                                @else
                                    <p class="text-warning">
                                        Complete the course to take the assessment!!!
                                    </p>
                                @endif
                            </li>
                            @else
                                <p class="text-danger">No assessment has been added to this course yet.</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
