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
        <div class="row g-0 justify-content-center align-items-center mt-4 ">
            <div class="col-lg-4 shadow-sm mb-5 mb-lg-0">
                <div class=" cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class=" p-5 shadow-sm text-center">
                        @include('components.alert')
                        <h3 class="text-primary" style="font-weight: bold;">StudyPadi</h3>

                        <h5 class="fw-bold mb-5">Login</h5>
                        <form method="post" action={{ route('login') }}>
                            @method('POST')
                            @csrf
                            <!-- Phone input -->
                            <div class="form-outline mb-3">
                                <input type="email" id="form3Example3"  placeholder="Email" class="form-control" name="email" />
{{--                                <label class="form-label" for="form3Example3">Phone Number</label>--}}
                                <span class="text-danger d-block">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4"  placeholder="Password" class="form-control" name="password" />
{{--                                <label class="form-label" for="form3Example4">Password</label>--}}
                                <span class="text-danger d-block">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-3 shadow">
                                Login
                            </button>

                            <p>Don't have an account? </p>
                            <div class="d-flex justify-content-between ">
                                <a href="{{ route('signup_page') }}" class="btn btn-light shadow w-50">Student signup</a>
                                <a href="{{ route('tutor_signup_page') }}" class=" mx-2 btn shadow-sm btn-primary  w-50 ">Tutor signup</a>
                            </div>
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
<!-- Section: Design Block -->
@endsection
