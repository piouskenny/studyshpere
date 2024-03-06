@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="d-flex justify-content-center align-items-center">
            <div class="my-2 w-50">
                @include('components.alert')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-sm">
                <h3 class="text-center text-primary">
                    Assesment
                </h3>
                <form action="{{route('updateAssementPost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="text" name="id" value="{{$assessment->id}}" class="form-control" hidden />
                    <input type="text" name="course_id" value="{{$assessment->course_id}}" class="form-control" hidden />
                    <input type="text" name="tutor_id" value="{{$assessment->tutor_id}}" class="form-control" hidden />

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form6Example4">Question</label>
                        <input class="form-control" value="{{ $assessment->question }}" name="question"></input>
                        <span class="d-block text-danger mt-2">
                            @error('question')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="option_a">
                            Option A
                        </label>
                        <div class="input-group">
                            <input class="form-control" id="option_a" value="{{ $assessment->option_a }}" name="option_a" type="text" />
                        </div>
                        <span class="d-block text-danger mt-2">
                            @error('option_a')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="option_b">
                            Option B
                        </label>
                        <div class="input-group">
                            <input class="form-control" id="option_b" value="{{ $assessment->option_b }}" name="option_b" type="text" />
                        </div>
                        <span class="d-block text-danger mt-2">
                            @error('option_b')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="option_c">
                            Option C
                        </label>
                        <div class="input-group">
                            <input class="form-control" id="option_c" value="{{ $assessment->option_c }}" name="option_c" type="text" />
                        </div>
                        <span class="d-block text-danger mt-2">
                            @error('option_c')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="option_c">
                            Correct Answer
                        </label>
                        <div class="input-group">
                            <select name="correct_answer" class="form-select" id="">
                                <option value="">select correct option</option>
                                <option value="option_a">Option A</option>
                                <option value="option_b">Option B</option>
                                <option value="option_c">Option C</option>
                            </select>
                        </div>
                        <span class="d-block text-danger mt-2">
                            @error('correct_answer')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-primary w-75">Update Assesment</button>

                    </div>
                </form>
                <div class="form-group d-flex  w-100 justify-content-center">

                    <form action=" {{ route('delete_assessment',  $assessment->id   )}} " method="post">
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-danger w-100">Delete Assesment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
