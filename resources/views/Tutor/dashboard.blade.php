@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="d-flex justify-content-center align-items-center">
            <div class="my-2 w-50">
                @include('components.alert')
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 shadow-sm p-4 text-center card_mobile-space rounded rounded-md">
                        <h2>Courses</h2>
                        <h1>{{$course}}</h1>
                    </div>

                    <div class="col-md-4 shadow-sm p-4 text-center card_mobile-space rounded rounded-md bg-primary text-light mt-md-0 mt-3">
                        <h2>Student Enrolled</h2>
                        <h1>0</h1>
                    </div>

                    <div class="col-md-4  shadow-sm p-4 text-center card_mobile-space rounded rounded-md bg-dark text-white mt-4">
                        <h2>Average Grade</h2>
                        <h1>0</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md shadow-sm mt-md-0 mt-3">
                    <div class="chart-container" style="position: relative; width:100%; height:400px;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <h2>Courses</h2>
                    @forelse($courses as $course)
                    <div class="card col-md-4 my-2 pb-0">
                        <a href="{{ route('tutorSingleCourse', $course->id) }}">
                            <div class="bg-image hover-overlay ripple course_card flex justify-content-center" data-mdb-ripple-color="light">
                                <img src="{{ asset('course_img/' . $course->course_image) }}" class="img-fluid course_img" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><a>{{ $course->course_name }}</a></h5>
                            </div>
                            <a class="btn btn-primary btn-sm" href="{{route('createCourseContent',$course->id)}}">
                                Add Content
                            </a>
                        </a>
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
                <h2>Assessment</h2>
                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            @forelse ($assessments as $assessment )
                            {{--
                                 For each created assessment
                             --}}

                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">{{ $assessment->question }}</h1>
                                <a href="{{ route('updateAssessment', $assessment->id) }}" class="btn btn-primary btn-sm"> View</a>
                            </li>
                            @empty
                            <p class="text-danger">You have not added any assessment yet.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie'
        , data: {
            labels: @json($data['labels'])
            , datasets: [{
                label: 'Data'
                , data: @json($data['data'])
                , backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                    , 'rgba(0, 0, 0, 0.2)'
                    , 'rgba(255, 206, 86, 0.2)'
                    // , 'rgba(75, 192, 192, 0.2)'
                    // , 'rgba(153, 102, 255, 0.2)'
                    // , 'rgba(255, 159, 64, 0.2)'
                ]
                , borderColor: [
                    'rgba(255, 99, 132, 1)'
                    , 'rgba(54, 162, 235, 1)'
                    , 'rgba(255, 206, 86, 1)'
                    // , 'rgba(75, 192, 192, 1)'
                    // , 'rgba(153, 102, 255, 1)'
                    // , 'rgba(255, 159, 64, 1)'
                ]
                , borderWidth: 1
            }]
        }
        , options: {
            responsive: true
            , plugins: {
                legend: {
                    position: 'top'
                , }
                , title: {
                    display: true
                    , text: 'Pie Chart'
                }
            }
        }
    });

</script>
@endsection
