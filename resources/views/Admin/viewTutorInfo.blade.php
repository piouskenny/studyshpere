@extends('Layout.admin_dashboard.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="my-2">
                    @include('components.alert')
                </div>
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <ul class="list-unstyled mb-1-9">
                                <li class="mb-2 mb-xl-3 display-28"><span class="display-30  me-2 f">Degree:</span> {{$tutor_info->degree}}</li>
                                <li class="mb-2 mb-xl-3 display-28"><span class="display-30  me-2 f">Feild of Specalization:</span> {{ $tutor_info->field_specialization }}</li>


                                <form action="{{ route('admin_downloadCertificate', $tutor_info->id) }}" method="post">
                                    @csrf
                                    @method('post')

                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-30  me-2 f">Certification:</span> </li>
                                    <button type="submit" class="tn btn-sm btn-primary"> Download </button>
                                </form>

                            </ul>


                            <div class="col mt-5">
                                <form action="{{ route('admin_verifyTutor', $tutor->id) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-info"> Click Here to verify</button>
                                </form>
                            </div>


                            <div class="col d-block mt-5">
                                <form action=" {{ route('admin_delete_tutor',  $tutor->id   )}} " method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger">Click Here to delete Tutor</button>
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
