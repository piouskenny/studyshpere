@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
{{-- <a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
<i class="fa fa-whatsapp wp-button"></i>
<p class="text-success h4 text-center my-2">Contact Tutor</p>
</a> --}}
<div class="main-panel">
    <div class="content-wrapper bg-light">
        {{-- <h1 class="h2">{{ $course->course_name }}</h1> --}}

        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-8">
                @forelse($assessments as $assessment)
                <h1 class="h2">Question: {{ $assessment->question }}?</h1>

                <div>
                    <h3 class="h6 mt-5">Options</h3>
                    <ul class="nav-link">
                        <li class="nav-item text-dark d-flex justify-content-between align-items-center">
                            A: {{ $assessment->option_a }}
                        </li>
                        <li class="nav-item text-dark d-flex justify-content-between align-items-center">
                            B: {{ $assessment->option_b }}
                        </li>
                        <li class="nav-item text-dark d-flex justify-content-between align-items-center">
                            C: {{ $assessment->option_c }}
                        </li>
                    </ul>
                    <form method="post" action="{{ route('user_submitProgress') }}">
                        @csrf
                        @method('POST')
                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    A
                                </label>
                                <input class="" type="checkbox" value="completed" id="flexCheckDefault" name="completed">
                            </div>
                        </div>

                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    B
                                </label>
                                <input class="" type="checkbox" value="completed" id="flexCheckDefault" name="completed">
                            </div>
                        </div>


                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    C
                                </label>
                                <input class="" type="checkbox" value="completed" id="flexCheckDefault" name="completed">
                            </div>
                        </div>

                        <button type="submit" class="btn  btn-sm btn-primary">submit</button>

                    </form>
                </div>
                @empty

                @endforelse

                <div id="paginate" class="mt-5">
                    {{ $assessments->links() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
