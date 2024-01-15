@extends('Layout.admin_dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row justify-content-center">
            <div class="col-md-6 shadow-sm">
                <h3 class="text-center text-primary">
                    Add Tutor
                </h3>
                <form action="{{route('admin_saveTutor')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group shadow-sm">
                        <label for="full_name">
                            Full Name
                        </label>
                        <input type="text" name="full_name" class="form-control" />
                    </div>
                    <div class="form-group shadow-sm">
                        <label for="phonenumber">
                            Phone Number
                        </label>
                        <input type="number" name="phonenumber" class="form-control" />
                    </div>
                    <div class="form-group shadow-sm">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" name="email" class="form-control" />
                    </div>
                    <div class="form-group shadow-sm">
                        <label for="password">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-primary w-75">Add Tutor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
