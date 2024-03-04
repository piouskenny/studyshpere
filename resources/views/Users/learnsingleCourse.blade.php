@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
{{-- <a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
<i class="fa fa-whatsapp wp-button"></i>
<p class="text-success h4 text-center my-2">Contact Tutor</p>
</a> --}}
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-10 shadow-sm">


                <div class="shadow-sm">
                    <iframe width="560" height="315" src="{{ $singleVideo->content_url }}" frameborder="0"></iframe>
                </div>


                <div class="p-3">
                    <form method="post" action="">
                        @csrf
                        @method('POST')
                        <div class="form-check">
                            <small class="d-block text-dark">Check the completed box after you finish watching this video</small class="d-block text-secondary  ">
                            <input class="form-check-input" type="checkbox" value="completed" id="flexCheckDefault">
                            <p class="form-check-label h1" for="flexCheckDefault">
                                Completed
                            </p>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>


</div>
</div>
@endsection
