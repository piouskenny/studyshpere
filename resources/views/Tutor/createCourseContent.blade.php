@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-sm">
                <h3 class="text-center text-primary">
                    Add Course Content
                </h3>
                <form action="{{route('createCourseContentPost')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" name="course_id" value="{{$course->id}}" class="form-control" hidden />

                    <div class="form-group shadow-sm">
                        <label for="content_type">
                            content Types
                        </label>
                        <select class="form-control" name="content_type">
                            <option value="">Select Content Type</option>
                            <option value="video">Video</option>
                            <option value="document">Document</option>
                        </select>
                    </div>
                    <div class="form-group shadow-sm">
                        <label for="content_url">
                            content Url
                        </label>
                        <input type="text" name="content_url" class="form-control" />
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-primary w-75">Add Content</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
