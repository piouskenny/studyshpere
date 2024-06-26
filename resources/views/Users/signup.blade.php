@extends('Layout.app')
@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start  ">
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
            <div class="col-lg-4 mb-5 mb-lg-0 shadow-sm">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="p-5 shadow-sm text-center">
                        @include('components.alert')
                        <h3 class="text-primary" style="font-weight: bold;">StudyPadi</h3>


                        <h5 class="fw-bold mb-5">Sign up now</h5>
                        <form action="{{ route('signup') }}" method="post">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="mb-2">
                                    <div class="form-outline">
                                        <input type="text" id="fullName" class="form-control" placeholder="Full Name" name="full_name" value="{{ @old('full_name') }}" />
                                        <span class="text-danger d-block">
                                            @error('full_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <input type="text" class="form-control"  placeholder="Username" name="username" value="{{ @old('username') }}" />
                                <span class="text-danger d-block">
                                    @error('username')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="email" id="email" placeholder="Email" name="email" class="form-control" value="{{ @old('email') }}" />
                                <span class="text-danger d-block">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Phone number input -->
                            <div class="form-outline mb-2">
                                <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phone Number" class="form-control" value="{{ @old('phonenumber') }}" />
                                <span class="text-danger d-block">
                                    @error('phone_number')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-2">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" />
                                <span class="text-danger d-block">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-2" id="submitBtn">
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
