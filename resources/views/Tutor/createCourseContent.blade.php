@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-sm">
                <h3 class="text-center text-primary">
                    Add Course Content
                </h3>
                <form action="{{route('createCourseContentPost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="text" name="course_id" value="{{$course->id}}" class="form-control" hidden />

                    <div class="form-group shadow-sm">
                        <input type="text" id="form6Example5" class="form-control" hidden name="content_type" value="video" />
                    </div>

                    <div class="form-group shadow-sm">
                        <label for="content_url">
                            Course Content Name
                        </label>
                        <input type="text" name="content_name" class="form-control" placeholder="" />
                        <span class="d-block text-danger">
                            @error('content_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group shadow-sm">
                        <label for="content_number">
                            Course Content Number / Part
                        </label>
                        <input type="number" name="content_number" class="form-control" placeholder="e.g 1" />
                        <span class="d-block text-danger">
                            @error('content_number')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="form-group shadow-sm">
                        <label for="content_url">
                            content Url
                        </label>
                        <input type="text" name="content_url" class="form-control" />
                        <span class="d-block text-danger">
                            @error('content_url')
                            {{ $message }}
                            @enderror
                        </span>
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
