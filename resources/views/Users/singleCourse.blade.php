@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
    <i class="fa fa-whatsapp wp-button"></i>
    <p class="text-success h4 text-center my-2">Contact Tutor</p>
</a>
<div class="main-panel">
    <div class="content-wrapper bg-light">

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
            <div class="text-light text-center bg-danger">
                NO CONTENT ADDED FOR THIS COURSE YET
            </div>
            @endforelse
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
                        <li class="d-flex justify-content-between align-items-center my-2">
                            <h1 class="h4">Assement 1</h1> <button class="btn btn-primary"> Take</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection
