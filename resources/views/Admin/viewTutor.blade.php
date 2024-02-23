@extends('Layout.admin_dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-primary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded my-4">
                                    <h3 class="h2 text-white mb-0 p-3">{{$tutor->full_name}}</h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">Email:</span> {{$tutor->email}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26  me-2 f">Owned Courses:</span> {{ $courses->count() }}</li>
                                    <li class="display-28"><span class="display-26  me-2 f">Phone Number:</span> 0{{$tutor->phonenumber}}</li>
                                </ul>


                                <form action=" {{ route('admin_delete_tutor',  $tutor->id   )}} " method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger">Delete Tutor</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
