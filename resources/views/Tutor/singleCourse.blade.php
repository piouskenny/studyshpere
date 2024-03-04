@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5">
            <div class="col-md-8 shadow-sm">
                @forelse($courseContent as $content)
                <div>
                    <div class="shadow-sm my-2">
                        @if($content->content_type === 'video')
                        <div class="shadow-sm">
                            <iframe width="560" height="315" src="{{ $content->content_url }}" frameborder="0"></iframe>
                        </div>
                        @elseif($content->content_type === 'document')
                        <div>
                            <a href="{{ $content->content_url }}" target="_blank">View Document</a>
                        </div>
                        @endif
                    </div>
                </div>

                @empty
                <div class="text-light text-center bg-danger">
                    NO CONTENT ADDED FOR THIS COURSE YET
                </div>
                @endforelse
            </div>
            <div class="col-md-4 shadow-sm">
                <div class="d-flex justify-content-center">
                    <h2>Assement</h2>
                    <a  href=" {{ route('createAssessment', $course->id) }} "class="btn btn-primary mx-3 btn-sm"> Add Assement</a>
                </div>

                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            {{-- For each created assement --}}
                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">Assement 1</h1> <button class="btn btn-primary"> View</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
