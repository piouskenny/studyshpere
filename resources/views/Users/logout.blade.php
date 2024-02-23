@extends('Layout.dashboard.app')

@section('content')

<div class="main-panel">
    <div class="content-wrapper bg-light">
        <section class="bg-light">
            <div class="container">
                <h1 class="my-5 bg-light text-light ">Logout</h1>

                <!-- ======= Courses Card Section ======= -->
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-danger text-center">
                            <p>Are you sure you want to logout? </p>

                            <a class="btn btn-danger" href="{{ route('logout') }}">
                                Yes
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

@endsection
