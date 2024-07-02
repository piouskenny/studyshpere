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
        <div class="row g-0 align-items-center justify-content-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="my-2 w-50">
                            @include('components.alert')
                        </div>
                    </div>

                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Login</h2>

                        <form method="post" action="{{ route('verify_otp') }}">
                            @method('POST')
                            @csrf

                            <!-- Ensure the user ID is available and passed to the form -->
                            <input type="hidden" id="form3Example4" name="id" class="form-control" value="{{ $user->id ?? old('id') }}" />

                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" name="otp" class="form-control" />
                                <label class="form-label" for="form3Example4">6 digit OTP</label>
                                <span class="d-block text-danger">
                                    @error('otp')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-100 btn-block mb-4">
                                verify
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
@endsection
