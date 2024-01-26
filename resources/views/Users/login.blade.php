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
            <div class="col-lg-4 shadow-sm mb-5 mb-lg-0">
                <div class=" cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class=" p-5 shadow-5 text-center">
                        @include('components.alert')
                        <h1 class="text-primary" style="font-weight: bold;">StudySphere</h1>

                        <h2 class="fw-bold mb-5">Login</h2>
                        <form method="post" action={{ route('login') }}>
                            @method('POST')
                            @csrf
                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <input type="number" id="form3Example3" class="form-control" name="phonenumber" />
                                <label class="form-label" for="form3Example3">Phone Number</label>
                                <span class="text-danger d-block">
                                    @error('phone_number')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="password" />
                                <label class="form-label" for="form3Example4">Password</label>
                                <span class="text-danger d-block">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-4 shadow">
                                Login
                            </button>

                            <p>Don't have an account? </p>
                            <div class="d-flex justify-content-between ">
                                <a href="{{ route('signup_page') }}" class="btn btn-light shadow w-50">Student signup</a>
                                <a href="{{ route('tutor_signup_page') }}" class=" mx-2 btn shadow-sm btn-success w-50 ">Tutor signup</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <<img src="{{ asset('3629604.jpg') }}" class="img-fluid rounded-top" alt="" />

            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
@endsection
