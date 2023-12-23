@extends('Layout.app')
@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start primary_bg ">
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
        <div class="row g-0 align-items-center justify-content-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action="{{ route('signup') }}" method="post">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="fullName" class="form-control" name="full_name" value="{{ @old('full_name') }}"/>
                                        <label class="form-label" for="fullName">Full Name</label>
                                        <span class="text-danger d-block">
                                            @error('full_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="username" value="{{ @old('username') }}" />
                                <label class="form-label" for="username">username</label>
                                <span class="text-danger d-block">
                                    @error('username')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" value="{{ @old('email') }}" />
                                <label class="form-label" for="email">Email address</label>
                                <span class="text-danger d-block">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Phone number input -->
                            <div class="form-outline mb-4">
                                <input type="tel" id="phonenumber" name="phonenumber" class="form-control" value="{{ @old('phonenumber') }}" />
                                <label class="form-label" for="phonenumber">Phone Number</label>
                                <span class="text-danger d-block">
                                    @error('phone_number')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control" />
                                <label class="form-label" for="password">Password</label>
                                <span class="text-danger d-block">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-4" id="submitBtn">
                                Sign up
                            </button>

                        </form>
                    </div>
                </div>
            </div>
{{-- 
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="{{ asset('assets/img/studyshere.jpg') }}" class="w-100 rounded-4 shadow-4" alt="" />
            </div> --}}
        </div>
    </div>
    <!-- Jumbotron -->
</section>

@endsection
