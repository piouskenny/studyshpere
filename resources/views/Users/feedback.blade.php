@extends('Layout.dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="my-2">
            @include('components.alert')
        </div>
        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-8 shadow-sm">
                <form action="{{ route('user_submitfeedback') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" value="{{$user->id}}" hidden id="form6Example5" class="form-control" name="user_id" />
                        <input type="text" value="{{$course->id}}" hidden id="form6Example5" class="form-control" name="course_id" />
                        <input type="text" value="{{$tutor_id->id}}" hidden id="form6Example5" class="form-control" name="tutor_id" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form6Example4">Feedback Message</label>
                        <textarea class="form-control" row="6" name="feedback_message"></textarea>
                        <span class="d-block text-danger mt-2">
                            @error('feedback_message')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Send Feedback</button>
                </form>
            </div>
        </div>

    </div>


</div>
</div>
@endsection
