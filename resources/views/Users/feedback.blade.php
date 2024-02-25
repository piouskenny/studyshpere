@extends('Layout.dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-8 shadow-sm">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form6Example5">Tutor</label>
                        <input type="text" value="{{$tutor->id}}" hidden id="form6Example5" class="form-control" name="tutor" />
                        <input type="text" value="{{$tutor->full_name}}" disabled id="form6Example5" class="form-control" />
                        <span class="d-block text-danger">
                            @error('tutor')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form6Example4">Course Description</label>
                        <textarea class="form-control" row="6" name="description"></textarea>
                        <span class="d-block text-danger">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Create Course</button>
                </form>
            </div>
        </div>

    </div>


</div>
</div>
@endsection
