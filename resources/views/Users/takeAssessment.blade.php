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

        <div class="row mb-5 p-2 justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-warning">
                    <div class="alert-heading">
                        <h4>Instruction!!!</h4>
                    </div>
                    <hr>
                    <p>Click the <span class="text-primary"> blue </span> submit button after you have answered each question then click next, </p>
                    <p>check the submit all your answers box to submit all your questions when you are done. </p>

                </div>
                @forelse($assessments as $assessment)
                <h1 class="h2">Question: {{ $assessment->question }}?</h1>

                <div>
                    <h3 class="h6 mt-3">Options</h3>
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
                    <form method="post" action="{{ route('user_SubmitAssessment') }}">
                        @csrf
                        @method('POST')
                        <input name="assessment_id" value="{{$assessment->id}}" type="number" hidden/>
                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    A
                                </label>
                                <input class="" type="checkbox" value="option_a" id="flexCheckDefault" name="option_a">
                            </div>
                        </div>

                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    B
                                </label>
                                <input class="" type="checkbox" value="option_b" id="flexCheckDefault" name="option_b">
                            </div>
                        </div>


                        <div class="form-check">
                            <div class="d-flex mt-3 align-items-center">
                                {{-- <input type="text" name="user_id" value="{{ $user->id }}" id="" hidden>
                                <input type="text" name="content_id" value="{{ $singleVideo->id }}" id="" hidden> --}}
                                <label class="form-check-label h1 mx-2" for="flexCheckDefault">
                                    C
                                </label>
                                <input class="" type="checkbox" value="option_c" id="flexCheckDefault" name="option_c">
                            </div>
                        </div>


                        <div class="my-3">
                            <label class="form-check-label  mx-2 text-danger" for="flexCheckDefault">
                                Check this box if you want to submit all your answers.
                            </label>
                            <input class="input-check" type="checkbox" value="finish" id="flexCheckDefault" name="finish">
                        </div>
                        @if($assessments->currentPage() == $assessments->lastPage())
                            <button type="submit" class="btn  btn-md btn-danger">Finish</button>

                        @else
                            <button type="submit" class="btn  btn-md btn-primary">Submit</button>
                        @endif
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

{{--<script>--}}
{{--    function submitForm(key) {--}}
{{--        var form = document.getElementById("assessmentForm" + key);--}}

{{--        // AJAX request to submit the form data--}}
{{--        var formData = new FormData(form);--}}
{{--        $.ajax({--}}
{{--            url: form.getAttribute('action'),--}}
{{--            type: 'POST',--}}
{{--            data: formData,--}}
{{--            processData: false,--}}
{{--            contentType: false,--}}
{{--            success: function(response) {--}}
{{--                // Handle success response if needed--}}
{{--                // For example, display a message or navigate to the next page--}}
{{--                window.location.href = "{{ route('assessments.take', ['course_id' => $course_id]) }}";--}}
{{--            },--}}
{{--            error: function(xhr, status, error) {--}}
{{--                // Handle error response if needed--}}
{{--                console.error(error);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
