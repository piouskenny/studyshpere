@extends('Layout.dashboard.app')
@section('content')
{{-- <link rel="stylesheet" rel="{{asset('dashboard/profile.css')}}"> --}}
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <section class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="card card-style1 border-0">
                            <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                    </div>
                                    <div class="col-lg-6 px-xl-10">
                                        <div class="bg-primary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded my-4">
                                            <h3 class="h2 text-white mb-0 p-3">{{$user->full_name}}</h3>
                                        </div>
                                        <ul class="list-unstyled mb-1-9">
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">username:</span> {{$user->username}}</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">Email:</span> {{$user->email}}</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">Enrolled Courses:</span> 3</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">Completed Courses:</span> 0</li>
                                            <li class="display-28"><span class="display-26  me-2 f">Phone Number:</span> {{$user->phonenumber}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
