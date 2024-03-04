@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-10 shadow-sm">

                <div class="shadow-sm">
                    <iframe width="560" height="315" src="{{ $singleVideo->content_url }}" frameborder="0"></iframe>
                </div>

                @if($course_progress == true)
                <div></div>
                @else
                <div class="p-3">
                    <form method="post" action="{{ route('user_submitProgress') }}">
                        @csrf
                        @method('POST')
                        <div class="form-check">
                            <small class="d-block text-dark">Check the completed box after you finish watching this video</small class="d-block text-secondary  ">
                            <div class="d-flex mt-3 align-items-center">
                                <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden>
                                <input class="" type="checkbox" value="completed" id="flexCheckDefault" name="completed">
                                <p class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    Completed
                                </p>
                                <button type="submit" class="btn  btn-sm btn-primary">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

            </div>
        </div>

    </div>


</div>
</div>
@endsection
