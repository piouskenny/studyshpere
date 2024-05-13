@extends('Layout.app')
@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start ">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }

    </style>

    <!-- Jumbotron -->
    <div class="container py-4 ">
        <div class="row g-0 justify-content-center align-items-center">
            <div class="col-lg-4 mb-5 mb-lg-0 shadow-md">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="p-5 shadow-5 text-center">
                        <h3 class="text-primary" style="font-weight: bold;">StudyPadi</h3>

                        <h5 class="fw-bold mb-5">Qualification and Experience</h5>
                        <form action="{{ route('tutor_addQualification', $tutor->id) }}" method="post" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="number" value="{{ $tutor->id }}"  hidden name="id" />
                            <div class="row">
                                <div class="mb-3">
                                    <div class="form-outline">
                                        <input type="text" id="degree" placeholder="Degree Qualification" class="form-control" name="degree" value="{{ @old('degree') }}" />
                                        <span class="text-danger d-block">
                                            @error('degree')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="text" id="field_specialization" placeholder="Field Of Specialization" class="form-control" name="field_specialization" value="{{ @old('field_specialization') }}" />
                                <span class="text-danger d-block">
                                    @error('field_specialization')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>


                            <div class="form-outline mb-3">
                                <input type="number" class="form-control" min="0" placeholder="Years of Experience" name="years_experience" value="{{ @old('years_experience') }}" />
                                <span class="text-danger d-block">
                                    @error('years_experience')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label text-bold" for="form6Example5">Certifiaiton</label>
                                <input type="file" id="form6Example5" class="form-control-file" name="certification" />
                                <span class="d-block text-danger">
                                    @error('certification')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-3" id="submitBtn">
                                Sign up
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="{{ asset('assets/img/2.jpg') }}" class="img-fluid rounded-0" alt="" />
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>

@endsection
