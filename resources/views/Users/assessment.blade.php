@extends('Layout.dashboard.app')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- <a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
    <i class="fa fa-whatsapp wp-button"></i>
    <p class="text-success h4 text-center my-2">Contact Tutor</p>
    </a> --}}
    <div class="main-panel">
        <div class="content-wrapper bg-light shadow-lg">
            <h3> {{$course}}</h3>

            <h3>Score: {{$user_score}}</h3>

            <h3>Questions:  {{$attempted_questions_count}}</h3>
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
